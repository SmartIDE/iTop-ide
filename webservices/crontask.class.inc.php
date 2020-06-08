<?php
// Copyright (C) 2016 Combodo SARL
//
//   This file is part of iTop.
//
//   iTop is free software; you can redistribute it and/or modify
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   iTop is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with iTop. If not, see <http://www.gnu.org/licenses/>

/**
 * Helper class to manage the parallel execution of 'cron' background processes
 * 
 * @copyright   Copyright (C) 2010-2012 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */
class CronTask
{
	private $sTaskName;
	private $aProcesses;
	private $iSleepDuration;
	private $sOuputFile;

	/**
	 * 
	 * @param string $sTaskName
	 * @param string[] $aParams
	 */
	public function __construct($sTaskName, $aParams)
	{
		$this->sTaskName = $sTaskName;

		$this->aProcesses = array_map('trim', explode(',', $aParams['processes']));
		$this->aArguments = $aParams['arguments'];
		$this->sOuputFile = $aParams['output_file'];
		$this->iSleepDuration = (int) $aParams['sleep'];
	}

	/**
	 * Build the command line string for a cron sub-process
	 * @param string[] $aInheritedArgs
	 * @return string
	 */
	public function GetCommandLine($aInheritedArgs)
	{
		$sPHPExec = trim(MetaModel::GetConfig()->Get('php_path'));
		if (strlen($sPHPExec) == 0)
		{
			$sPHPExec = 'php';
		}
		$sCommand = '"'.$sPHPExec.'" '.escapeshellarg(APPROOT.'webservices/cron.php'); 

		$aArgs = $this->aArguments;
		$aArgs['task_name'] = $this->sTaskName;
		foreach($aInheritedArgs as $sName => $value)
		{
			if (!array_key_exists($sName, $aArgs))
			{
				$aArgs[$sName] = $value;
			}
		}

		foreach($aArgs as $sName => $value)
		{
			if (in_array($sName, array('verbose', 'debug')) && !$value) continue; // --verbose=0 ==> omit the parameter

			if (is_bool($value))
			{
				$sValue = $value ? '1' : '0';
			}
			else
			{
				$sValue = (string) $value;
			}

			$sCommand .= ' --'.$sName.'='.escapeshellarg($sValue);
		}

		if (DIRECTORY_SEPARATOR === '\\')
		{
			// Under Windows, must use START /B to tell the shell to run the command in another shell
			$sCmdFormat = "START /B %s >> ".escapeshellarg($this->sOuputFile).' 2>&1';
		}
		else
		{
			// Under *nix, use the ampersand to run the command in the background
			$sCmdFormat = "%s >> ".escapeshellarg($this->sOuputFile).' 2>&1 &';
		}

		return sprintf($sCmdFormat, $sCommand);
	}

	/**
	 * Launch the detached sub-process to handle the specified task-list. Returns immedialy
	 * without waiting for the process to terminate
	 * @param string[] $aInheritedArgs
	 * @throws Exception
	 */
	public function Start($aInheritedArgs)
	{
		$sCommandLine = $this->GetCommandLine($aInheritedArgs);

		$ret = popen($sCommandLine, 'r');

		if ($ret === false)
		{
			throw new Exception("Failed to start a cron background process with the command line: $sCommandLine.");
		}
	}

	/**
	 * Check if the task is actually running (by checking its mutex)
	 * Meant for displaying (an approximate) status
	 * Note: that this method may actually return false if called too soon after the start of the process before the mutex being acquired
	 * @return boolean
	 */
	public function IsRunning()
	{
		$oMutex = new iTopMutex('cron-'.$this->sTaskName);
		return !$oMutex->TryLock();
	}

	/**
	 * Get the list of iTop's iProcess classes mentionned in the task-list configuration
	 * @return iBackgroundProcess[]
	 */
	public function GetProcessList($aAllProcesses)
	{
		$aProcesses = array();
		foreach($this->aProcesses as $sProcessClass)
		{
			if (array_key_exists($sProcessClass, $aAllProcesses))
			{
				$aProcesses[$sProcessClass] = $aAllProcesses[$sProcessClass];
			}
		}
		return $aProcesses;
	}

	/**
	 * Get the list of iTop's iProcess class names mentionned in the task-list configuration
	 * @return string[]
	 */
	public function GetProcessNames()
	{
		return $this->aProcesses;
	}

	/**
	 * Provision for having a per cron process sleep interval... not used yet
	 * @return number
	 */
	public function GetSleepDuration()
	{
		return $this->iSleepDuration;
	}

	/**
	 * Load all CronTasks defined in the configuration file
	 * @return CronTask[]
	 */
	public static function LoadAllTasks()
	{
		$aTasks = array();
		$aTasksList = MetaModel::GetConfig()->Get('cron_tasks_list');
		foreach($aTasksList as $sTaskName => $aParams)
		{
			$aTasks[$sTaskName] = new CronTask($sTaskName, $aParams);
		}
		return $aTasks;
	}

	/**
	 * Tells if a background process is mutually exclusive of all other background processes
	 * @param iBackgroundProcess $oProcess
	 * @return boolean
	 */
	public static function IsGloballyExclusive(iProcess $oProcess)
	{
		$oRefClass = new ReflectionClass(get_class($oProcess));
		return ($oRefClass->implementsInterface('iGloballyExclusiveProcess'));
	}

	/**
	 * Wait for all background tasks to be completed (status != running).
	 * Return true if all tasks were actually stopped or false if the function timed out.
	 * To be effective this function must be called inside a critical section protected by
	 * the 'cron-globally-exclusive-process' mutex, to prevent any other task from starting while we wait
	 * for other tasks to complete.
	 * @param BackgroundTask $oExcludedTask Exclude this task from the check, if supplied
	 * @param number $iMaxWaitTime Maximum time (in seconds) to wait before giving up
	 * @param number $iSleepTime Time to sleep (in seconds) between two checks
	 * @return boolean
	 */
	public static function WaitForAllTasksToComplete(BackgroundTask $oExcludedTask = null, $iMaxWaitTime = 3600, $iSleepTime = 5)
	{
		$start = time();
		$oSearch = new DBObjectSearch('BackgroundTask');
		$oSearch->AddCondition('running', true);
		$oSearch->AddCondition('status', 'active');
		if ($oExcludedTask != null)
		{
			// Exclude the task itself to recover from a dirty stop/crash where the task is left marked as running
			$oSearch->AddCondition('id', $oExcludedTask->GetKey(), '!=');
		}
		$oSet = new DBObjectSet($oSearch);
		$iNbRunningTasks = $oSet->Count();
		echo "Number of running tasks: $iNbRunningTasks\n";

		while(($iNbRunningTasks > 0) && (time() < ($start + $iMaxWaitTime)))
		{
			sleep($iSleepTime);
			$oSet = new DBObjectSet($oSearch); // Redo the query
			$iNbRunningTasks = $oSet->Count();
			echo "Number of running tasks: $iNbRunningTasks\n";
		}

		return ($iNbRunningTasks == 0);
	}

	/**
	 * Mark all the active tasks as not running
	 */
	public static function MarkAllActiveTasksAsStopped()
	{
		$oSearch = new DBObjectSearch('BackgroundTask');
		$oSearch->AddCondition('running', true);
		$oSearch->AddCondition('status', 'active');
		$oSet = new DBObjectSet($oSearch);
		while($oTask = $oSet->Fetch())
		{
			$oTask->Set('running', false);
			$oTask->DBUpdate();
		}
	}
}

<?php
// Copyright (C) 2010-2017 Combodo SARL
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
 * File logging
 *
 * @copyright   Copyright (C) 2010-2017 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

class FileLog
{
	protected $m_sFile = ''; // log is disabled if this is empty

	public function __construct($sFileName = '')
	{
		$this->m_sFile = $sFileName;
	}

    public function Error($sText, $sChannel = '', $aContext = array())
    {
        $this->Write($sText, __FUNCTION__, $sChannel, $aContext);
    }

    public function Warning($sText, $sChannel = '', $aContext = array())
    {
        $this->Write($sText, __FUNCTION__, $sChannel, $aContext);
    }

    public function Info($sText, $sChannel = '', $aContext = array())
    {
        $this->Write($sText, __FUNCTION__, $sChannel, $aContext);
    }

    public function Ok($sText, $sChannel = '', $aContext = array())
    {
        $this->Write($sText, __FUNCTION__, $sChannel, $aContext);
    }

    public function Debug($sText, $sChannel = '', $aContext = array())
    {
        $this->Write($sText, __FUNCTION__, $sChannel, $aContext);
    }

    public function Trace($sText, $sChannel = '', $aContext = array())
    {
        $this->Write($sText, __FUNCTION__, $sChannel, $aContext);
    }


    protected function Write($sText, $sLevel = '', $sChannel = '', $aContext = array())
    {
        $sTextPrefix = empty($sLevel) ? '' : (str_pad($sLevel, 7).' | ');
        $sTextSuffix = empty($sChannel) ? '' : " | $sChannel";
        $sText = "{$sTextPrefix}{$sText}{$sTextSuffix}";
        $sLogFilePath = $this->m_sFile;


        if (empty($sLogFilePath))
        {
            return;
        }

        $hLogFile = @fopen($sLogFilePath, 'a');
        if ($hLogFile !== false)
        {
            flock($hLogFile, LOCK_EX);
            $sDate = date('Y-m-d H:i:s');
            if (empty($aContext))
            {
                fwrite($hLogFile, "$sDate | $sText\n");
            }
            else
            {
                $sContext = var_export($aContext, true);
                fwrite($hLogFile, "$sDate | $sText\n$sContext\n");
            }
            fflush($hLogFile);
            flock($hLogFile, LOCK_UN);
            fclose($hLogFile);
        }
    }
}

abstract class LogAPI
{
    const CHANNEL_DEFAULT   = '';

    const LEVEL_TRACE       = 'Trace';
    const LEVEL_DEBUG       = 'Debug';
    const LEVEL_OK          = 'Ok';
    const LEVEL_INFO        = 'Info';
    const LEVEL_WARNING     = 'Warning';
    const LEVEL_ERROR       = 'Error';

    protected static $aLevelsPriority = array(
        self::LEVEL_TRACE   =>  50,
        self::LEVEL_DEBUG   => 100,
        self::LEVEL_OK      => 150,
        self::LEVEL_INFO    => 200,
        self::LEVEL_WARNING => 300,
        self::LEVEL_ERROR   => 400,
    );

    protected static $m_oMockMetaModelConfig = null;

	public static function Enable($sTargetFile)
	{
		static::$m_oFileLog = new FileLog($sTargetFile);
	}

    public static function Error($sMessage, $sChannel = null, $aContext = array())
    {
        static::Log(self::LEVEL_ERROR, $sMessage, $sChannel, $aContext);
    }

    public static function Warning($sMessage, $sChannel = null, $aContext = array())
    {
        static::Log(self::LEVEL_WARNING, $sMessage, $sChannel, $aContext);
    }

    public static function Info($sMessage, $sChannel = null, $aContext = array())
    {
        static::Log(self::LEVEL_INFO, $sMessage, $sChannel, $aContext);
    }

    public static function Ok($sMessage, $sChannel = null, $aContext = array())
    {
        static::Log(self::LEVEL_OK, $sMessage, $sChannel, $aContext);
    }

    public static function Debug($sMessage, $sChannel = null, $aContext = array())
    {
        static::Log(self::LEVEL_DEBUG, $sMessage, $sChannel, $aContext);
    }

    public static function Trace($sMessage, $sChannel = null, $aContext = array())
    {
        static::Log(self::LEVEL_TRACE, $sMessage, $sChannel, $aContext);
    }

    public static function Log($sLevel, $sMessage, $sChannel = null, $aContext = array())
    {
        if (! static::$m_oFileLog)
        {
            return;
        }

        if (! isset(self::$aLevelsPriority[$sLevel]))
        {
            IssueLog::Error("invalid log level '{$sLevel}'");
            return;
        }

        if (is_null($sChannel))
        {
            $sChannel = static::CHANNEL_DEFAULT;
        }

        $sMinLogLevel = self::GetMinLogLevel($sChannel);

        if ($sMinLogLevel === false || $sMinLogLevel === 'false')
        {
            return;
        }
        if (is_string($sMinLogLevel))
        {
            if (! isset(self::$aLevelsPriority[$sMinLogLevel]))
            {
                throw new Exception("invalid configuration for log_level '{$sMinLogLevel}' is not within the list: ".implode(',', array_keys(self::$aLevelsPriority)));
            }
            elseif (self::$aLevelsPriority[$sLevel] < self::$aLevelsPriority[$sMinLogLevel])
            {
                //priority too low regarding the conf, do not log this
                return;
            }
        }

        static::$m_oFileLog->$sLevel($sMessage, $sChannel, $aContext);
    }

    /**
     * @param $sChannel
     *
     * @return mixed|null
     */
    private static function GetMinLogLevel($sChannel)
    {
        $oConfig = \MetaModel::GetConfig();
        if (! $oConfig instanceof Config)
        {
            return self::LEVEL_OK;
        }

        $sMinLogLevel = $oConfig->Get('log_level_min');
        if (! is_array($sMinLogLevel))
        {
            return $sMinLogLevel;
        }

        if (isset($sMinLogLevel[$sChannel]))
        {
            return $sMinLogLevel[$sChannel];
        }

        if (isset($sMinLogLevel[static::CHANNEL_DEFAULT]))
        {
            return $sMinLogLevel[$sChannel];
        }

        return self::LEVEL_OK;
    }
}

class SetupLog extends LogAPI
{
    const CHANNEL_DEFAULT = 'SetupLog';

	protected static $m_oFileLog = null;
}

class IssueLog extends LogAPI
{
    const CHANNEL_DEFAULT = 'IssueLog';

    protected static $m_oFileLog = null;
}

class ToolsLog extends LogAPI
{
    const CHANNEL_DEFAULT = 'ToolsLog';

    protected static $m_oFileLog = null;
}

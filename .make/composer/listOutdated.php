<?php
/**
 * Copyright (C) 2010-2020 Combodo SARL
 *
 *   This file is part of iTop.
 *
 *   iTop is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU Affero General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   iTop is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Affero General Public License for more details.
 *
 *   You should have received a copy of the GNU Affero General Public License
 *   along with iTop. If not, see <http: *www.gnu.org/licenses/>
 *
 */

$iTopFolder = __DIR__ . "/../../" ;

require_once ("$iTopFolder/approot.inc.php");
$sApproot = APPROOT;
$aTrace = array();

$aParamsConfig = array(
	'composer-path' => array(
		'default' => 'composer.phar',
	),

	'synthesis' => array(
		'default' => '1',
	),

	'human-readable' => array(
		'default' => '0',
	),

	'help' => array(
		'default' => 0,
	),

);
$aParamsConfigNotFound = array_flip(array_keys($aParamsConfig));
$aGivenArgs = $argv;
unset($aGivenArgs[0]);

$aParams = array();

foreach ($aParamsConfig as $sParam => $aConfig)
{
	$bParamsFound = false;
	foreach ($aGivenArgs as $sGivenArg)
	{
		if (preg_match("/--$sParam(?:=(?<value>.*))?$/", $sGivenArg, $aMatches))
		{
			$aParams[$sParam] =
				isset($aMatches['value'])
					? $aMatches['value']
					: true
			;
			$bParamsFound = true;
			unset($aGivenArgs[$sGivenArg]);

		}
	}

	if ($bParamsFound)
	{
		unset($aParamsConfigNotFound[$sParam]);
	}
}


foreach ($aParamsConfigNotFound as $sParamsConfigNotFound => $void)
{
	if (isset($aParamsConfig[$sParamsConfigNotFound]['default']))
	{
		$aParams[$sParamsConfigNotFound] = $aParamsConfig[$sParamsConfigNotFound]['default'];
		$aTrace[] =  "\e[1;30mUsing default value '{$aParams[$sParamsConfigNotFound]}' for '$sParamsConfigNotFound'\e[0m\n";
		continue;
	}

	die("Missing '$sParamsConfigNotFound'");
}


if ($aParams['help'] == true)
{
	echo "This command aims at helping you find upgradable dependencies\n";
	echo "parameters : \n";
	foreach ($aParamsConfig as $sParam => $aConfig)
	{
		echo str_pad("[$sParam]", 20);
		if (isset($aConfig['default']))
		{
			echo "\e[30;1mdefault: {$aConfig['default']}\e[0m";
		}
		echo "\n";
	}
	die();
}


if ($aParams['synthesis'] == true)
{

	$sCommandJson = "{$aParams['composer-path']} show -loD --working-dir=$sApproot --format=json";
	$execCodeJson = exec($sCommandJson, $aOutputson);
	$oJson = json_decode(implode('', $aOutputson));
	$aOutdated = $oJson->installed;

	if (!$execCodeJson)
	{
		echo  "\e[41mFailed to execute '$sCommandJson'\e[0m\n";
		echo "Trace: \n".implode("\n", $aTrace);
	}
	else
	{
		$oOutdatedAndBcBreak = array_filter($aOutdated, function($dependency) {
			return $dependency->{'latest-status'} != 'semver-safe-update';
		});

		$iCount   = count($aOutdated);
		$iCountBc = count($oOutdatedAndBcBreak);

		if ($iCount > 0)
		{
			echo sprintf(
				"You have \033[44m%d\033[0m upgradable dependencies, including \e[41m%s  BC break\e[0m 😱\n",
				$iCount,
				$iCountBc
			);
		}
		else {
			echo "All your dependencies are up to date! 👍";
		}



		if (! $aParams['human-readable'] )
		{
			echo sprintf(
				"Type '%s' for more details\n\n",
				$argv[0].' --human-readable'
			);
		}

	}
}



if ($aParams['human-readable'] == true)
{
	$sCommand = "{$aParams['composer-path']} show -loD --working-dir=$sApproot --ansi";
	$execCode = exec($sCommand, $aOutput);
	$sOutput = implode("\n", $aOutput)."\n";

	if (!$execCode)
	{
		echo "\e[41mFailed to execute '$sCommand'\e[0m\n";
		echo "Trace: \n".implode("\n", $aTrace);
	}

//	echo "\n\e[0;33mBeware of the version colored in orange, they probably introduce BC breaks!\e[0m\n";
	echo $sOutput;
}

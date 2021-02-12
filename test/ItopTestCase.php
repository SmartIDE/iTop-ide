<?php
/**
 * Copyright (C) 2013-2019 Combodo SARL
 *
 * This file is part of iTop.
 *
 * iTop is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * iTop is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 */

namespace Combodo\iTop\Test\UnitTest;
/**
 * Created by PhpStorm.
 * User: Eric
 * Date: 20/11/2017
 * Time: 11:21
 */

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use SetupUtils;

define('DEBUG_UNIT_TEST', true);

class ItopTestCase extends TestCase
{
	const TEST_LOG_DIR = 'test';
	protected $sSubTestName;

    protected function setUp()
	{
		@include_once '../approot.inc.php';
        @include_once '../../approot.inc.php';
		@include_once '../../../approot.inc.php';
		@include_once '../../../../approot.inc.php';
		@include_once '../../../../../approot.inc.php';
		@include_once '../../../../../../approot.inc.php';
		@include_once '../../../../../../../approot.inc.php';
		@include_once '../../../../../../../../approot.inc.php';

        $this->debug("\n----------\n---------- ".$this->getName()."\n----------\n");
		$this->sSubTestName = '';
	}

	protected function tearDown()
	{
	}

	protected function debug($sMsg)
    {
        if (DEBUG_UNIT_TEST)
        {
        	if (is_string($sMsg))
	        {
	        	echo "$sMsg\n";
	        }
	        else
	        {
	        	print_r($sMsg);
	        }
        }
    }

	public function GetMicroTime()
	{
		list($uSec, $sec) = explode(" ", microtime());
		return ((float)$uSec + (float)$sec);
	}

	public function WriteToCsvHeader($sFilename, $aHeader)
	{
		$sResultFile = APPROOT.'log/'.$sFilename;
		if (is_file($sResultFile))
		{
			@unlink($sResultFile);
		}
		SetupUtils::builddir(dirname($sResultFile));
		file_put_contents($sResultFile, implode(';', $aHeader)."\n");
	}

	public function WriteToCsvData($sFilename, $aData)
	{
		$sResultFile = APPROOT.'log/'.$sFilename;
		$file = fopen($sResultFile, 'a');
		fputs($file, implode(';', $aData)."\n");
		fclose($file);
	}

	public function GetTestId()
	{
		$sId = str_replace('"', '', $this->getName());
		$sId = str_replace(' ', '_', $sId);

		return $sId;
	}

	/**
	 * helper to test if a string starts with another
	 * @param $haystack
	 * @param $needle
	 *
	 * @return bool
	 */
	final public static function StartsWith($haystack, $needle)
	{
		if (strlen($needle) > strlen($haystack))
		{
			return false;
		}

		return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
	}

	/**
	 * Run all the tests having provider
	 */
	public function testAll()
	{
		$oRClass = new ReflectionClass($this);
		$aRMethods = $oRClass->getMethods();

		$aTestsToRun = [];
		$iNumberOfTests = 0;

		// Gather all tests to run
		foreach ($aRMethods as $oRMethod) {
			$sName = $oRMethod->getName();
			if (static::StartsWith($sName, "test")) {
				// Ignore real tests
				continue;
			}

			$sComment = $oRMethod->getDocComment();
			if ($sComment !== false) {
				if (preg_match('# @dataProvider\s+(?<provider>\w+)#', $sComment, $aMatches)) {
					$sProvider = $aMatches['provider'];
					$sDepends = '';
					if (preg_match('# @depends\s+(?<depends>\w+)#', $sComment, $aMatches)) {
						$sDepends = $aMatches['depends'];
					}
					$aTestsToRun[$sDepends][$sName] = $sProvider;
					$iNumberOfTests++;
				}
			}
		}

		$iNumberOfTestsDone = 0;

		// Run the tests
		foreach ($aTestsToRun as $sDepends => $aTests) {
			if (strlen($sDepends) > 0) {
				$this->debug("\n---------- $sDepends ----------\n");
				call_user_func([$this, $sDepends]);
			}


			foreach ($aTests as $sName => $sProvider) {
				$this->debug("\n---------- $sName ----------\n");
				$aAllData = call_user_func([$this, $sProvider]);
				foreach ($aAllData as $sSubTest => $aData) {
					call_user_func([$this, 'setUp']);
					$this->debug("\n--- $sSubTest ---\n");
					$this->sSubTestName = "$sName with data set $sSubTest";
					call_user_func_array([$this, $sName], $aData);
					$iNumberOfTestsDone++;
					call_user_func([$this, 'tearDown']);
				}
			}
		}

		$this->debug("\nDone $iNumberOfTestsDone tests\n");

		// if no test found
		static::assertTrue(true);
	}
	public function InvokeNonPublicStaticMethod($sObjectClass, $sMethodName, $aArgs)
	{
		return $this->InvokeNonPublicMethod($sObjectClass, $sMethodName, null, $aArgs);
	}

	/**
	 * @param string $sObjectClass for example DBObject::class
	 * @param string $sMethodName
	 * @param object $oObject
	 * @param array $aArgs
	 *
	 * @return mixed method result
	 *
	 * @throws \ReflectionException
	 */
	public function InvokeNonPublicMethod($sObjectClass, $sMethodName, $oObject, $aArgs)
	{
		$class = new \ReflectionClass($sObjectClass);
		$method = $class->getMethod($sMethodName);
		$method->setAccessible(true);

		return $method->invokeArgs($oObject, $aArgs);
	}
}
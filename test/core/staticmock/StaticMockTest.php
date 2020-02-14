<?php

namespace Combodo\iTop\Config\Test\Validator;

namespace Combodo\iTop\Test\UnitTest;
use PHPUnit\Framework\TestCase;
use AspectMock\Test as test;

class StaticMockTest extends TestCase
{

	public function setUp()
	{

		@include_once '../approot.inc.php';
		@include_once '../../approot.inc.php';
		@include_once '../../../approot.inc.php';
		@include_once '../../../../approot.inc.php';
		@include_once '../../../../../approot.inc.php';
		@include_once '../../../../../../approot.inc.php';
		@include_once '../../../../../../../approot.inc.php';
		@include_once '../../../../../../../../approot.inc.php';

		$kernel = \AspectMock\Kernel::getInstance();
		$kernel->init([
			'debug' => true,
			'includePaths' => [APPROOT . '/core'],
			'cacheDir'  => APPROOT . '/data/test/_aspectmock',
			'excludePaths' => [APPROOT  . '/test/'] // tests dir should be excluded
		]);
	}


	/**
	 * @param $sConf
	 *
	 * @throws \Exception
	 */
	public function testGetClassName()
	{
		$this->assertEquals('toto',  \DBObject::GetClassName("toto"));
		$DBObject = test::double('DBObject', ['GetClassName' => 'titi']);
		$this->assertEquals('titi',  \DBObject::GetClassName("toto"));
		$DBObject->verifyInvoked('GetClassName');
	}
}

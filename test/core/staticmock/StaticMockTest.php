<?php

namespace Combodo\iTop\core\staticmock;
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
			//'debug' => true,
			'application' => APPROOT ,
			'includePaths' => [APPROOT . '/core'],
			'cacheDir'  => APPROOT . '/data/test/_aspectmock',
			'excludePaths' => [APPROOT  . '/test/'] // tests dir should be excluded
		]);
	}

	protected function tearDown()
	{
		//\AspectMock\Test::clean();
	}


	/**
	 * @param $sConf
	 * @dataProvider GetClassNameProvider
	 * @throws \Exception
	 */
	public function testGetClassName($returnedValue)
	{
		$this->assertEquals('toto',  \DBObject::GetClassName("toto"));
		$DBObject = test::double('DBObject', ['GetClassName' => $returnedValue]);
		$this->assertEquals($returnedValue,  \DBObject::GetClassName("toto"));
		$DBObject->verifyInvoked('GetClassName');
	}

	public function GetClassNameProvider()
	{
		return array(
			"a" => array("a"),
			"b" => array("b"),
		);
	}
}

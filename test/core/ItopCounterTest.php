<?php

use PHPUnit\Framework\TestCase;
use AspectMock\Test as test;

class ItopCounterTest extends TestCase
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

	/*public static function IncClass($sLeafClass)
	{
		$sRootClass = MetaModel::GetRootClass($sLeafClass);

		$oNewObjectCallback = function() use ($sRootClass)
		{
			$sRootTable = MetaModel::DBGetTable($sRootClass);
			$sIdField = MetaModel::DBGetKey($sRootClass);

			return CMDBSource::QueryToScalar("SELECT max(`$sIdField`) FROM `$sRootTable`");
		};

		return self::Inc($sRootClass, $oNewObjectCallback);
	}*/

	/**
	 * @param $sConf
	 * @dataProvider GetClassNameProvider
	 * @throws \Exception
	 */
	public function testIncClass($sLeafClass)
	{
		$oMetaModel = test::double('MetaModel',
			[   'GetRootClass' => 'Ticket',
				'DBGetTable' => 'ticketTable',
				'DBGetKey' => 'ticket_id'
				]
		);
		$oCounter = test::double('ItopCounter',
			[ 'Inc' => '1']);

		$iNewId = ItopCounter::IncClass("UserRequest");

		$oMetaModel->verifyInvoked('GetRootClass', ["UserRequest"]);
		//$oMetaModel->verifyInvoked('DBGetTable', ["UserRequest"]);
		//$oMetaModel->verifyInvoked('DBGetKey', ["UserRequest"]);
		$oCounter->verifyInvoked('Inc', ['Ticket']);
		$this->assertEquals("1", $iNewId);
	}

	public function GetClassNameProvider()
	{
		return array(
			"UserRequest" => array("UserRequest"),
		);
	}
}

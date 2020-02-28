<?php
namespace Combodo\iTop\core;

use AspectMock\Test as test;
use PHPUnit\Framework\TestCase;

class ItopCounterTest extends TestCase
{
	public function setUp()
	{

		//parent::setUp();
		@include_once '../approot.inc.php';
		@include_once '../../approot.inc.php';
		@include_once '../../../approot.inc.php';
		@include_once '../../../../approot.inc.php';
		@include_once '../../../../../approot.inc.php';
		@include_once '../../../../../../approot.inc.php';
		@include_once '../../../../../../../approot.inc.php';
		@include_once '../../../../../../../../approot.inc.php';

		$cacheDir = APPROOT.'/data/test/_aspectmock';
		if (is_file($cacheDir))
		{
			array_map('unlink', glob("$cacheDir/*.*"));
			rmdir($cacheDir);
		}

		$kernel = \AspectMock\Kernel::getInstance();
		$kernel->init([
			'debug' => true,
			'application' => APPROOT,
			//'includePaths' => [APPROOT . 'core/', APPROOT . 'application/' ],
			'includePaths' => [
				APPROOT . 'core/',
				APPROOT . 'core/legacy',
				APPROOT . 'core/oql',
				APPROOT . 'core/oql/build',
				APPROOT . 'core/oql/build/PHP',
				APPROOT . 'core/oql/build/PHP/ParserGenerator',
				APPROOT . 'core/oql/build/PHP/LexerGenerator',
				APPROOT . 'core/oql/build/PHP/LexerGenerator/Regex',
			],
			//'includePaths' => [APPROOT],
			'cacheDir'  => $cacheDir,
			'excludePaths' => [APPROOT  . '/test/'] // tests dir should be excluded
		]);
	}

	protected function tearDown()
	{
		\AspectMock\Test::clean();
	}

	/**
	 * @param $sConf
	 * @throws \Exception
	 */
	public function testIncClassWithMockedInc()
	{
		$oMetaModel = test::double('MetaModel',
			[   'GetRootClass' => 'Ticket',
				'DBGetTable' => 'ticketTable',
				'DBGetKey' => 'ticket_id'
				]
		);
		$oCounter = test::double('ItopCounter',
			[ 'Inc' => '1']);

		$iNewId = \ItopCounter::IncClass("UserRequest");
		$oMetaModel->verifyInvoked('GetRootClass', ["UserRequest"]);
		$oCounter->verifyInvoked('Inc', ['Ticket']);
		$this->assertEquals("1", $iNewId);
	}

	public function IncProvider()
	{
		return array(
			'test inc with db update' => array(false, 666, 667),
			'test inc with db insert' => array(false, null, 1),
			'test incClass insert  with db insert' => array(true, null, 1000, 999),
		);
	}

	/**
	 * @param boolean $shouldCallInclass
	 * @param int $foundCounterValue
	 * @param $expectedNewCounterValue
	 *
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreOqlMultipleResultsForbiddenException
	 * @throws \CoreUnexpectedValue
	 * @throws \MySQLException
	 * @throws \OQLException
	 * @dataProvider IncProvider
	 */
	public function testInc($shouldCallInclass, $foundCounterValue, $expectedNewCounterValue, $foundRootClassValue=0)
	{
		$sCounterName = "UserRequest";


		/*$oConfig = test::double('Config',
			[   'Get',
			]
		);

		require_once(APPROOT.'env-production/autoload.php');*/


		$oMetaModel = test::double('MetaModel',
			[   'GetRootClass' => 'Ticket',
				'GetAttributeDef' => 'valueAttDef',
				'DBGetTable' => 'ticketTable',
				'DBGetKey' => 'ticket_id'
			]
		);

		//TODO chopper le constructeur et utiliser un mock pour lock/unlock
		$oItopMutex = test::double('iTopMutex', ['Lock' => null, 'Unlock' => null]);

		$oCMDBSource = test::double('CMDBSource',
			[
				'IsInsideTransaction' => false,
				'GetMysqli' => $this->createMock(\mysqli::class),
				'QueryToScalar' => $foundRootClassValue
			]);

		$oDBSearchMock = $this->createMock(\DBObjectSearch::class);
		$oDBSearchMock->expects($this->exactly(1))
			->method('MakeSelectQuery')
			->willReturn('SELECT blablalbalb');

		$oDBObjectSearch = test::double('DBObjectSearch',
			[   'FromOQL' => $oDBSearchMock]
		);

		/*$omysqli_resultMock = $this->createMock(\mysqli_result::class);
		$oMysqliDriver = test::double('mysqli_stmt',
			[
				'mysqli_query' => $omysqli_resultMock,
				'mysqli_fetch_array' => [1],
				'mysqli_free_result' => null
			]);*/

		$returnedCounterResult = null;
		if ($foundCounterValue!=null)
		{
			$returnedCounterResult = [ 1, $foundCounterValue];
		}
		$oItopCounter = test::double('ItopCounter',
			[
				'fetch_mysql_result_counter' => $returnedCounterResult,
				'call_mysql' => null
			]
		);

		$bIncClassAndInsertion = $shouldCallInclass && $foundCounterValue == null;
		$sUsedCounterName =($bIncClassAndInsertion) ? "Ticket" : $sCounterName;
		if ($foundCounterValue == null)
		{
			//check insert
			$aQueryParams = array(
				'key_name'  => $sUsedCounterName,
				'value'     => "$expectedNewCounterValue",
				'namespace' => \ItopCounter::class,
			);

			$oDBSearchMock->expects($this->exactly(1))
				->method('MakeInsertQuery')
				->with($aQueryParams);
		}
		else
		{
			//check update
			$aQueryParams = array(
				'value'     => "$expectedNewCounterValue",
			);

			$oDBSearchMock->expects($this->exactly(1))
				->method('MakeUpdateQuery')
				->with($aQueryParams);
		}

		if ($shouldCallInclass)
		{
			$iNewId = \ItopCounter::IncClass($sCounterName);
		}
		else
		{
			$iNewId = \ItopCounter::Inc($sCounterName);
		}

		if ($bIncClassAndInsertion)
		{
			$oCMDBSource->verifyInvoked('QueryToScalar', "SELECT max(`ticket_id`) FROM `ticketTable`" );
		}
		$subArrayArg = array(
			'key_name'  => $sUsedCounterName,
			'namespace' => \ItopCounter::class
		);
		$oDBObjectSearch->verifyInvokedMultipleTimes('FromOQL', 2,
			array('SELECT KeyValueStore WHERE key_name=:key_name AND namespace=:namespace', $subArrayArg)
		);

		$this->assertEquals($expectedNewCounterValue, $iNewId);
	}


}

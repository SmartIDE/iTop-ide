<?php

namespace Combodo\iTop\Config\Test\Validator;

use Combodo\iTop\Test\UnitTest\ItopTestCase;
use AspectMock\Test as test;

class StaticMockTest extends ItopTestCase
{

	public function setUp()
	{
		parent::setUp();
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

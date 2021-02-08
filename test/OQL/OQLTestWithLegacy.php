<?php
/**
 * @copyright   Copyright (C) 2010-2021 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */


namespace Combodo\iTop\Test\UnitTest\Core;


use Combodo\iTop\Test\UnitTest\ItopDataTestCase;
use SetupUtils;

class OQLTestWithLegacy extends ItopDataTestCase
{
	public function setUp()
	{
		parent::setUp();
		require_once(APPROOT.'application/startup.inc.php');
		SetupUtils::builddir(APPROOT.'log/test/OQLToSQL');
	}

	protected function GetId()
	{
		$sId = str_replace('"', '', $this->getName().$this->sSubTestName);
		$sId = str_replace('Legacy', '', $sId);
		$sId = str_replace(' ', '_', $sId);
		$sId = str_replace('All', '', $sId);
		return $sId;
	}
}
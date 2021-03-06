<?php
/*
 * @copyright   Copyright (C) 2010-2021 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace Combodo\iTop\Application\UI\Base\Layout\MultiColumn;


use Combodo\iTop\Application\UI\Base\AbstractUIBlockFactory;

/**
 * Class MultiColumnUIBlockFactory
 *
 * @author Eric Espie <eric.espie@combodo.com>
 * @package Combodo\iTop\Application\UI\Base\Layout\MultiColumn
 * @since 3.0.0
 */
class MultiColumnUIBlockFactory extends AbstractUIBlockFactory
{
	public const TWIG_TAG_NAME = 'UIMultiColumn';
	public const UI_BLOCK_CLASS_NAME = MultiColumn::class;

	public static function MakeStandard(?string $sId = null): MultiColumn
	{
		$oInput = new MultiColumn($sId);

		return $oInput;
	}
}

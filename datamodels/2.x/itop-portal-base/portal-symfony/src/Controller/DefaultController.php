<?php

// Copyright (C) 2010-2018 Combodo SARL
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

namespace Combodo\iTop\Portal\Controller;

use Combodo\iTop\Portal\Bricks\BricksCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 *
 * @package Combodo\iTop\Portal\Controller
 * @author Guillaume Lajarige <guillaume.lajarige@combodo.com>
 * @since 2.3.0
 */
class DefaultController extends Controller
{
    /**
     * @param Request          $oRequest
     *
     * @return Response
     */
    function homeAction(Request $oRequest, BricksCollection $bricksCollection)
    {
        $aData = array();

        // Rendering tiles
        $aData['aTilesRendering'] = array();

        /** @var \Combodo\iTop\Portal\Brick\PortalBrick $oBrick */
        foreach($bricksCollection->getBricks()['bricks'] as $oBrick)
        {
            // Doing it only for tile visible on home page to avoid unnecessary rendering
            if (($oBrick->GetVisibleHome() === true) && ($oBrick->GetTileControllerAction() !== null))
            {
                $aControllerActionParts = explode('::', $oBrick->GetTileControllerAction());
                if (count($aControllerActionParts) !== 2)
                {
                    return new Response('Tile controller action must be of form "\Namespace\ControllerClass::FunctionName" for brick "' . $oBrick->GetId() . '"', 500);
                }

                $sControllerName = $aControllerActionParts[0];
                $sControllerAction = $aControllerActionParts[1];

////                $oController =  $this->get($sControllerName);
                $oController = new $sControllerName();
                $oController->setContainer($this->container);
                /** @var Response $oResponse */
                $oResponse = $oController->$sControllerAction($oRequest, $oBrick->GetId());
                if ($oResponse->isSuccessful()) {
                    $aData['aTilesRendering'][$oBrick->GetId()] = $oResponse->getContent();
                } else {
                    $aData['aTilesRendering'][$oBrick->GetId()] = '
<div class="col-xs-12 col-sm-6">
        <div class="tile_decoration">
            <span class="icon fc fc-ongoing-request fc-2x"></span>
        </div>
        <div class="tile_body">
            <div class="tile_title">Oups!</div>
                <div class="tile_description">
                <p>An unexpected error happened,</p>
                <p>This brick cannot be dispayed for now.</p>
                </div>
                    </div>
    </div>'
                    ;
                }
            }
        }

        // Home page template
        $template = $this->getParameter('combodo.portal.instance.conf')['properties']['templates']['home'];

//        return new Response('hello world without twig, wich would have been:'.$template."\n<br />".var_export($aData, true));

//        $aData['app']['combodo.portal.instance.conf'] = $this->getParameter('combodo.portal.instance.conf');



        return $this->render($template, $aData);
    }

}
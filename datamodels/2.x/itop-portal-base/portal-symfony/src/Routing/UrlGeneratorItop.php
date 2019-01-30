<?php
/**
 * Created by Bruno DA SILVA, working for Combodo
 * Date: 29/01/19
 * Time: 15:35
 */

namespace Combodo\iTop\Portal\Routing;


use Symfony\Component\Routing\Exception\InvalidParameterException;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;
use utils;

use Symfony\Component\Routing\Generator\UrlGenerator as BaseUrlGenerator;

class UrlGeneratorItop extends BaseUrlGenerator
{


    /**
     * Overloading of the parent function to add the $_REQUEST parameters to the url parameters.
     * This is used to keep additionnal parameters in the url, especially when portal is accessed from the /pages/exec.php
     *
     * Note: As of now, it only adds the exec_module/exec_page/portal_id/env_switch/debug parameters. Any other parameter will be ignored.
     *
     * @param       $variables
     * @param       $defaults
     * @param       $requirements
     * @param       $tokens
     * @param       $parameters
     * @param       $name
     * @param       $referenceType
     * @param       $hostTokens
     * @param array $requiredSchemes
     *
     * @return string
     */
    protected function doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, array $requiredSchemes = array())
    {
        $parameters = $this->getItopExtraParams($parameters);

        return parent::doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }

    /**
     * @param $parameters
     *
     * @return mixed
     */
    protected function getItopExtraParams($parameters)
    {
        $sExecModule = utils::ReadParam('exec_module', '', false, 'string');
        $sExecPage = utils::ReadParam('exec_page', '', false, 'string');
        if ($sExecModule !== '' && $sExecPage !== '') {
            $parameters['exec_module'] = $sExecModule;
            $parameters['exec_page'] = $sExecPage;
        }

        // Optional parameters
        $sPortalId = utils::ReadParam('portal_id', '', false, 'string');
        if ($sPortalId !== '') {
            $parameters['portal_id'] = $sPortalId;
        }
        $sEnvSwitch = utils::ReadParam('env_switch', '', false, 'string');
        if ($sEnvSwitch !== '') {
            $parameters['env_switch'] = $sEnvSwitch;
        }
        $sDebug = utils::ReadParam('debug', '', false, 'string');
        if ($sDebug !== '') {
            $parameters['debug'] = $sDebug;
        }

        return $parameters;
    }


}
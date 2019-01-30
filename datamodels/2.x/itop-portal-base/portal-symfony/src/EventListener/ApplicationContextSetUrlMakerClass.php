<?php
/**
 * Created by Bruno DA SILVA, working for Combodo
 * Date: 04/03/19
 * Time: 17:36
 */

namespace Combodo\iTop\Portal\EventListener;


use Combodo\iTop\Portal\VariableAccessor\CombodoPortalInstanceConf;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class ApplicationContextSetUrlMakerClass
{
    /**
     * @var string
     */
    private $aCombodoPortalInstanceConf;

    /**
     * @param string $aCombodoPortalInstanceConf
     */
    public function __construct(CombodoPortalInstanceConf $aCombodoPortalInstanceConf)
    {
        $this->aCombodoPortalInstanceConf = $aCombodoPortalInstanceConf->getVariable();
    }

    public function onKernelRequest(GetResponseEvent $getResponseEvent)
    {
        if ($this->aCombodoPortalInstanceConf['properties']['urlmaker_class'] !== null)
        {
            \ApplicationContext::SetUrlMakerClass($this->aCombodoPortalInstanceConf['properties']['urlmaker_class']);
        }
    }
}
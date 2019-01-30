<?php
/**
 * Created by Bruno DA SILVA, working for Combodo
 * Date: 24/01/19
 * Time: 16:52
 */

namespace Combodo\iTop\Portal\EventListener;


use Combodo\iTop\Portal\Security\ItopUser;
use Combodo\iTop\Portal\VariableAccessor\CombodoPortalBaseAbsoluteUrl;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Exception;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use utils;
use Dict;
use LoginWebPage;
use UserRights;

class ItopUserProvider
{
    /** @var \ModuleDesign */
    private $moduleDesign;
    /** @var ItopUser */
    private $itopUser;
    /** @var CombodoPortalBaseAbsoluteUrl */
    private $combodoPortalBaseAbsoluteUrl;

    public function __construct(\ModuleDesign $moduleDesign, ItopUser $itopUser, CombodoPortalBaseAbsoluteUrl $combodoPortalBaseAbsoluteUrl)
    {
        $this->moduleDesign = $moduleDesign;
        $this->itopUser = $itopUser;
        $this->combodoPortalBaseAbsoluteUrl = $combodoPortalBaseAbsoluteUrl;
    }

    public function onKernelRequest(GetResponseEvent $getResponseEvent)
    {
        // User pre-checks
        // Note: At this point the Exception handler is not registered, so we can't use $oApp::abort() method, hence the die().
        // - Checking user rights and prompt if needed (401 HTTP code returned if XHR request)

        $iExitMethod = ($getResponseEvent->getRequest()->isXmlHttpRequest()) ? LoginWebPage::EXIT_RETURN : LoginWebPage::EXIT_PROMPT;
        $iLogonRes = LoginWebPage::DoLoginEx(PORTAL_ID, false, $iExitMethod);
        if( ($iExitMethod === LoginWebPage::EXIT_RETURN) && ($iLogonRes != 0) )
        {
            die(Dict::S('Portal:ErrorUserLoggedOut'));
        }
        // - User must be associated with a Contact
        if (UserRights::GetContactId() == 0)
        {
            die(Dict::S('Portal:ErrorNoContactForThisUser'));
        }

        // User
        $oUser = \UserRights::GetUserObject();
        if ($oUser === null)
        {
            throw new \Exception('Could not load connected user.');
        }
        $this->itopUser->setUser($oUser);
//        $container->set('combodo.current_user', $oUser);

        // Contact
        $sContactPhotoUrl = "{$this->combodoPortalBaseAbsoluteUrl}img/user-profile-default-256px.png";
        // - Checking if we can load the contact
        try
        {
            $oContact = \UserRights::GetContactObject();
        }
        catch (\Exception $e)
        {
            $oAllowedOrgSet = $oUser->Get('allowed_org_list');
            if ($oAllowedOrgSet->Count() > 0)
            {
                throw new \Exception('Could not load contact related to connected user. (Tip: Make sure the contact\'s organization is among the user\'s allowed organizations)');
            }
            else
            {
                throw new \Exception('Could not load contact related to connected user.');
            }
        }
        // - Retrieving picture
        if ($oContact)
        {
            if (\MetaModel::IsValidAttCode(get_class($oContact), 'picture'))
            {
                $oImage = $oContact->Get('picture');
                if (is_object($oImage) && !$oImage->IsEmpty())
                {
                    $sContactPhotoUrl = $oImage->GetDownloadURL(get_class($oContact), $oContact->GetKey(), 'picture');
                }
                else
                {
                    $sContactPhotoUrl = \MetaModel::GetAttributeDef(get_class($oContact), 'picture')->Get('default_image');
                }
            }
        }
        $this->itopUser->setContactPhotoUrl($sContactPhotoUrl);
//        $container->setParameter('combodo.current_contact.photo_url', $sContactPhotoUrl);
    }


}
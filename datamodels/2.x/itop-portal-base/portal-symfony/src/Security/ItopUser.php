<?php
/**
 * Created by Bruno DA SILVA, working for Combodo
 * Date: 29/01/19
 * Time: 15:04
 */

namespace Combodo\iTop\Portal\Security;


class ItopUser
{

    private $oUser;
    private $sContactPhotoUrl;

    public function setUser($oUser)
    {
        $this->oUser = $oUser;
    }

    public function setContactPhotoUrl($sContactPhotoUrl)
    {
        $this->sContactPhotoUrl = $sContactPhotoUrl;
    }
}
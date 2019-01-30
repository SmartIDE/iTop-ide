<?php
/**
 * Created by Bruno DA SILVA, working for Combodo
 * Date: 24/01/19
 * Time: 15:55
 */

namespace Combodo\iTop\Portal\DependencyInjection\SilexCompatBootstrap\PortalXmlConfiguration;


use Symfony\Component\DependencyInjection\Container;
use Exception;
use utils;
use UserRights;
use MetaModel;
use DOMFormatException;

class Basic extends AbstractConfiguration
{
    public function process(Container $container)
    {
        try
        {
            // Parsing file
            // - Default values
            $aPortalConf = $this->getInitialPortalConf();
            // - Global portal properties
            $aPortalConf = $this->ParseGlobalProperties($aPortalConf);
            // - Rectifying portal logo url
            $aPortalConf = $this->appendLogoUri($aPortalConf);
            // - User allowed portals
            $aPortalConf['portals'] = UserRights::GetAllowedPortals();

            // - class list
            $aPortalConf['lists'] = $this->getClassList();

            // - class list
            $aPortalConf['ui_extensions'] = $this->getUiExtensions($container);
        }
        catch (Exception $e)
        {
            throw new Exception('Error while parsing portal configuration file : '.$e->getMessage());
        }

        $container->setParameter('combodo.portal.instance.conf', $aPortalConf);
    }



    /**
     * @return array
     */
    private function getInitialPortalConf()
    {
        $aPortalConf = array(
            'properties' => array(
                'id' => PORTAL_ID,
                'name' => 'Page:DefaultTitle',
                'logo' => (file_exists(MODULESROOT.'branding/portal-logo.png')) ? utils::GetAbsoluteUrlModulesRoot(
                    ).'branding/portal-logo.png' : '../images/logo-itop-dark-bg.svg',
                'themes' => array(
                    'bootstrap' => 'itop-portal-base/portal/web/css/bootstrap-theme-combodo.scss',
                    'portal' => 'itop-portal-base/portal/web/css/portal.scss',
                    'others' => array(),
                ),
                'templates' => array(
                    'layout' => 'itop-portal-base/portal/src/views/layout.html.twig',
                    'home' => 'itop-portal-base/portal/src/views/home/layout.html.twig'
                ),
                'urlmaker_class' => null,
                'triggers_query' => null,
                'attachments' => array(
                    'allow_delete' => true
                ),
                'allowed_portals' => array(
                    'opening_mode' => null,
                ),
            ),
            'portals' => array(),
            'forms' => array(),
            'ui_extensions' => array(
                'css_files' => array(),
                'css_inline' => null,
                'js_files' => array(),
                'js_inline' => null,
                'html' => array(),
            ),
            'bricks' => array(),
            'bricks_total_width' => 0,
        );

        return $aPortalConf;
    }

    /**
     * @param ModuleDesign $oDesign
     * @param array        $aPortalConf
     *
     * @return array
     */
    private function ParseGlobalProperties(array $aPortalConf)
    {
        foreach ($this->getModuleDesign()->GetNodes('/module_design/properties/*') as $oPropertyNode) {
            switch ($oPropertyNode->nodeName) {
                case 'name':
                case 'urlmaker_class':
                case 'triggers_query':
                    $aPortalConf['properties'][$oPropertyNode->nodeName] = $oPropertyNode->GetText(
                        $aPortalConf['properties'][$oPropertyNode->nodeName]
                    );
                    break;
                case 'logo':
                    $aPortalConf['properties'][$oPropertyNode->nodeName] = $oPropertyNode->GetText(
                        $aPortalConf['properties'][$oPropertyNode->nodeName]
                    );
                    break;
                case 'themes':
                case 'templates':
                    $aPortalConf = $this->ParseTemplateAndTheme($aPortalConf, $oPropertyNode);
                    break;
                case 'attachments':
                    $aPortalConf = $this->ParseAttachments($aPortalConf, $oPropertyNode);
                    break;
                case 'allowed_portals':
                    $aPortalConf = $this->ParseAllowedPortals($aPortalConf, $oPropertyNode);
                    break;
            }
        }

        return $aPortalConf;
    }

    /**
     * @param array $aPortalConf
     * @param       $oPropertyNode
     *
     * @return array
     */
    private function ParseTemplateAndTheme(array $aPortalConf, $oPropertyNode)
    {
        foreach ($oPropertyNode->GetNodes('template|theme') as $oSubNode) {
            if (!$oSubNode->hasAttribute('id') || $oSubNode->GetText(null) === null) {
                throw new DOMFormatException(
                    'Tag '.$oSubNode->nodeName.' must have a "id" attribute as well as a value',
                    null, null, $oSubNode
                );
            }

            $sNodeId = $oSubNode->getAttribute('id');
            switch ($oSubNode->nodeName) {
                case 'theme':
                    switch ($sNodeId) {
                        case 'bootstrap':
                        case 'portal':
                        case 'custom':
                            $aPortalConf['properties']['themes'][$sNodeId] = $oSubNode->GetText(null);
                            break;
                        default:
                            $aPortalConf['properties']['themes']['others'][] = $oSubNode->GetText(null);
                            break;
                    }
                    break;
                case 'template':
                    switch ($sNodeId) {
                        case 'layout':
                        case 'home':
                            $aPortalConf['properties']['templates'][$sNodeId] = $oSubNode->GetText(null);
                            break;
                        default:
                            throw new DOMFormatException(
                                'Value "'.$sNodeId.'" is not handled for template[@id]',
                                null, null, $oSubNode
                            );
                            break;
                    }
                    break;
            }
        }

        return $aPortalConf;
}

    /**
     * @param array $aPortalConf
     * @param       $oPropertyNode
     *
     * @return array
     */
    private function ParseAttachments(array $aPortalConf, $oPropertyNode)
    {
        foreach ($oPropertyNode->GetNodes('*') as $oSubNode) {
            switch ($oSubNode->nodeName) {
                case 'allow_delete':
                    $sValue = $oSubNode->GetText();
                    // If the text is null, we keep the default value
                    // Else we set it
                    if ($sValue !== null) {
                        $aPortalConf['properties']['attachments'][$oSubNode->nodeName] = ($sValue === 'true') ? true : false;
                    }
                    break;
            }
        }

        return$aPortalConf;
}

    /**
     * @param array $aPortalConf
     * @param       $oPropertyNode
     *
     * @return array
     */
    private function ParseAllowedPortals(array $aPortalConf, $oPropertyNode)
    {
        foreach ($oPropertyNode->GetNodes('*') as $oSubNode) {
            switch ($oSubNode->nodeName) {
                case 'opening_mode':
                    $sValue = $oSubNode->GetText();
                    // If the text is null, we keep the default value
                    // Else we set it
                    if ($sValue !== null) {
                        $aPortalConf['properties']['allowed_portals'][$oSubNode->nodeName] = ($sValue === 'self') ? 'self' : 'tab';
                    }
                    break;
            }
        }

        return $aPortalConf;
}

    /**
     * @param array $aPortalConf
     *
     * @return array
     */
    private function appendLogoUri(array $aPortalConf)
    {
        $sLogoUri = $aPortalConf['properties']['logo'];
        if (!preg_match('/^http/', $sLogoUri)) {
            // We prefix it with the server base url
            $sLogoUri = utils::GetAbsoluteUrlAppRoot().'env-'.utils::GetCurrentEnvironment().'/'.$sLogoUri;
        }
        $aPortalConf['properties']['logo'] = $sLogoUri;

        return $aPortalConf;
}

    /**
     * Loads the classes lists from the module design XML. They are mainly used when searching an external key but
     * could be used more extensively later
     *
     * @return array
     */
    public function getClassList()
    {
        $iDefaultItemRank = 0;
        $aClassesLists = array();

        // Parsing XML file
        // - Each classes
        foreach ($this->getModuleDesign()->GetNodes('/module_design/classes/class') as $oClassNode)
        {
            $aClassLists = array();
            $sClassId = $oClassNode->getAttribute('id');
            if ($sClassId === null)
            {
                throw new DOMFormatException('Class tag must have an id attribute', null, null, $oClassNode);
            }

            // - Each lists
            foreach ($oClassNode->GetNodes('./lists/list') as $oListNode)
            {
                $aListItems = array();
                $sListId = $oListNode->getAttribute('id');
                if ($sListId === null)
                {
                    throw new DOMFormatException('List tag of "'.$sClassId.'" class must have an id attribute', null,
                        null, $oListNode);
                }

                // - Each items
                foreach ($oListNode->GetNodes('./items/item') as $oItemNode)
                {
                    $sItemId = $oItemNode->getAttribute('id');
                    if ($sItemId === null)
                    {
                        throw new DOMFormatException('Item tag of "'.$sItemId.'" list must have an id attribute', null,
                            null, $oItemNode);
                    }

                    $aItem = array(
                        'att_code' => $sItemId,
                        'rank' => $iDefaultItemRank
                    );

                    $oRankNode = $oItemNode->GetOptionalElement('rank');
                    if ($oRankNode !== null)
                    {
                        $aItem['rank'] = $oRankNode->GetText($iDefaultItemRank);
                    }

                    $aListItems[] = $aItem;
                }
                // - Sorting list items by rank
                usort($aListItems, function ($a, $b) {
                    return $a['rank'] > $b['rank'];
                });
                $aClassLists[$sListId] = $aListItems;
            }

            // - Adding class only if it has at least one list
            if (!empty($aClassLists))
            {
                $aClassesLists[$sClassId] = $aClassLists;
            }
        }

        return $aClassesLists;
    }

    private function getUiExtensions($container)
    {
        $aUIExtensions = array(
            'css_files' => array(),
            'css_inline' => null,
            'js_files' => array(),
            'js_inline' => null,
            'html' => array(),
        );
        $aUIExtensionHooks = array(
            \iPortalUIExtension::ENUM_PORTAL_EXT_UI_BODY,
            \iPortalUIExtension::ENUM_PORTAL_EXT_UI_NAVIGATION_MENU,
            \iPortalUIExtension::ENUM_PORTAL_EXT_UI_MAIN_CONTENT,
        );

        /** @var iPortalUIExtension $oExtensionInstance */
        foreach (MetaModel::EnumPlugins('iPortalUIExtension') as $oExtensionInstance)
        {
            // Adding CSS files
            $aImportPaths = array($container->getParameter('combodo.portal.base.absolute_path').'css/');
            foreach($oExtensionInstance->GetCSSFiles($container) as $sCSSFile)
            {
                // Removing app root url as we need to pass a path on the file system (relative to app root)
                $sCSSFilePath = str_replace(utils::GetAbsoluteUrlAppRoot(), '', $sCSSFile);
                // Compiling SCSS file
                $sCSSFileCompiled = $container->getParameter('combodo.absolute_url').utils::GetCSSFromSASS($sCSSFilePath,
                        $aImportPaths);

                if(!in_array($sCSSFileCompiled, $aUIExtensions['css_files']))
                {
                    $aUIExtensions['css_files'][] = $sCSSFileCompiled;
                }
            }

            // Adding CSS inline
            $sCSSInline = $oExtensionInstance->GetCSSInline($container);
            if ($sCSSInline !== null)
            {
                $aUIExtensions['css_inline'] .= "\n\n".$sCSSInline;
            }

            // Adding JS files
            $aUIExtensions['js_files'] = array_merge($aUIExtensions['js_files'],
                $oExtensionInstance->GetJSFiles($container));

            // Adding JS inline
            $sJSInline = $oExtensionInstance->GetJSInline($container);
            if ($sJSInline !== null)
            {
                // Note: Semi-colon is to prevent previous script that would have omitted it.
                $aUIExtensions['js_inline'] .= "\n\n;\n".$sJSInline;
            }

            // Adding HTML for each hook
            foreach ($aUIExtensionHooks as $sUIExtensionHook)
            {
                $sFunctionName = 'Get'.$sUIExtensionHook.'HTML';
                $sHTML = $oExtensionInstance->$sFunctionName($container);
                if ($sHTML !== null)
                {
                    if (!array_key_exists($sUIExtensionHook, $aUIExtensions['html']))
                    {
                        $aUIExtensions['html'][$sUIExtensionHook] = '';
                    }
                    $aUIExtensions['html'][$sUIExtensionHook] .= "\n\n".$sHTML;
                }
            }
        }

        return $aUIExtensions;
    }
}
<?php
/**
 * Created by Bruno DA SILVA, working for Combodo
 * Date: 31/01/19
 * Time: 16:44
 */

namespace Combodo\iTop\Portal\Routing;


use Exception;

class ItopExtensionsExtraRoutes
{
    static private $routes = array();

    /**
     * @param array $extraRoutes
     *
     * @throws Exception
     */
    public static function addRoutes($extraRoutes)
    {
        if (!is_array($extraRoutes)) {
            throw new Exception('Only array are allowed as parameter to '.__METHOD__);
        }

        self::$routes = array_merge(self::$routes, $extraRoutes);
    }

    public static function getRoutes()
    {
        return self::$routes;
    }
}
<?php

//require_once (dirname(__DIR__).'/../../../../lib/composer-vendor/autoload.php');

use Combodo\iTop\Portal\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

require_once APPROOT . '/core/moduledesign.class.inc.php';
require_once APPROOT . '/application/loginwebpage.class.inc.php';
require_once APPROOT . '/sources/autoload.php';


require dirname(__DIR__).'/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = isset($_SERVER['TRUSTED_PROXIES']) ? $_SERVER['TRUSTED_PROXIES'] : (isset($_ENV['TRUSTED_PROXIES']) ? $_ENV['TRUSTED_PROXIES'] : false)) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = isset($_SERVER['TRUSTED_HOSTS']) ? $_SERVER['TRUSTED_HOSTS'] : (isset($_ENV['TRUSTED_HOSTS']) ? $_ENV['TRUSTED_HOSTS'] : false)) {
    Request::setTrustedHosts([$trustedHosts]);
}

if (!defined('PORTAL_ID')) {
    throw new \Exception('Cannot load module design, Portal ID is not defined');
}

$_SERVER['APP_ENV'] = utils::GetCurrentEnvironment(); 

$_ENV['ITOP_CACHE_PATH'] = utils::GetCachePath();

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

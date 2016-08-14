<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//------------------------------------

require_once __DIR__.'/server/Router.class.php';
require_once __DIR__.'/server/AutoLoader.class.php';
require_once __DIR__.'/client/config/routs.php';

/*spl_autoload_register(function ($class) {
    die($class);
    include $path. '/'. $class . '.class.php';
});*/

$routerObj = new server\Router($routs);
list($rout , $params) = $routerObj->dispatcher();

if(is_array($rout) && !empty($rout)){
    $controller = $rout['reaction']['controller'];
    $action = $rout['reaction']['action'];
    //$autoLoaderObj = new \server\AutoLoader($controller,'clientController');
    $class = \server\AutoLoader::getClass($controller,'clientController');

    $class->{$action}($params);

} else {
    echo 'notFound';
}




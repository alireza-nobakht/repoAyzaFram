<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//------------------------------------

require_once __DIR__.'/server/Router.class.php';
require_once __DIR__.'/client/config/routs.php';

$routerObj = new server\Router($routs);

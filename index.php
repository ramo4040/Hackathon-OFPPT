

<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

require_once 'App/Config/Init.php';
require_once 'App/Helper/Autoloader.php';
require_once 'App/Config/Container.php';
require_once 'App/Routes/api.php';
session_start(); 

App\Routes\Router::route($_SERVER['REQUEST_METHOD']);


?>



<?php

require_once 'App/Helper/Autoloader.php';
require_once 'App/Config/Container.php';
require_once 'App/Routes/api.php';
session_start(); 

App\Routes\Router::route($_SERVER['REQUEST_METHOD']);


?>

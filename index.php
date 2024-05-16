<?php


ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 0,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict' // Helps mitigate CSRF attacks
]);

require_once 'App/Config/Init.php';
require_once 'vendor/autoload.php'; // autoloader
require_once 'App/Config/Container.php';
require_once 'App/Routes/api.php';

session_start();

App\Routes\Router::route($_SERVER['REQUEST_METHOD']);

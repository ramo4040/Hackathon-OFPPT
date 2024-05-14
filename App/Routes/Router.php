<?php

namespace App\Routes;

use App\Core\App;

class Router {
    private static $routes = [];

    public static function get($route, $handler) {
        self::$routes['GET'][$route] = $handler;
    }

    public static function post($route, $handler) {
        self::$routes['POST'][$route] = $handler;
    }

    public static function put($route, $handler) {
        self::$routes['PUT'][$route] = $handler;
    }

    public static function delete($route, $handler) {
        self::$routes['DELETE'][$route] = $handler;
    }

    /**
     * @param array $request_method => GET POST ....
     */

    public static function route($request_method) {
        if (isset(self::$routes[$request_method])) {
            $request_uri = str_replace('/hackathon', '', $_SERVER['REQUEST_URI']);
            foreach (self::$routes[$request_method] as $route_pattern => $handler) {
                if (self::matchRoute($route_pattern, $request_uri)) {
                    self::callHandler($handler, $request_uri);
                    return;
                }
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }


    /**
     * @param array $route_pattern => route inside self::routes 
     * @param string $request_uri => url entred by user 
     */

    private static function matchRoute($route_pattern, $request_uri) {
        $regex = str_replace('/', '\/', $route_pattern);
        $regex = str_replace('{id}', '(\d+)', $regex);
        $regex = '/^' . $regex . '$/';

        return preg_match($regex, $request_uri);
    }

    private static function callHandler($handler, $request_uri) {
        $matches = [];
        preg_match('/\d+/', $request_uri, $matches);
        $id = $matches[0] ?? null;
        $controller = App::container()->get($handler[0]);
        call_user_func([$controller, $handler[1]], $id);
    }
}

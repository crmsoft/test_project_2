<?php

namespace App\Routing;

use App\Exception\BasicException;

class Router{

    /**
     * find matching controller and return action call result
     * @return mixed
     * @throws BasicException
     */
    public static function resolve(){

        $routes = self::getRoutes();
        $requested_route = self::getRequestedRoute();

        if(isset($routes[$requested_route])){
            return self::resolveRoute( $routes[$requested_route] );
        } else if(isset($routes['/404'])){
            // any other route that not matches
            // if 404 route is defined is resolved as
            return self::resolveRoute( $routes['/404'] );
        } throw new BasicException('the routes is not configured');
    }

    public static function resolveRoute( $route ){

        $name_space = 'App\\Controllers\\';

        $parts = preg_split('/\@/',$route);
        // controller full psr4 path
        // first part is must be controller name
        $controller = "$name_space{$parts[0]}";
        // second part must be method name
        $action = $parts[1];

        // check if controller exists
        if (!class_exists($controller)) {
            throw new BasicException("class $controller is not found");
        }

        // create reflection class and check if the function of given class is exists...
        $ref = new \ReflectionClass("$controller");
        if(!$ref->hasMethod($parts[1])){
            throw new BasicException("method $action of class $controller is not defined");
        }

        // return response from the method
        return $ref->getMethod($parts[1])->invoke(new $controller);
    }

    /**
     * returns current route
     * @return string
     */
    public static function getRequestedRoute(){

        $requested_route = isset($_GET['params']) ? $_GET['params']:'';

        return empty($requested_route) ? '/': "/$requested_route";
    }

    /**
     * includes array with routes
     * @return array
     */
    public static function getRoutes(){
        return include __DIR__.'/routes.php';
    }

    public static function isLogin(){
        return self::getRequestedRoute() == '/login';
    }
}
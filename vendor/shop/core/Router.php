<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 30.05.2018
 * Time: 17:52
 */

namespace shop;


class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regExp, $route = [])
    {
        self::$routes[$regExp] = $route;

    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }


    public static function dispatch($url)
    {

        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Метод $action $controller не найден");
                }
            } else {
                throw new \Exception("Клнтроллер $controller не найден");
            }
        } else {
            throw new \Exception('Page not find', 404);
        }
    }

    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#i", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }

                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }

                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;

    }

    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }


    protected static function removeQueryString($url){
        if($url){
            $params = explode('&',$url, 2);
            if(false === strpos( $params[0] , '=')){
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }

}
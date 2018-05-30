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

    public static function getRoute(): array
    {
        return self::$route;
    }


    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            echo "ok";
        } else {
            echo "no";
        }
    }

    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {

            debug(preg_match($pattern, $url));

            if (preg_match("#{$pattern}#", $url, $matches)) {
                debug($matches);
                return true;
            }
        }
        return false;

    }


}
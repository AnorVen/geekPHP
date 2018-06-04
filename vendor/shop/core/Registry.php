<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 28.05.2018
 * Time: 18:56
 */

namespace shop;


class Registry
{
    use TSingletone;

    protected static $properties = [];

    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    public function getProperty($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties()
    {
        return self::$properties;
    }


}
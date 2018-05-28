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

    public static $propertys = [];

    public static function setProperty($name, $value)
    {
        self::$propertys[$name] = $value;
    }

    public static function getProperty($name)
    {
        if(isset(self::$propertys[$name])){
            return self::$propertys[$name];
        }
        return null;

    }

    public function getPropertys()
    {
        return self::$propertys;
    }


}
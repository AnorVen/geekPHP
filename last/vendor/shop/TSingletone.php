<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 28.05.2018
 * Time: 19:18
 */

namespace shop;


trait TSingletone
{
    private static $instance;

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}
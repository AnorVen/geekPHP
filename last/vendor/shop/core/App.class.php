<?php

namespace shop;


class App
{
    public static $app;
    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        self::$app = Registry::instance();

    }

    protected function getParams(){
        $params = require_once path_root . '/params.php';
    }



}
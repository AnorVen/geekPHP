<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 04.06.2018
 * Time: 16:33
 */

namespace shop;

use \RedBeanPHP\R as R;

class Db
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['password']);
        if (!R::testConnection()) {
            throw new \Exception('Connect for BD false', 500);
        }
        R::freeze(true);
        if(DEBUG){
            R::debug(true, 1);
        }


    }
}
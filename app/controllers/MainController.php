<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 01.06.2018
 * Time: 18:12
 */

namespace app\controllers;


use shop\App;

class MainController extends AppController
{
    // мы можем указывать базовый layout тут
    // public $layout = 'test';

    public function indexAction(){
        //или тут или в конфиге
        //$this->layout = 'test';

        $this->setMeta(App::$app->setProperty('shop_name'), 'desc index', 'ineindex');

    }

}
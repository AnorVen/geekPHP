<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 01.06.2018
 * Time: 18:12
 */

namespace app\controllers;


use RedBeanPHP\R;
use shop\App;
use shop\Cache;

class MainController extends AppController
{
    // мы можем указывать базовый layout тут
    // public $layout = 'test';

    public function indexAction(){

     $brands = R::findAll('brand');
     $hits = R::findAll("product", "hit = '1' and status = '1' LIMIT 8");
     $this->setData(compact('brands', 'hits'));
     $this->setMeta(App::$app->getProperty('shop_name'), 'desc index', 'ineindex');



    }

}
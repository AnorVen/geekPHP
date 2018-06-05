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
        //или тут или в конфиге
        //$this->layout = 'test';

        $photos = R::findAll('galery');
        $cache = Cache::instance();
        //$cache->set('test', $photos);
        //$cache->delete('test');
        $data = $cache->get('test');
        if(!$data){
            $cache->set('test', $photos);
        }


        $this->setMeta(App::$app->getProperty('shop_name'), 'desc index', 'ineindex');
        $this->setData(compact('photos'));


    }

}
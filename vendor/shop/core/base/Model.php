<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 04.06.2018
 * Time: 16:21
 */

namespace shop\base;


use shop\Db;

abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        Db::instance();

    }

    public function load($data){
        foreach ($this->attributes as $k=>$v){
            if(isset($data[$k])){
                $this->attributes[$k] = $data[$k];
            }
        }
    }

}
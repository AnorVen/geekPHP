<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 04.06.2018
 * Time: 16:21
 */

namespace shop\base;


use shop\Db;
use Valitron\Validator;

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

    public function validate($data){
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    public function getErrors(){
        $errors = '<ul>';
        foreach ($this->errors as $error){
            foreach ($error as $item){
                $errors .= "<li>$item </li>";
            }

        }
        $errors .='</ul>';
        $_SESSION['error'] = $errors;
    }

}
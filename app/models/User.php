<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 18.07.2018
 * Time: 15:52
 */

namespace app\models;


use RedBeanPHP\R;

class User extends AppModel
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'address' => '',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['name'],
            ['email'],
            ['address'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 3],
        ]
    ];
    public function checkunic(){

        $user = R::findOne('user','login = ? OR email = ?', [$this->attributes['login'],$this->attributes['email']]);
        if($user){
            if($user->login = $this->attributes['login']){
                $this->errors['unique'][] = 'логин занят';
            }
            if($user->email = $this->attributes['email']){
                $this->errors['unique'][] = 'почта уже используется другим пользователем';
            }
            return false;
        }
        return true;
    }

}


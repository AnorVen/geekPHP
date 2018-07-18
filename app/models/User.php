<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 18.07.2018
 * Time: 15:52
 */

namespace app\models;


class User extends AppModel
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'address' => '',
    ];

}
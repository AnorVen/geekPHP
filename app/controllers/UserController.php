<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 18.07.2018
 * Time: 15:51
 */

namespace app\controllers;


use app\models\User;

class UserController extends AppController
{
    public function signupAction()
    {
        if(!empty($_GET['user'])){
            $user = new User();
            $data = $_POST;
            $user->load($data);
        }
        $this->setMeta('rega');
    }

    public function loginAction()
    {
    }

    public function logoutAction()
    {
    }

    public function registerAction()
    {

    }

}
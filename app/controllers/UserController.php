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
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data)){
               $user->getErrors();
               redirect();
            } else{
                $_SESSION['success'] = 'Ok!';
            }
        }
        $this->setMeta('rega');
    }

    public function loginAction()
    {
    }

    public function logoutAction()
    {
    }

}
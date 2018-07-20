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
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkunic()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);


                if ($user->safe('user')) {
                    $this->loginAction();
                    $_SESSION['success'] = 'Ok!';


                } else {
                    $_SESSION['error'] = 'проблема с базой';

                }

            }
            redirect();
        }
        $this->setMeta('rega');
    }

    public function loginAction()
    {
        $this->setMeta('вход');
        if (!empty($_POST)) {
            $user = new User();
            if ($user->login()) {
                $_SESSION['success'] = 'Авторизация успешна';
            } else {
                $_SESSION['error'] = 'логин или пароль не верные';
            }
            redirect();

        }
    }

    public function logoutAction()
    {
        if(!empty($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        redirect();
    }

}
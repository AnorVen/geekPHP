<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 09.06.2018
 * Time: 15:29
 */

namespace app\controllers;


use RedBeanPHP\R;

class CurrencyController extends AppController
{
    function changeAction(){
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if($currency){
            $curr = R::findOne('currency', 'code = ?', [$currency]);
            if($curr){
                setcookie('currency', $currency, time() +3600 * 24, '/');
            }
        }
        redirect();

    }

}
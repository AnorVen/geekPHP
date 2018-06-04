<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 03.06.2018
 * Time: 21:02
 */

namespace app\controllers;
use app\models\AppModel;
use shop\base\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }

}
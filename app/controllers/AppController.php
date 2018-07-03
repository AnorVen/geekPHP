<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 03.06.2018
 * Time: 21:02
 */

namespace app\controllers;

use app\models\AppModel;
use app\widgets\currency\Currency;
use RedBeanPHP\R;
use shop\App;
use shop\base\Controller;
use shop\Cache;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('currencies', Currency::getCurrencies());
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));

        App::$app->setProperty('categories', self::CacheCategory());
    }

    static function CacheCategory()
    {
        $cache = Cache::instance();
        $categories = $cache->get('categories');
        if (!$categories) {
            $categories = R::getAssoc("SELECT * FROM category");
            $cache->set('categories', $categories);

        }
        return $categories;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 19.06.2018
 * Time: 16:13
 */

namespace app\controllers;


use RedBeanPHP\R;

class ProductController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = R::findOne('product', "alias = ? AND status ='1' ", [$alias]);
        if (!$product) {
            throw new \Exception('Товар не найден', '404');
        }

        // получить хлебные крошки

        // получить связанные товары

        $related = R::getAll('SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?', [$product->id]);


        //просмотренные товары - запись куки

        //просмотренные товары - получить из куки

        //галерея

        //получить все модификации товара, если есть

        $this->setMeta($product->title, $product->desc, $product->keywords);
        $this->setData(compact('product', 'related'));


    }
}
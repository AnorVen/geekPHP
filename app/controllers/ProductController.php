<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 19.06.2018
 * Time: 16:13
 */

namespace app\controllers;


use app\models\Breadcrumbs;
use app\models\Product;
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

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

        // получить связанные товары

        $related = R::getAll('SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?', [$product->id]);


        //просмотренные товары - запись куки

        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);

        //просмотренные товары - получить из куки
        $r_viewed = $p_model->getRecentlyViewed($product->id);
        $recentlyViewed = NULL;
        if($r_viewed){
            $recentlyViewed = R::find('product', 'id IN (' . R::genSlots($r_viewed) .') LIMIT 3', $r_viewed);
        }

        //галерея

        $gallery = R::findAll('gallery', 'product_id = ?', [$product->id]);

        //получить все модификации товара, если есть

        $mods = R::findAll('modification','product_id = ?', [$product->id]);
        debug($mods);







        $this->setMeta($product->title, $product->desc, $product->keywords);
        $this->setData(compact('product', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs', 'mods'));


    }
}
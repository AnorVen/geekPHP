<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 17.07.2018
 * Time: 17:15
 */

namespace app\controllers;


use app\models\Breadcrumbs;
use app\models\Category;
use RedBeanPHP\R;

class CategoryController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $category = R::findOne('category', 'alias = ?', [$alias]);
        if (!$category) {
            throw new \Exception('Category not found', 404);
        }
        // хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;
        $products = R::find('product', "category_id IN  ($ids)");
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->setData(compact('products', 'breadcrumbs'));


    }

}
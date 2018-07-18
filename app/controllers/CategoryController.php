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
use shop\App;
use shop\libs\Pagination;

class CategoryController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $category = R::findOne('category', 'alias = ?', [$alias]);
        if (!$category) {
            throw new \Exception('Category not found', 404);
        }

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;

        // хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);


        //пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('product', "category_id IN  ($ids)");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = R::find('product', "category_id IN  ($ids) LIMIT $start, $perpage");

        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->setData(compact('products', 'breadcrumbs', 'pagination'));


    }

}
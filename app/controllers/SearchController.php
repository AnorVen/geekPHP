<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 03.07.2018
 * Time: 20:12
 */

namespace app\controllers;


use RedBeanPHP\R;

class SearchController extends AppController
{
    public function typeaheadAction()
    {
        if ($this->isAjax()) {
            $query = !empty(trim($_GET['query'])) ? $_GET['query'] : NULL;
            if ($query) {
                $products = R::getAll('SELECT id, title FROM product WHERE title LIKE ? LIMIT 20', ["%{$query}%"]);
                echo json_encode($products);
            }
        }
        die();
    }

    public function indexAction()
    {
        $query = !empty(trim($_GET['s'])) ? $_GET['query'] : NULL;
        if ($query) {
            $products = R::find("'product' title LIKE ?", ["%{$query}%"]);
            echo json_encode($products);
        }
        $this->setMeta('Поиск по ' . h($query), 'search desc', 'search keywords');
        $this->setData(compact('products', 'query'));

    }
}
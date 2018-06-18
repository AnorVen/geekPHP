<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 09.06.2018
 * Time: 18:45
 */

namespace app\widgets\menu;


use RedBeanPHP\R;
use shop\App;
use shop\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'labaz_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu_base.php';
        $this->getOptions($options);
        $this->run();

    }

    protected function getOptions($options)
    {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }


    }

    public function run()
    {
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if (!$this->menuHtml) {
            $this->data = App::$app->getProperty('categoryes');
            if (!$this->data) {
                $this->data = $categoryes = R::getAssoc("SELECT * FROM {$this->table}");

            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if()
        }
        $this->output();

    }

    public function output()
    {
        echo $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->categoryToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function categoryToTemplate($category, $tab, $id)
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 25.06.2018
 * Time: 14:19
 */

namespace app\models;


use shop\App;

class Breadcrumbs
{
    public static function getBreadcrumbs($category_id, $title = '')
    {
        $cats = App::$app->getProperty('categories');
        $breadcrumbs_arr = self::getParts($cats, $category_id);
       $breadcrumbs = "<li><a href='". PATH .  " ' > Главная</a></li>";
       if($breadcrumbs_arr){
           foreach ($breadcrumbs_arr as $k => $v){
               $breadcrumbs .= "<li><a href='" . PATH . "category/{$k}'>{$v}</a></li>";
           }
       }
       if($title){
           $breadcrumbs .= "<li class='active'>{$title}</li>";
       }
       return $breadcrumbs;

    }

    public static function getParts($cats, $id)
    {
        if (!$id) {
            return false;
        }
        $breadcrumbs = [];
        foreach ($cats as $k => $v) {
            if(isset($cats[$id])){
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];

            } else{
                break;
            }
        }
        return array_reverse($breadcrumbs);


    }

}
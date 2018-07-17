<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 17.07.2018
 * Time: 17:21
 */

namespace app\models;
use shop\App;

class Category extends AppModel
{
    public function getIds($id){
        $cats = App::$app->getProperty('categories');
        $ids = null;
        foreach($cats as $k => $v){
            if($v['parent_id'] == $id){
                $ids .= $k . ',';
                $ids.=$this->getIds($k);

            }
        }
        return $ids;
    }

}
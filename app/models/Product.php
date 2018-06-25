<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 25.06.2018
 * Time: 13:16
 */

namespace app\models;


class Product extends AppModel
{
    public function setRecentlyViewed($id){
        $recentlyViewed = $this->getAllRecentlyViewed();
        if(!$recentlyViewed){
            setcookie('recentlyViewed', $id, time() + 3600*24, '/');

        }else{
            $recentlyViewed  = explode('.', $recentlyViewed);
            if(!in_array($id, $recentlyViewed)){
                $recentlyViewed[] = $id;
                $recentlyViewed = implode('.', $recentlyViewed);
                setcookie('recentlyViewed', $recentlyViewed, time() + 3600*24, '/');
            }

        }

    }
    public function getRecentlyViewed($id){
        if(!empty($_COOKIE['recentlyViewed'])){
            $recentlyViewed = $_COOKIE['recentlyViewed'];
            $recentlyViewed  = explode('.', $recentlyViewed);

            /// R - выдает ошибку при такой реализации.. подумать над решением вывода в просмотренных товарах товара который просматривают
           /* $recentlyViewed = array_slice($recentlyViewed, -4);

            if(in_array($id, $recentlyViewed)){
                unset($recentlyViewed[$id]);
            } else {
                $recentlyViewed  = array_slice($recentlyViewed, -3);
            }
            return $recentlyViewed;
           */

            return array_slice($recentlyViewed, -3);


        }

    }

    public function getAllRecentlyViewed(){
        if(!empty($_COOKIE['recentlyViewed'])){
            return $_COOKIE['recentlyViewed'];
        } else {
            return false;
        }

    }
}
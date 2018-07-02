<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 02.07.2018
 * Time: 14:08
 */

namespace app\models;


use shop\App;

class Cart extends AppModel
{
    public function addToCart($product, $qty = 1, $mod = null)
    {
        if (!isset($_SESSION['cart.currency'])) {
            $_SESSION['cart.currency'] = App::$app->getProperty('currency');
        }
        if($mod){
            $id = "{$product->id}-{$mod->id}";
            $title = "{$product->title}({$mod->title})";
            $price = $mod->price;
        } else{
            $id = $product->id;
            $title = $product->title;
            $price = $product->price;
        }

        if($_SESSION['catr'][$id]){
            $_SESSION['catr'][$id]['qty'] += $qty;
        }else{
            $_SESSION['catr'][$id] = [
                'qty' => $qty,
                'title' => $title,
                'alias' => $product->alias,
                'price' => $product->price * $_SESSION['cart.currency']['value'],
                'img' => $product->img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty
        : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ?
            $_SESSION['cart.sum'] + $qty * $price *$_SESSION['cart.currency']['value'] :
            $qty * $price * $_SESSION['cart.currency']['value'];

    }

}
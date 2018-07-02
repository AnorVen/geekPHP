<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 30.06.2018
 * Time: 23:31
 */

namespace app\controllers;


use app\models\Cart;
use RedBeanPHP\R;

class CartController extends AppController
{
    public function addAction()
    {
        $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
        $qty = !empty($_POST['qty']) ? (int)$_POST['qty'] : null;
        $mod_id = !empty($_POST['mod']) ? (int)$_POST['mod'] : null;
        $mod = null;
        if ($id) {
            $product = R::findOne('product', 'id = ?', [$id]);
            if (!$product) {
                return false;
            }
            if ($mod_id != 0) {
                $mod = R::findOne('modification', 'id = ? AND product_id = ?', [$mod_id, $id]);
            }
        }
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        } else {
            redirect();
        }

    }
}
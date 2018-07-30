<?php
/**
 * Created by PhpStorm.
 * User: Efremov.Georgiy
 * Date: 20.07.2018
 * Time: 17:03
 */

namespace app\models;


use RedBeanPHP\R;
use shop\App;

class Order extends AppModel
{
    public static function saveOrder($data)
    {
        $order = R::dispense('order');
        $order->user_id = $data['user_id'];
        $order->note = $data['note'];
        $order->currency = $_SESSION['cart.currency']['code'];
        $order_id = R::store($order);
        self::saveOrderProduct($order_id);
        return $order_id;

    }

    public static function saveOrderProduct($order_id)
    {
        $sql_path = '';
        foreach ($_SESSION['cart'] as $product_id => $product){
            $product_id = (int) $product_id;
            $sql_path .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']} ) ,";
        }
        $sql_path = rtrim($sql_path, ',');
        R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $sql_path");
    }

    public static function mailOrder($order_id, $user_email)
    {
        $transport = (new \Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'));

// Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

// Create a message
       ob_start();
       require APP . '\view\Mail\mail_order.php';
       $body = ob_get_clean();


        $message = (new \Swift_Message("order # {$order_id}"))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo(['_anor_@mail.ru', $user_email => 'Вася'])
            ->setBody($body, 'text/html')
        ;

// Send the message
        $result = $mailer->send($message);
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
        $_SESSION['success'] = 'заказ ушел';
    }

}
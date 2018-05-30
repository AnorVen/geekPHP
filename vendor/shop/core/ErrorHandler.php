<?php
/**
 * Created by PhpStorm.
 * User: Efremov.georgiy
 * Date: 30.05.2018
 * Time: 16:35
 */

namespace shop;


class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());

    }

    public function logErrors($message = '', $file = '', $line = '')
    {
        error_log('[' . date('Y-m-d H:i:s') . "], text: {$message} | file: {$file} | line: {$line} \n ================= \n ", 3, ROOT . '/tmp/errors.log');
    }

    public function displayError($errNo, $errStr, $errLine, $response = 404)
    {
        http_response_code($response);
        if($response == 404 && !DEBUG){
            require_once WWW . '/errors/404.php';
            die;
        }
        elseif (DEBUG){
            require_once WWW . '/errors/dev.php';
            die;
        }
        else{
            require_once WWW . '/errors/prod.php';
            die;
        }
    }


}
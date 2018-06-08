<?php
//header("Cache-Control: no-store, no-cache, must-revalidate");
session_start();
require_once 'autoload.php'; //подключаем файл с методами автозагрузки классов

require_once 'configuration/config.default.php';
require_once 'vendor/shop/core/libs/functions.php';
require_once 'configuration/routes.php';

new \shop\App();



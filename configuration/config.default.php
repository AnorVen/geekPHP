<?php
$config['db_user'] = 'root';
$config['db_password'] = '';
$config['db_base'] = 'GU';
$config['db_host'] = 'localhost';
$config['db_charset'] = 'UTF-8';

$config['path_root'] = __DIR__ . '../';
$config['path_public'] = $config['path_root'] . '/public';
$config['path_config'] = $config['path_root'] . '/configuration';
$config['path_model'] = $config['path_root'] . '/models';
$config['path_controller'] = $config['path_root'] . '/controller';
$config['path_cache'] = $config['path_root'] . '/cache';
$config['path_data'] = $config['path_root'] . '/data';
$config['path_fixtures'] = $config['path_data'] . '/fixtures';
$config['path_migrations'] = $config['path_data'] . '/migrate';
$config['path_commands'] = $config['path_root'] . '/lib/commands';
$config['path_libs'] = $config['path_root'] . '/lib';
$config['path_templates'] = $config['path_root'] . '/templates';

$config['path_logs'] = $config['path_root'] . '/tmp';

$config['sitename'] = 'Интернет-магазин | ';
$config['domain'] = 'http://GU';
$config['admin'] = $config['domain'] . '/admin';

/*
Конфигурация фотогаллереи
*/
$config['UPLOAD_DIR'] = $config['path_public']  . 'image/';
$config['UPLOAD_SMALL_DIR'] = $config['path_public']  . 'image/small/';





define("DEBUG", 1);
define("ROOT", dirname(__DIR__ ));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/shop/core');
define("LIBS", ROOT . '/vendor/shop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/configuration');
define("LAYOUT", 'default');

// http://ishop2.loc/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://ishop2.loc/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
// http://ishop2.loc
$app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);
define("ADMIN", PATH . '/admin');

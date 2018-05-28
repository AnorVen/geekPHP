<?php

class Basket
{


//Метод, показывающий общую информацию о корзине. В данный момент представленна в виде заглушки
public static function basketInfo()
{
	//Стоимость корзины	
	$basket_price = 100;
	//Количество наименований товаров в корзине
	$basket_count = 10;
	//Общее количество товаров в корзине
	$basket_count_good = 15;
	
	//Составим массив для отправки в браузер
	$result['basket_count_good'] = $basket_count_good;
	$result['basket_count'] = $basket_count;
	$result['basket_price'] = $basket_price;	
	
	return $result;
}

//В случае, если пользователь авторизован, то берем корзину из БД и сохраняем ее в сессии
public static function basketIsAuth()
{
	$id_user = $_SESSION['IdUserSession'];
	$sql = "select * from basket where id_user = (select id_user from users_auth where hash_cookie = '$id_user')";
	$basket_db = getAssocResult($sql);
	
	foreach ($basket_db as $key => $value)
	{
		$basket[$value['ID_UUID']] = $value['count'];
	}
	
	$_SESSION['basket'] = $basket;
}

//Соединяем корзину из сессии с корзиной из cookie
public static function BasketSessionCookie()
{
	if ($_SESSION['basket'])
	{
		$mass_basket_json = json_decode($_COOKIE['basket'],true);
		if (is_array($mass_basket_json))
		{
			$basket = array_merge($mass_basket_json, $_SESSION['basket']);
		}
	}
	
	$_SESSION['basket'] = $basket;
}


//Добавление товара в корзину
public static function addGoods($data_product_guid, $count_goods = 1, $isAuth = false)
{

	
	$basket = $_SESSION['basket'];

	$count_goods = $count_goods == '' ? 1 : (int)$count_goods;
	
//	$basket[$data_product_guid] = $count_goods;
	
	$basket[$data_product_guid] = isset($basket[$data_product_guid]) ? $basket[$data_product_guid] + 1 : 1;


	if ($isAuth)
	{

		$idUserSession = $_SESSION['IdUserSession'];

	
		
		//Создадим ззапрос для проверки наличия записи в БД
		$sql['sql'] = "select * from basket where ID_UUID = :data_product_guid and id_user = (select id_user from users_auth where hash_cookie = :idUserSession)";
		$sql['param'] = 
			[
				'data_product_guid' => $data_product_guid,
				'idUserSession' => $idUserSession,
			];		
		
		$goods_basket = db::getInstance()->SelectRow($sql['sql'], $sql['param']);

		
		$id = $goods_basket['id'];
		if ($goods_basket) //Если товар имеется в корзине
		{
			$sql['sql'] = "update basket set count = :count_goods where id = :id";
			$sql['param'] = 
				[
					'id' => $id,
					'count_goods' => $basket[$data_product_guid],
				];	
			db::getInstance()->Query($sql['sql'], $sql['param']);
		}
		else
		{
			$sql['sql'] = "insert into basket (id_uuid, count, id_user) value (:data_product_guid, :count_goods, (select id_user from users_auth where hash_cookie = :idUserSession));";
			$sql['param'] = 
				[
					'data_product_guid' => $data_product_guid,
					'count_goods' => $count_goods,
					'idUserSession' => $idUserSession,
				];	
			db::getInstance()->Query($sql['sql'], $sql['param']);
		}
		
	}
	
	$_SESSION['basket'] = $basket;

		
	Debug::SessCookClear();
	Debug::DebugAll($data_product_guid, $count_goods, $_SESSION, $goods_basket);
	
	$mass_basket_json = json_encode($basket);
	setcookie('basket', $mass_basket_json, TIME_COOKIE_BASKET, '/');
	return $result;
}




//Очистка корзины полная или выборочная запись
public static function ClearBasket($isAuth = false, $uuid = NULL)
{
	$basket = $_SESSION['basket'];
	
	if ($uuid)
	{
		unset($basket[$uuid]);
		if ($isAuth)
		{
			$sql = "DELETE FROM `basket` WHERE `basket`.`ID_UUID` = '$uuid';";
			executeQuery($sql);
		}
	}
	else
	{
		if ($isAuth)
		{
			$idUserSession = $_SESSION['IdUserSession'];
			$sql = "DELETE FROM `basket` WHERE `basket`.`id_user` = (select id_user from users_auth where hash_cookie = '$idUserSession');";
			executeQuery($sql); 
		}
		unset($basket);
	}
	
	$_SESSION['basket'] = $basket;
	$mass_basket_json = json_encode($basket);
	setcookie('basket', $mass_basket_json, TIME_COOKIE_BASKET, '/');
	return $result;
}	
	
}
	
?>
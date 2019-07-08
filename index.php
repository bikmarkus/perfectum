<?php
/*	echo '<pre>';
	var_dump($_SERVER['REQUEST_URI']);
	echo '</pre>';
*/
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	
	// Назначаем модуль и действие по умолчанию
	$module = 'index';
	$action = 'index';

	// Массив параметров из URI запроса
	$params = array();

	// Если запрошен любой URL кроме корня сайта
	if($_SERVER['REQUEST_URI'] != '/')
	{
		$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		
		// Разбиваем виртуальный URL по символу /
		$uri_parts = explode('/', trim($url_path,'/'));
			
		// Убираем домен из url:
		if($uri_parts[0]=='perfectum') array_shift($uri_parts);	
		
		$module_type = array_shift($uri_parts); // Получили имя модуля
		$module_name = array_shift($uri_parts); // Получили имя действия
		$_REQUEST['name'] = $module_name;
		// Получили в $params параметры запроса
		for($i=0;$i<count($uri_parts);$i++)
		{
			$params[$uri_parts[$i]] = $uri_parts[++$i];
		}
		include_once($module_type.'/controller.php');
	}
	else 
	{
		$_REQUEST['name'] = 'inbox';
		include_once('list/controller.php');
		die();
	}
	echo "\$module_type: $module_type\n";
	echo "\$module_name: $module_name\n";
	echo "\$params:\n";
	print_r($params);
?>


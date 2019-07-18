<?php
	include_once('redirecter.php');

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
		
		$module_type = array_shift($uri_parts); // Получили тип модуля
		$module_name = array_shift($uri_parts); // Получили имя модуля
		$_REQUEST['name'] = $module_name;
		// Получили в $params параметры запроса
		for($i=0;$i<count($uri_parts);$i++)
		{
			$params[$uri_parts[$i]] = $uri_parts[++$i];
		}
		$_REQUEST = array_merge($_REQUEST,$params);
		include_once($module_type.'/controller.php');
	}
	else 
	{
		$_REQUEST['name'] = 'inbox';
		include_once('list/controller.php');
		die();
	}
?>


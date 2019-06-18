<?php
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
	// Получить имя конечного файла
	$controls = array('PRO'=>'projects.txt','SMD'=>'someday.txt','REF'=>'reference.txt');
	$fileName = $controls[$_POST['listname']];
	// echo $fileName;
	// Записать содержимое последней строкой
	file_put_contents("lists/".$fileName, $_POST['value'], FILE_APPEND);
	// Прочитать исходный файл в массив
	// Удалить элемент с заданным id 
	// Записать результирующий массив в исходный файл
?>
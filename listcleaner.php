<?php
    // Получаем содержимое файла в массиве
    $listFileName = strtolower($_POST['listname']).'.txt';
    $itemAr = file('lists/'.$listFileName);
    // Удаляем элемент с нужным id и содержимым
    array_splice($itemAr, $_POST['id'], 1);
    // Записываем массив обратно в файл
    file_put_contents("lists/".$listFileName, $itemAr);
    include_once('listreader.php');
?>
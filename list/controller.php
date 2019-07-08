<?php
	include_once('model.php'); 
	$_REQUEST['listItems'] = getListContent($_REQUEST['name']);
	include_once('view.php');
    /*echo '<pre>';
    var_dump($_SERVER['REQUEST_URI']);
	var_dump($_REQUEST);
    echo '</pre>';*/
?>
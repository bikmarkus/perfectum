<?php 
	include_once('/../redirecter.php');
	include_once('model.php');
	if(isset($_REQUEST['del']))
	{
		delItem();
		redirect('/list/'.$_REQUEST["name"]);
	}
	if(isset($_REQUEST['add']))
	{
		$_REQUEST['name'] = $_REQUEST['listpicker'];
		addItem();
		redirect('/list/'.$_REQUEST["name"]);
	}
	$_REQUEST['listItems'] = getListContent($_REQUEST['name']);
	include_once('view.php');
?>

<?php 
	include_once('/../redirecter.php');
	include_once('model.php');
	if(isset($_REQUEST['del']))
	{
		delItem();
		redirect('/reference/'.$_REQUEST["name"]);
	}
	if(isset($_REQUEST['add']))
	{
		$_REQUEST["name"] = "reference";
		addItem();
		redirect('/reference/'.$_REQUEST["name"]);
	}
	$_REQUEST['listItems'] = getListContent($_REQUEST['name']);
	include_once('view.php');
?>

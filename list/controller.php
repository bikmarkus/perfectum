<?php 
	include_once('model.php');
	if(isset($_REQUEST['del']))
	{
		delItem();
		redirect('/list/'.$_REQUEST["name"]);
	}
	if($_REQUEST['name']=='add')
	{
		echo 'Hello';
	}
	$_REQUEST['listItems'] = getListContent($_REQUEST['name']);
	include_once('view.php');
?>

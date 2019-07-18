<?php 
	include_once('/../redirecter.php');
	include_once('model.php');
	if(isset($_REQUEST['del']))
	{
		delItem();
		redirect('/project/'.$_REQUEST["name"]);
	}
	if(isset($_REQUEST['add']))
	{
		$_REQUEST["name"] = "projects";
		addItem();
		redirect('/project/'.$_REQUEST["name"]);
	}
	if(isset($_REQUEST['edited']))
	{
		$_REQUEST["name"] = "projects";
		updateProject();
		redirect('/project/'.$_REQUEST["name"]);
	}
	$_REQUEST['listItems'] = getListContent($_REQUEST['name']);
	if(isset($_REQUEST['edit']))
		{
			$_REQUEST['listItems'] = NULL;
			$_REQUEST['project_dets'] = getProjectContent();
		}
	include_once('view.php');
?>

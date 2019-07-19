<?php 
	function dbCon()
	{
		try{
			$pdo = new PDO('mysql:host=localhost;dbname=perfectum','root','');
			return $pdo;
		}
		catch(PDOEXception $e){
			echo "Невозможно установить соединение с базой";
		}
	}
	function getListContent($listName)
	{
		$listDB = dbCon();
		$query = "SELECT * FROM ".$listName;
		$listObj = $listDB->query($query);
		if(!$listObj) return NULL;
		$listItems = array();
		try{
			while($listArr=$listObj->fetch())
				{
					$listItems[$listArr["id"]] = $listArr["project_title"];
				}
			return $listItems;
			}
			catch(PDOEXception $e){
				echo "Ошибка выполнения запроса: ". $e->getMessage();
			}
	}
	function delItem()
	{
		$listDB = dbCon();
		// Удаляем запись из таблицы СКД
		// Получаем id СКД
		$query = "SELECT `next_item_id` FROM `projects` WHERE `id`='".$_REQUEST['del']."';";
		$nextItemObj = $listDB->query($query);
		$nextItem=$nextItemObj->fetch();
		// Удаляем запись из таблицы СКД
		$query = "DELETE FROM `next` WHERE id='".$nextItem['next_item_id']."';";
		// Удаляем запись из таблицы проектов.
		$query .= "DELETE FROM ".$_REQUEST['name']." WHERE id=".$_REQUEST['del'];
		$delItem = $listDB->query($query);
	}
	function addItem()
	{
		$listDB = dbCon();
		// Вставляем СКД в таблицу next
		$query = "INSERT INTO `next` (`id`, `item_text`) VALUES (NULL, '".$_REQUEST['next_item']."');";
		$addItem = $listDB->query($query);
		// Получаем id СКД
		$query = "SELECT `id` FROM `next` WHERE `item_text`='".$_REQUEST['next_item']."';";
		$nextItemObj = $listDB->query($query);
		$nextItem=$nextItemObj->fetch();
		// Вставляем СКД в таблицу projects
		$query = "INSERT INTO `projects` (`id`, `project_title`,`project_description`, `next_item_id`) VALUES (NULL, '".$_REQUEST['project_title']."', '".$_REQUEST['project_description']."', '".$nextItem['id']."');";
		$addItem = $listDB->query($query);
	}
	function updateProject()
	{
		$projDB = dbCon();
		$query = "UPDATE `projects` 
				   SET `project_title`= '".$_REQUEST['project_title']."',
				   `project_description`= '".$_REQUEST['project_description']."',
				   `next_item`= '".$_REQUEST['next_item']."'
				   WHERE `id`='".$_REQUEST['id']."';";
		$updProject = $projDB->query($query);
	}
	function getProjectContent()
	{
		$projDB = dbCon();
		$query = "SELECT * FROM projects WHERE id=".$_REQUEST['edit'];
		$projObj = $projDB->query($query);
		$projectDets = array();
		try{
			while($proArr=$projObj->fetch())
				{
					$projectDets = array("id" => $proArr["id"],
										 "title" => $proArr["project_title"],
										 "description" => $proArr["project_description"],
										 "next" => $proArr["next_item"]);
				}
			return $projectDets;
			}
			catch(PDOEXception $e){
				echo "Ошибка выполнения запроса: ". $e->getMessage();
			}
	}
?>

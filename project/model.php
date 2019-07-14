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
		$query = "DELETE FROM ".$_REQUEST['name']." WHERE id=".$_REQUEST['del'];
		$delItem = $listDB->query($query);
	}
	function addItem()
	{
		$listDB = dbCon();
		$query = "INSERT INTO `projects` (`id`, `project_title`,`project_description`, `next_item`) VALUES (NULL, '".$_REQUEST['project_title']."', '".$_REQUEST['project_description']."', '".$_REQUEST['next_item']."');";
		$addItem = $listDB->query($query);
	}
?>

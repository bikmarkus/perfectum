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
					$listItems[$listArr["id"]] = $listArr['item_text'];
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
		$query = "INSERT INTO `".$_REQUEST['name']."` (`id`, `item_text`) VALUES (NULL, '".$_REQUEST['itemtext']."');";
		$addItem = $listDB->query($query);
	}
?>

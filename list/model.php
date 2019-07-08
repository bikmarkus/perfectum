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
		$listItems = array();
		try{
			while($listArr=$listObj->fetch())
				{
					$listItems[] = $listArr['item_text'];
				}
			return $listItems;
			}
			catch(PDOEXception $e){
				echo "Ошибка выполнения запроса: ". $e->getMessage();
			}
	}
?>
<?php
	$listFileName = strtolower($_POST['listname']).'.txt';
	$itemAr = file('lists/'.$listFileName);
	echo '<ul>';
	$itemId=0;
	$itemControl = '<span class="sortpanel">DEL</span>';
	foreach($itemAr as $item)
	{
		echo '<li><a href="'.$itemId++.'">'.$item.'</a>'.$itemControl.'</li>';
	}
	echo '</ul>';
?>

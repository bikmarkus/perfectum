<?php
	$listFileName = strtolower($_POST['listname']).'.txt';
	$itemAr = file('lists/'.$listFileName);
	$itemId=0;
	$itemControl = '<div class="sortpanel"><button>PRO</button><button>SMD</button><button>REF</button><button>DEL</button></div>';
	foreach($itemAr as $item)
	{
		echo '<div class="item" data-num="'.$itemId++.'"><a href="#">'.$item.'</a>'.$itemControl.'</div>';
	}
?>

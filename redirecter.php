<?php
	function redirect($url)
	{
		if(!headers_sent()){
			header("Location: ".$url);
			exit;
		} else {
			echo '<script>';
			echo 'window.location.href="'.$url.'";';
			echo '</script>';
			echo '<noscript>';
			echo '<meta http-equiv="refresh" content="0"; url='.$url.'" />';
			echo '</noscript>'; exit;
		}
	}
?>

<?php
    
	$db = new mysqli("db","devuser","devpass","test_db"); 
	$db->set_charset("utf8");

	if($db -> connect_error){
		echo 'connection failed' . $db -> connect_error;
	}

	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
?>

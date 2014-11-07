<?php
	$link = mysql_connect("localhost");
	mysql_select_db('base de donnée', $link);
	require 'templates/home.php';
	mysql_close($link);
?>
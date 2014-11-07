<?php
	$link = mysql_connect("localhost");
	mysql_select_db('base de donnée', $link);
	$result = mysql_query('SELECT id, title FROM post', $link);
	$posts = array();
	while ($row = mysql_fetch_assoc($result)) {
	    $posts[] = $row;
	}
	require 'templates/home.php';
	mysql_close($link);
?>
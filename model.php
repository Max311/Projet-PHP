<?php   
	function open_database_connection ()
	{
		$link = mysql_connect(getenv('IP') . ':3306', 'jeremieca', null);
		mysql_select_db('c9', $link);
		return $link;
	}
?>
<?php
    
    // It is a controller
    
    $link = mysql_connect(getenv('REMOTE_ADDR') . ':3306', 'jeremieca', null);

    mysql_select_db('c9', $link);
    
    $result = mysql_query('SELECT id, title FROM post', $link);
    
    $posts = array();
    
    while ($row = mysql_fetch_assoc($result)) {
        $posts[] = $row;
    }

    require 'templates/home.php';

    mysql_close($link);

?>
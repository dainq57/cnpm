<?php
    $conn = mysql_connect("localhost", "root", "") or die("Can't connect to database");
    mysql_select_db("employee", $conn);
    mysql_query("set names 'utf8'");
?>
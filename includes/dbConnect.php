<?php

$hostname = 'linuxproj.ecs.soton.ac.uk';
$username = 'gc1e12';
$password = '4980';
$schema = 'db_gc1e12';

//database connect or kill script and display MySql error
$connect = mysql_connect($hostname, $username, $password) or die (mysql_error());
$db = mysql_select_db($schema, $connect);

?>
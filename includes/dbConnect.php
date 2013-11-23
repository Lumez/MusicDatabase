<?php

$hostname = '';
$username = '';
$password = '';
$schema = '';

//database connect or kill script and display MySql error
$connect = mysql_connect($hostname, $username, $password) or die (mysql_error());
$db = mysql_select_db($schema, $connect);

?>
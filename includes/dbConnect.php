<?php

$hostname = 'linuxproj.ecs.soton.ac.uk';
$username = 'gc1e12';
$password = '4980';
$schema = 'db_gc1e12';

//create database object and connect to it, or display error
$db = new mysqli($hostname, $username, $password, $schema);
if ($db->connection_errno) {
	echo "Failed to connect to MySQL: " . $db->connect_error;
}

?>
<?php

require_once("includes/predispatch.php");
require("includes/dbConnect.php");

// User Inputs taken from HTML form and stored in these variables
//TODO: ADD CHECKS
$username = $_POST['username'];
$password = $_POST['password'];
$passwordMd5 = md5($password);


//If both $username and $password are true
if($username&&$password)
{
	//connection to the database - if fails it will die and return error message
	
	
	//Query to MySQL database - Checks the user input against all usernames in database
	//Collects all that match
	$authorisation = $db->query("SELECT * FROM authorisation WHERE username='$username' AND password='$passwordMd5'");

	//function to see how many rows there are
	//this to check whether the query worked correctly
	//if it failed it will be 0

	//if there are populated rows it will exectute
	if($authorisation->num_rows != 0)
	{
		//this code will be executed if all checks are passed
		// A Successful Login!
		$user = $authorisation->fetch_object();
		$_SESSION["loggedIn"] = true;
		$_SESSION["username"] = $user->username;
	} else {
		echo "Invalid Login!";
	}
	
	/*
	//there will be no rows in $check_rows if the username cannot be found
	
	//so it will kill the program and then tell the user that the username
	//doesn't exist.
	else 
	{
		die("Access Denied: Username doesnt exist!");
	}*/
}

//if there is a field empty it will do the following
else 
{
	die("Error: Please Enter both a Username and a Password!");
}

?>
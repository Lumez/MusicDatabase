<?php

require(includes/predispatch.php);

// User Inputs taken from HTML form and stored in these variables
$username = $_POST['username'];
$password = $_POST['password'];

//If both $username and $password are true
if($username&&$password)
{
	//connection to the database - if fails it will die and return error message
	require(includes/dbConnect.php);
	
	//Query to MySQL database - Checks the user input against all usernames in database
	//Collects all that match
	$query = mysql_query("SELECT * FROM users WHERE username='$username'");

	//function to see how many rows there are
	//this to check whether the query worked correctly
	//if it failed it will be 0
	$check_rows = mysql_num_rows($query);

	//if there are populated rows it will exectute
	if($check_rows!=0)
	{
		while ($row = mysql_fetch_assoc($query))
		{
			//fetches username and passswords from db
			$fetch_username = $row['username'];
			$fetch_password = $row['password'];
		}
		
		//check to see if the username matches the username in the database
		//also checks if password matches the password in the database
		//only executes in they both match
		if($username==$fetch_username&&$password==$fetch_password)
		{
			//this code will be executed if all checks are passed
			// A Successful Login!
			
			echo "'$username' is logged in! <a href='#'>Click here</a> to continue.";
			$_SESSION['username']=$username;
		}
		else 
		{
			echo "Incorrect Password!";
		}
	}
	
	
	//there will be no rows in $check_rows if the username cannot be found
	
	//so it will kill the program and then tell the user that the username
	//doesn't exist.
	else 
	{
		die("Access Denied: Username doesnt exist!");
	}
}

//if there is a field empty it will do the following
else 
{
	die("Error: Please Enter both a Username and a Password!");
}

?>
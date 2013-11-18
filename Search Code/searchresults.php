<?php
//database connect or kills script and displays MySql error
$connect = mysql_connect('hostname', 'username', 'password') or die (mysql_error());
$db = mysql_select_db("schema", $connect);

	
if(!isset($_POST['search'])) {
	header("Location:index.php");
	//if statement to redirect to index.php
	//only if $_POST['search'] is not set
}
//stores the post parameter from the HTML form
$user_input= $_POST['search'];

//SQL query - will select entries if they are LIKE the user input $_POST['search']
$sql_query="SELECT * FROM song WHERE name LIKE '%".$user_input."%' OR description LIKE '%".$user_input."%'";

//passes the query into the mysql_query function
$db_query=mysql_query($sql_query, $connect);

//A check to see if there is something in $db_query
//This is a check before doing mysql_fetch_assoc
//Simply avoiding potential errors here
if(mysql_num_rows($db_query)!=0) {
$result=mysql_fetch_assoc($db_query);
}

?>

<html>
<head>
</head>

<body>
<h1>Search Results</h1>
<?php 
//if db_query has not got 0 rows - execute code
if(mysql_num_rows($search_db)!=0) {
	do { 
?>
	<p><?php echo $result['name']; ?></p> <!-- Printing out name of each result -->
	
<?php
		//does mysql_fetch_assoc while echoing out name
		//mysql_fetch_assoc returns associative array
	} while ($result=mysql_fetch_assoc($db_query));
}

//if there are no rows found by doing mysql_num_rows
//echo out "No results found"
else {
	echo "No Results Found!";
?>
</body>

</html>
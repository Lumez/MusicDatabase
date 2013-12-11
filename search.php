<?php
	require('includes/dbConnect.php');
	require("pageTemplate.php");
	$page = new htmlPage();
	//$page->setTitle("Red Carpet Films - Latest Releases");
	//$page->setActiveClass("index");
	$page->streamTop();
?>

<div class = "mainBody">
	<h1>Search Results</h1>
	<p><a href = "home.php">Back to Homepage</a></p>

<?php
	
	try {
		if(!isset($_POST['search']) || empty($_POST['search'])) throw new Exception("Invalid Search, please try again.");

		//stores the post parameter from the HTML form
		$userInput= $db->real_escape_string($_POST['search']);

		//SQL query - will select entries if they are LIKE the user input $_POST['search']
		$musicians = $db->query("SELECT * FROM musician WHERE name LIKE '%{$userInput}%'");

		//check to see if there are results, if not throw "No Results Found!" exception
		if ($musicians->num_rows == 0) throw new Exception("No Results Found!");
		
		while($musician = $musicians->fetch_object()) {
			include('partials/search_result.php'); // Printing out name of each result
		}

	} catch (Exception $e) {
		echo "<p>{$e->getMessage()}</p><a href=\"home.php\">Home</a>";
	}
	
?>
</div>
<?php
	$page->streamBottom();
?>

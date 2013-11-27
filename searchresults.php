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
	
	//TODO: ADD CHECKS HERE
	if(!isset($_POST['search'])) {
		
	}

	//stores the post parameter from the HTML form
	$user_input= $_POST['search'];

	//SQL query - will select entries if they are LIKE the user input $_POST['search']
	$musicians = $db->query("SELECT * FROM musician WHERE name LIKE '%{$user_input}%'");

	//check to see if there are results
	//if so, show the results, else, show "No Results Found."
	if ($musicians->num_rows != 0) {
		while($musician = $musicians->fetch_object()) {
			?>
			<p><?=$musician->name?></p> <!-- Printing out name of each result -->
			<?php
		}
	} else {
		?>
		<p>No Results Found.</p>
		<?php
	}
?>
</div>
<?php
	$page->streamBottom();
?>

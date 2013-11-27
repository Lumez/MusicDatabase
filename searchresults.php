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
		if(!isset($_POST['search']) || empty($_POST['search']) || !is_string($_POST['search']))
			throw new Exception("Invalid Search. Please try again.", 1);

		//stores the post parameter from the HTML form
		$userInput= $_POST['search'];

		//SQL query - will select entries if they are LIKE the user input $_POST['search']
		$musicians = $db->query("SELECT * FROM musician WHERE name LIKE '%{$userInput}%'");

		//check to see if there are results
		//if so, show the results, else, show "No Results Found."
		if ($musicians->num_rows != 0) {
			while($musician = $musicians->fetch_object()) {
				?>
				<a href="musician.php?id=<?=$musician->musicianID?>"><?=$musician->name?></a> <!-- Printing out name of each result -->
				<?php
			}
		} else {
			?>
			<p>No Results Found.</p>
			<?php
		}
	} catch (Exception $e) {
		?>
			<p><?php echo $e->getMessage(); ?></p><a href="home.php">Home</a>
		<?php
	}
	
?>
</div>
<?php
	$page->streamBottom();
?>

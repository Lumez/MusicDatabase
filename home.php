<?php
	require('includes/predispatch.php');

	if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
		header('Location: index.php');
		exit;
	}

	require("pageTemplate.php");
	$page = new htmlPage();
	//$page->setTitle("Red Carpet Films - Latest Releases");
	//$page->setActiveClass("index");
	$page->streamTop();
?>

<div class = "mainBody">
	<h1>Music Database</h1>
	<h2>Search for a musician...</h2>
	<?php require('includes/search_form.php'); ?>
</div>

<?php
	$page->streamBottom();
?>
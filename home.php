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
	<h1>Music Database</h1><br/>
	<h2>Search for a musician...</h2>
	<?php require('includes/search_form.php'); ?>
	<br/><hr/><br/>
	<h2>Add Musician</h2>
	<?php require('includes/addMusician_form.php'); ?>
	<br/>
</div>

<?php
	$page->streamBottom();
?>
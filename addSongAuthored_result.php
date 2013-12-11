<?php
	require('includes/dbConnect.php');
	require('pageTemplate.php');
	$page = new htmlPage();
	$page->streamTop();
?>

<div class = "mainBody">
	<h1>Add Authored Song</h1>
	<p><a href = "home.php">Back to Homepage</a></p>

	<?php 
		try {
			if (!isset($_POST['songTitle']) OR !isset($_POST['albumID']) OR !isset($_POST['musicianID']) OR empty($_POST['songTitle']) OR empty($_POST['albumID']) OR empty($_POST['musicianID'])) { 
				throw new Exception('Please complete all the fields.');
			}

			$db->query("INSERT INTO song (title, albumID, author) VALUES ('{$db->real_escape_string($_POST['songTitle'])}', {$_POST['albumID']}, {$_POST['musicianID']})");
			
			?>
			<div class="alert alert-success">
				<strong>Success!</strong>
				<p>'<?=$_POST['songTitle']?>' has been successfully added to the database. </p><a href="musician.php?id=<?=$_POST['musicianID']?>">Back</a>
			</div>
			<?php

		} catch (Exception $e) {
			?>
			<div class="alert alert-danger">
				<strong>Error!</strong>
				<p><?=$e->getMessage()?></p>
			</div>
			<?php
		}
	?>		
</div>

<?php
	$page->streamBottom();
?>
<?php
	$songs = $db->query("SELECT * FROM song WHERE albumID={$album->albumID}");
	?>

	<h3><a href="#"><?=$album->title?></a></h3>
	<table class="table-max-width" >
	<tr>
		<th>SongID</th>
		<th>Title</th>
		<th>Author</th>
	</tr>
	<?php
		while ($song = $songs->fetch_object()){
			include('partials/song.php');
		}
	?>
	</table>

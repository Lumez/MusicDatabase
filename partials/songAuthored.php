<?php
	$album = $db->query("SELECT * FROM album WHERE albumID={$songAuthored->albumID}")->fetch_object();
	//$author = $db->query("SELECT * FROM musician WHERE musicianID={$song->author}")->fetch_object();
	?>
	<tr>
		<td><?=$songAuthored->songID?></td>
		<td><?=$songAuthored->title?></td>
		<td><?=$album->title?></td>
	</tr>
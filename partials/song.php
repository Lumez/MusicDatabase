<?php
	$song = $db->query("SELECT * FROM song WHERE songID={$songPerformed->songID}")->fetch_object();
	$instrument = $db->query("SELECT * FROM instrument WHERE instrumentID={$songPerformed->instrumentID}")->fetch_object();
	$author = $db->query("SELECT * FROM musician WHERE musicianID={$song->author}")->fetch_object();
	?>
	<tr>
		<td><?=$song->songID?></td>
		<td><?=$song->title?></td>
		<td><a href="musician.php?id=<?=$author->musicianID?>"><?=$author->name?></a></td>
		<td><?=$instrument->name?></td>
	</tr>
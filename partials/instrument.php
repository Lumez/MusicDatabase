<?php
	$instrument = $db->query("SELECT * FROM instrument WHERE instrumentID={$instrumentPlayed->instrumentID}")->fetch_object();
	?>
	<tr>
		<td><?=$instrument->instrumentID?></td>
		<td><?=$instrument->name?></td>
		<td><?=$instrument->key?></td>
	</tr>
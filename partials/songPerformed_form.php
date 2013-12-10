<?php
	$songs = $db->query("SELECT * FROM song");
	$instrumentsPlayed = $db->query("SELECT * FROM musician_instrument WHERE musicianID={$_GET['id']}");
?>
<div class="form-container">
	<form action="addSongPerformed_result.php" method="post" class="form-inline" role="form">
		<div class="form-group">
			<label class="sr-only" for="song">Song</label>
			<select class="form-control" name="songID" id="song">
				<?php
					while ($song = $songs->fetch_object()) {
						?>
						<option value="<?=$song->songID?>"><?=$song->title?></option>
						<?php
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label class="sr-only" for="instrument">Instrument Used</label>
			<select class="form-control" name="instrumentID" id="instrument">
				<?php
					while ($instrumentPlayed = $instrumentsPlayed->fetch_object()) {
						$instrument = $db->query("SELECT * FROM instrument WHERE instrumentID={$instrumentPlayed->instrumentID}")->fetch_object();
						?>
						<option value="<?=$instrument->instrumentID?>"><?=$instrument->name?></option>
						<?php
					}
				?>
			</select>
		</div>
		<input type="hidden" name="musicianID" value="<?=$_GET['id']?>">
		<button type="submit" class="btn btn-success">+</button>
	</form>
</div>
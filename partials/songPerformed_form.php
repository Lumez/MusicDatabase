<?php
	$songs = $db->query("SELECT * FROM song");
	$instruments = $db->query("SELECT * FROM instrument");
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
					while ($instrument = $instruments->fetch_object()) {
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
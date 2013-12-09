<?php
	$songs = $db->query("SELECT * FROM song");
	$instruments = $db->query("SELECT * FROM instrument");
?>
<div class="form-container">
	<form class="form-inline" role="form">
		<div class="form-group">
			<label class="sr-only" for="album">Song</label>
			<select class="form-control" id="album">
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
			<label class="sr-only" for="album">Instrument Used</label>
			<select class="form-control" id="album">
				<?php
					while ($instrument = $instruments->fetch_object()) {
						?>
						<option value="<?=$instrument->instrumentID?>"><?=$instrument->name?></option>
						<?php
					}
				?>
			</select>
		</div>
		<button type="submit" class="btn btn-success">+</button>
	</form>
</div>
<?php
	$instruments = $db->query("SELECT * FROM instrument");
?>
<div class="form-container">
	<form action="addInstrument_result.php" method="post" class="form-inline" role="form">
		<div class="form-group">
			<label class="sr-only" for="instrument">Instrument</label>
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

	
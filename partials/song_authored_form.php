<?php
	$albums = $db->query("SELECT * FROM album");
?>
<div class="form-container">
	<form class="form-inline" role="form">
		<div class="form-group">
			<label class="sr-only" for="songTitle">Song Title</label>
			<input type="email" class="form-control" id="songTitle" placeholder="Enter Title">
		</div>
		<div class="form-group">
			<label class="sr-only" for="album">Album</label>
			<select class="form-control" id="album">
				<?php
					while ($album = $albums->fetch_object()) {
						?>
						<option value="<?=$album->albumID?>"><?=$album->title?></option>
						<?php
					}
				?>
			</select>
		</div>
		<button type="submit" class="btn btn-success">+</button>
	</form>
</div>

	
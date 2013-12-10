<?php
	$albums = $db->query("SELECT * FROM album WHERE musicianID={$_GET['id']}");
?>
<div class="form-container">
	<form action="addSongAuthored_result.php" method="post" class="form-inline" role="form">
		<div class="form-group">
			<label class="sr-only" for="songTitle">Song Title</label>
			<input type="text" name="songTitle" class="form-control" id="songTitle" placeholder="Enter Title">
		</div>
		<div class="form-group">
			<label class="sr-only" for="album">Album</label>
			<select class="form-control" name="albumID" id="album">
				<?php
					while ($album = $albums->fetch_object()) {
						?>
						<option value="<?=$album->albumID?>"><?=$album->title?></option>
						<?php
					}
				?>
			</select>
		</div>
		<input type="hidden" name="musicianID" value="<?=$_GET['id']?>">
		<button type="submit" class="btn btn-success">+</button>
	</form>
</div>

	
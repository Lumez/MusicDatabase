

<!--<input type="submit" value="Add Album"></input> -->
<br/>
<button type="button" class="btn btn-info" id="showform" onclick="$( '#album_form' ).show();$( '#showform' ).hide();">-Add Album-</button>
<br/>
<div class="col-md-12 page-section" id="album_form">

	<form role="form" action="addAlbum_process.php" method="POST" onsubmit="">
		<input type="hidden" class="form-control" placeholder="Enter album title" name="musicianID" value="<?= $_GET['id']?>">
		Title: 	<input type="title" placeholder="Enter album title" name="title" style="width:200px;">

				
		<br/><br/> 

		<input type="submit" value="submit">
		<br/>

	</form>
</div>
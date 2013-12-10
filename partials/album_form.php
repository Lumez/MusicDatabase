

<!--<input type="submit" value="Add Album"></input> -->
<br/>
<button type="button" class="btn btn-info" id="showform" onclick="$( '#album_form' ).show();$( '#showform' ).hide();">-Add Album-</button>
<br/>
<div class="col-md-12 page-section" id="album_form">

	<form role="form" action="addAlbum_process.php" method="POST" onsubmit="return albumformValidator();">
		<input type="hidden" class="form-control" placeholder="Enter album title" name="musicianID" value="<?= $_GET['id']?>">
		Title: 	<input type="title" id="title" placeholder="Enter album title" name="title" style="width:300px;" onfocus="clearContents(this);">

				
		<br/><br/> 

		<input type="submit" value="submit">
		<br/>

	</form>
</div>

<script type="text/javascript"src="js/albumformValidator.js"></script>
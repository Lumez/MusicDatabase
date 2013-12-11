

<!--<input type="submit" value="Add Album"></input> -->
<br/>
<button type="button" class="btn btn-info" id="showform" onclick="$( '#album_form' ).show();$( '#showform' ).hide();">-Add Album-</button>
<br/>
<div class="col-md-12 page-section" id="album_form">

	<form role="form" action="addAlbum_process.php" method="POST" onsubmit="return albumformValidator();">
		<input type="hidden" class="form-control" placeholder="Enter album title" name="musicianID" value="<?= $_GET['id']?>">
		<!-- main visible title text input -->
		Title: 	<input type="text" id="title" placeholder="Enter album title" name="title" style="width:400px;" onfocus="clearContents(this);">

				
		<br/><br/> 

		<input type="submit" value="submit">
		<br/>
		<button type="button" class="btn btn-info" id="showform" onclick="$( '#album_form' ).hide();$( '#showform' ).show();">-Close Form-</button>
	</form>
</div>

<script type="text/javascript"src="js/albumformValidator.js"></script>


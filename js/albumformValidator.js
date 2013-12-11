	//validation for adding of album
	function albumformValidator(){

		var validate = true;

		var title = document.getElementById("title").value.trim();

		if(title == "" || title=="Please enter the album name*"){

			validate = false;
			//set the color to red.
			var link = document.getElementById("title");
			link.setAttribute("style","color:red;width:400px;");
			$("#title").val("Please enter the album name*");
		}

		return validate; 
	}

	
	function clearContents(target){

	target.setAttribute("style","color:default;width:400px;"); // change the color back to default and text box width to 400px
	
	target.setAttribute("value",""); //for input text
	target.value=''; // for textarea
	
}


	//validation for adding of album
	function albumformValidator(){

		var validate = true;

		var title = document.getElementById("title").value.trim();

		if(title == "" || title=="Please enter the album name*"){

			validate = false;
			$("#title").val("Please enter the album name*");
		}

		return validate; 
	}

	
	function clearContents(target){
	target.setAttribute("style","color:default");
	
	target.setAttribute("value",""); //for input text
	target.value=''; // for textarea
	
}


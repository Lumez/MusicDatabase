function validateForm(){
	 var name = document.getElementById("name").value;
	 var phoneNumber = document.getElementById("phoneNumber").value;
	 var validate = true;
	    
	 if (name.trim() == "" || name.trim() == "Enter your name"){                
		  var link = document.getElementById("name");
		  link.setAttribute("style","color:red");
		  link.value = "Enter your name";
		  validate = false;
	 }
	        
	 if (phoneNumber.trim() == "" || phoneNumber.trim() == "Enter your phone number here please..." || phoneNumber.trim().length != 11 || IsNumeric(phoneNumber)== false){
		  var link = document.getElementById("phoneNumber");
		  link.setAttribute("style","color:red");
		  link.value="Enter your phone number here please...";
		  validate = false;
	 }
	    
	     
	 if (validate == true){
		  return true;
	 }else{
		  return false;
	 }
}
      
function clearContents(area) {
	 if (area.value.trim() == "Enter your name"
		  || area.value.trim() == "Enter your phone number here please..."
		  || area.value.trim() == ""){
		  area.setAttribute("style","color:black");
		  area.value = "";
	 }   
}
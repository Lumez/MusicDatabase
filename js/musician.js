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

function validateForm2(){
         
         var str1 = document.getElementById("str1").value;
         var str2 = document.getElementById("str2").value;
         var city = document.getElementById("city").value;
         var zipCode = document.getElementById("zipCode").value;
         
	 var validate = true;

         if (str1.trim() == "" || str1.trim() == "Enter your Street 1"){                
		  var link = document.getElementById("str1");
		  link.setAttribute("style","color:red");
		  link.value = "Enter your Street 1";
		  validate = false;
	 }
         
         if (str2.trim() == "" || str2.trim() == "Enter your Street 2"){                
		  var link = document.getElementById("str2");
		  link.setAttribute("style","color:red");
		  link.value = "Enter your Street 2";
		  validate = false;
	 }
         
         if (city.trim() == "" || city.trim() == "Enter your City"){                
		  var link = document.getElementById("city");
		  link.setAttribute("style","color:red");
		  link.value = "Enter your City";
		  validate = false;
	 }
         
         if (zipCode.trim() == "" || zipCode.trim() == "Enter your Zip Code"){                
		  var link = document.getElementById("zipCode");
		  link.setAttribute("style","color:red");
		  link.value = "Enter your Zip Code";
		  validate = false;
	 }
	     
	 if (validate == true){
		  return true;
	 }else{
		  return false;
	 }
   
}

function clearContents2(area) {
	 if (area.value.trim() == "Enter your Street 1"
                  || area.value.trim() == "Enter your Street 2"
                  || area.value.trim() == "Enter your City"
                  || area.value.trim() == "Enter your Zip Code"
		  || area.value.trim() == ""){
		  area.setAttribute("style","color:black");
		  area.value = "";
	 }
}
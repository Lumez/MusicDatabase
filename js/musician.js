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
var x=0;
function addSelect() {
         document.getElementById('wrapper').innerHTML += '<tr><td>Instrument:</td><td><select name="instrument'+x+'" class="form-control"><option value="defaultInst">Select an instrument</option><option value="Flute">Flute</option><option value="Accordion">Accordion</option><option value="Drum">Drum</option><option value="Trumpet">Trumpet</option><option value="Violin">Violin</option><option value="Guitar">Guitar</option><option value="Piano">Piano</option><option value="Violin">Violin</option><option value="Clarinet">Clarinet</option></select></td></tr><tr><td>Instrument Musical Key (Optional):</td><td><select name="musicalKey" class="form-control"><option value="defaultKey">Select a key</option><option value="A">A</option><option value="Ab">Ab</option><option value="C">C</option><option value="B">B</option><option value="Bb">Bb</option><option value="Eb">Eb</option><option value="B flat">B flat</option><option value="F">F</option><option value="G">G</option><option value="F#">F#</option><option value="Db">Db</option><option value="D">D</option><option value="Ab alto">Ab alto</option></select></td></tr>';
         x++;
}
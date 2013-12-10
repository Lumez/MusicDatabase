<?php
	require('includes/dbConnect.php');

	$musicianID= $_POST["musicianID"];
	$title= $_POST["title"];
	$date= date('Y-m-d');
	
	if(isset($musicianID) && isset($title) && isset($date)){

		$result = $db->query("INSERT INTO album (musicianID, title, `date`) VALUES($musicianID, '$title', '$date')");

		if($result==true){

			echo("successful");
			header('Location: musician.php?id='.$musicianID);
		}else{
			echo("fail to add ");
		}

	}else{


		echo("missing variable from form!!!! ");

	}
	
	
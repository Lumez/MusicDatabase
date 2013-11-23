<!DOCTYPE html>
	<html>
	    <head>
		<title>Any... Musician</title>
		<link rel="shortcut icon" href="img/favicon.ico"/>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Script-Type" content="text/javascript;"/>
		
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>  <!--JQUERY file for the whole website-->
		<script type="text/javascript" src="js/toTop.js"></script>             <!--JQUERY file for the toTop Button-->
		
		<?php
		    $bg = array(1,3,4,5,6,7,8,9,10,11,12); // array of Image Names            
		    $i = rand(0, count($bg)-1); // generate random number size of the array
		    $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
		?>
	    
		<style type="text/css">
		    @import "css/style.css";
		    @import "css/jquery-ui.css";
		    
		    body{
			background: url("img/<?php echo $selectedBg; ?>.jpg") no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size:cover;
		    }
		</style>
	    </head>
	    
	    
	    <body>
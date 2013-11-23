<?php

require('includes/predispatch.php');


if (isset($_SESSION)&&$_SESSION['loggedIn']==true){
   header('Location: http://www.example.com/');
exit;
}

?>

<?php
    require('includes/dbConnect.php');
    require("pageTemplate.php");
    $page = new htmlPage();
    //$page->setTitle("Red Carpet Films - Latest Releases");
    //$page->setActiveClass("index");
    $page->streamTop();
?>         

<div class = "mainBody">
<form action='login.php' method='POST'>
	Username: <input type='text' name='username' /> <br />
	Password: <input type='password' name='password' /> <br /><br />
	<input type='submit' value='Submit' />
</form>
</div>
<?php
    $page->streamBottom();
?>
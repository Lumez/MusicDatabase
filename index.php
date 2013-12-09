<?php

require('includes/predispatch.php');


if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
    header('Location: home.php');
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
    <table>
	<tr>
	    <td>Username:</td>
	    <td><input class='form-control' placeholder="Enter your username" type='text' name='username' /></td>
	</tr>
	<tr>
	    <td>Password:</td>
	    <td><input class='form-control' placeholder="Enter your password" type='password' name='password' /></td>
	</tr><br/>
    </table>
    <input class='btn btn-primary' type='submit' value='Submit' />
</form>
</div>
<?php
    $page->streamBottom();
?>
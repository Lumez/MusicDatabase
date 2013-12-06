<?php
	require('includes/predispatch.php');
	require('includes/dbConnect.php');

	if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
		header('Location: index.php');
		exit;
	}

	require("pageTemplate.php");
	$page = new htmlPage();
	//$page->setTitle("Red Carpet Films - Latest Releases");
	//$page->setActiveClass("index");
	$page->streamTop();
	
	//Check to see if there is already a phone number
	if(isset($_GET['phoneNumber']) && isset($_GET['name']))
	{
		$phoneNumber = $_GET['phoneNumber'];
		$addresses = $db->query("SELECT * FROM address");
		
		while ($address = $addresses->fetch_object()){
				$musicianName = $_GET['name'];
				$musicianNumber = $_GET['phoneNumber'];
			if ($address->phoneNo == (int)$phoneNumber){
				
				$wholeAddress =  "<p>$address->Street1<br/>
									$address->Street2<br/>
									$address->city<br/>"
									.$address->{'Zip code'}."<br/>
									</p><br/>
									
									<form action='addMusician_result1.php' method='get'>
										<input type='hidden' value ='$musicianName' name='musicianName' />
										<input type='hidden' value ='$musicianNumber' name='musicianNumber' />
										<input type='submit' value='Confirm Address' />
									</form>";
			}
			else{
				$address_hide = "<div id='address_hide'>
								    <form name='addAddress_form' method='get' action='addMusician_result.php'>
								    <b>ADDRESS</b><br/>
								    <table>
								        <tr>
								            <td>
								                Street1:
								            </td>
								            <td>
								                 <input name='str1' type='text' size='40' maxlength='60'/><br/>
								            </td>
								        </tr>
								        <tr>
								            <td>
								                Street2:
								            </td>
								            <td>
								                <input name='str2' type='text' size='40' maxlength='60'/><br/>
								            </td>
								        </tr>
								        <tr>
								            <td>
								                City:
								            </td>
								            <td>
								                <input name='city' type='text' size='40' maxlength='60'/><br/>
								            </td>
								        </tr>
								        <tr>
								            <td>
								                Zip Code:
								            </td>
								            <td>
								                <input name='zipCode' type='text' size='40' maxlength='60'/><br/>
								            </td>
								        </tr>
								    </table> 
								    <input type='hidden' value ='$musicianName' name='musicianName' />
									<input type='hidden' value ='$musicianNumber' name='musicianNumber' />   
								    <input type='submit' name='submit' value='submit' />
								</form>
								</div>";
			}
		}
		
	}
	//else {
	//	echo "Please Enter a Name and a Phone Number!";
	//}
?>

<div class = "mainBody">
	<h1>Music Database</h1><br/>
	<h2>Search for a musician...</h2>
	<?php require('includes/search_form.php'); ?>
	<br/><hr/><br/>
	<h2>Add Musician</h2>
	
	<form name="addMusician_form" method="get" action="home.php">
	    Name:
	    <input name="name" type="text" size="40" maxlength="60" value="<?php if(isset($_GET['name'])) echo $_GET['name']; ?>" <?php if(isset($_GET['name'])) echo "readonly";?>/><br/>
	    Phone Number:
	    <input name="phoneNumber" type="text" size="40" value="<?php if(isset($_GET['phoneNumber'])) echo $_GET['phoneNumber']; ?>" maxlength="60" <?php if(isset($_GET['name'])) echo "readonly";?>/><br/>
	    <input type="submit" name="check_submit" value="Check Address Availability" />
	</form>
	
	<?php if(isset($wholeAddress)){
		echo $wholeAddress;
	}
	else if (isset($address_hide)) {
		echo $address_hide;
	}
	 ?>

   

	<br/>
</div>

<?php
	$page->streamBottom();
?>
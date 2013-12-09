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
										<input class='btn btn-primary' type='submit' value='Confirm Address' />
									</form>";
			}
			else{
				$address_hide = "<div id='address_hide'>
								    <form name='addAddress_form' method='get' action='addMusician_result.php' onsubmit='return validateForm2()'>
								    <b>ADDRESS</b><br/>
								    <table>
								        <tr>
								            <td>
								                Street1:
								            </td>
								            <td>
								                 <input class='form-control' id='str1' onfocus='clearContents2(this)' name='str1' type='text' size='40' maxlength='60'/><br/>
								            </td>
								        </tr>
								        <tr>
								            <td>
								                Street2:
								            </td>
								            <td>
								                <input class='form-control' id='str2' onfocus='clearContents2(this)' name='str2' type='text' size='40' maxlength='60'/><br/>
								            </td>
								        </tr>
								        <tr>
								            <td>
								                City:
								            </td>
								            <td>
								                <input class='form-control' id='city' onfocus='clearContents2(this)' name='city' type='text' size='40' maxlength='60'/><br/>
								            </td>
								        </tr>
								        <tr>
								            <td>
								                Zip Code:
								            </td>
								            <td>
								                <input class='form-control' id='zipCode' onfocus='clearContents2(this)' name='zipCode' type='text' size='40' maxlength='60'/><br/>
								            </td>
								        </tr>
								    </table> 
								    <input type='hidden' value ='$musicianName' name='musicianName' />
									<input type='hidden' value ='$musicianNumber' name='musicianNumber' />   
								    <input class='btn btn-primary' type='submit' name='submit' value='Submit' />
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
	<h3>Music Database</h3><br/>
	<h4>Search for a musician...</h4>
	<?php require('includes/search_form.php'); ?>
	<br/><hr/><br/>
	<h4>Add Musician</h4>
	
	<form name="addMusician_form" method="get" action="home.php" onsubmit="return validateForm()">
		<table>
			<tr>
				<td>
					Name:
				</td>
				<td>
					<input class="form-control" name="name" id="name" type="text" onfocus="clearContents(this)" size="40" maxlength="60" value="<?php if(isset($_GET['name'])) echo $_GET['name']; ?>" <?php if(isset($_GET['name'])) echo "readonly";?>/>
				</td>
			</tr>
			<tr>
				<td>
					Phone Number:
				</td>
				<td>
					<input class="form-control" name="phoneNumber" id="phoneNumber" onfocus="clearContents(this)" type="text" size="40" value="<?php if(isset($_GET['phoneNumber'])) echo $_GET['phoneNumber']; ?>" maxlength="60" <?php if(isset($_GET['name'])) echo "readonly";?>/>
				</td>
			</tr>
			<tr>
				<td>
					Instrument:
				</td>
				<td>
					<select class="form-control">
						<option>Flute</option>
						<option>Accordion</option>
						<option>Drum</option>
						<option>Trumpet</option>
						<option>Violin</option>
						<option>Guitar</option>
						<option>Piano</option>
						<option>Violin</option>
						<option>Clarinet</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Instrument Musical Key (Optional):
				</td>
				<td>
					<select class="form-control">
						<option>A</option>
						<option>Ab</option>
						<option>C</option>
						<option>B</option>
						<option>Bb</option>
						<option>Eb</option>
						<option>B flat</option>
						<option>F</option>
						<option>G</option>
						<option>F#</option>
						<option>Db</option>
						<option>D</option>
						<option>Ab alto</option>
					</select>
				</td>
			</tr>
		</table>
	    <input class="btn btn-primary" type="submit" name="check_submit" value="Check Address Availability" />
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
<?php
	require('includes/dbConnect.php');
	require("pageTemplate.php");
	$page = new htmlPage();
	$page->streamTop();
?>

<div class = "mainBody">
	<h1>Confirmation Results</h1>
	<p><a href = "home.php">Back to Homepage</a></p>
    
    
        <?php 
                try{
                	
                    if (!isset($_POST['musicianName']) OR empty($_POST['musicianName'])) throw new Exception('Invalid name');
			
			if (!isset($_POST['musicianNumber']) OR empty($_POST['musicianNumber']) OR !is_numeric(($_POST['musicianNumber']))) throw new Exception('Invalid telephone number');
			if (!isset($_POST['str1']) OR empty($_POST['str1'])) throw new Exception('Invalid street 1');
			if (!isset($_POST['city']) OR empty($_POST['city'])) throw new Exception('Invalid city');
			if (!isset($_POST['zipCode']) OR empty($_POST['zipCode'])) throw new Exception('Invalid Zip Code');
			if (!isset($_POST['instrument0']) OR empty($_POST['instrument0'])) throw new Exception('Invalid instrument');

			$db->query("INSERT INTO address (phoneNo, Street1, Street2, city, `Zip code`) VALUES ({$_POST['musicianNumber']}, '{$db->real_escape_string($_POST['str1'])}', '{$db->real_escape_string($_POST['str2'])}', '{$db->real_escape_string($_POST['city'])}', '{$db->real_escape_string($_POST['zipCode'])}')");
			$db->query("INSERT INTO musician (name, phoneNo) VALUES ('{$db->real_escape_string($_POST['musicianName'])}', {$_POST['musicianNumber']} )");
			
			$last = $db->insert_id;
			
			$i=0;
			while (isset($_POST['instrument'.$i])) {
				$instrument = 'instrument'.$i;
				$instrumentID = $_POST[$instrument];

				$result = $db->query("SELECT * FROM musician_instrument WHERE musicianID={$last} AND instrumentID={$instrumentID}");

				if ($result->num_rows == 0) {
					$db->query("INSERT INTO musician_instrument (instrumentID, musicianID) VALUES ({$instrumentID}, {$last})");
				}
				$i++;
			}
			
			
			//$db->query("INSERT INTO instrument (name, key) VALUES ('{$_POST['instrument']}', '{$_POST['musicalKey']}' )");
			
		    
                    echo "<p class='alert alert-success'>The musician number $last, {$_POST['musicianName']}, and the address were added to the Database successfully.<p>";
  
                 
                }catch(Exception $e){
                             echo '<div class="alert alert-danger">';
                             echo 	'<b>Error!</b>';
                             echo 	'<p>'.$e->getMessage().'</p>';
                             echo '</div>';
                }
        ?>
        
</div>

<?php
	$page->streamBottom();
?>

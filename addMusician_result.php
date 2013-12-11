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
                    if (!isset($_GET['musicianName']) OR empty($_GET['musicianName'])) throw new Exception('Invalid name');
			
			if (!isset($_GET['musicianNumber']) OR empty($_GET['musicianNumber']) OR !is_numeric(($_GET['musicianNumber']))) throw new Exception('Invalid telephone number');
			if (!isset($_GET['str1']) OR empty($_GET['str1'])) throw new Exception('Invalid street 1');
			if (!isset($_GET['city']) OR empty($_GET['city'])) throw new Exception('Invalid city');
			if (!isset($_GET['zipCode']) OR empty($_GET['zipCode'])) throw new Exception('Invalid Zip Code');
			if (!isset($_GET['instrument0']) OR empty($_GET['instrument0'])) throw new Exception('Invalid instrument');

			$db->query("INSERT INTO address (phoneNo, Street1, Street2, city, `Zip code`) VALUES ({$_GET['musicianNumber']}, '{$db->real_escape_string($_GET['str1'])}', '{$db->real_escape_string($_GET['str2'])}', '{$db->real_escape_string($_GET['city'])}', '{$db->real_escape_string($_GET['zipCode'])}')");
			$db->query("INSERT INTO musician (name, phoneNo) VALUES ('{$db->real_escape_string($_GET['musicianName'])}', {$_GET['musicianNumber']} )");
			
			$last = $db->insert_id;
			
			$i=0;
			while (isset($_GET['instrument'.$i])) {
				$instrument = 'instrument'.$i;
				$instrumentID = $_GET[$instrument];

				$result = $db->query("SELECT * FROM musician_instrument WHERE musicianID={$last} AND instrumentID={$instrumentID}");

				if ($result->num_rows == 0) {
					$db->query("INSERT INTO musician_instrument (instrumentID, musicianID) VALUES ({$instrumentID}, {$last})");
				}
				$i++;
			}
			
			
			//$db->query("INSERT INTO instrument (name, key) VALUES ('{$_GET['instrument']}', '{$_GET['musicalKey']}' )");
			
		    
                    echo "{$_GET['musicianName']} The $last Musician and Address were added to the Database successfully.";
  
                 
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

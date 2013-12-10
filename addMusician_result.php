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
                    if (!isset($_GET['musicianName']) OR empty($_GET['musicianName'])) throw new Exception('Enter your Name please');
			
			if (!isset($_GET['musicianNumber']) OR empty($_GET['musicianNumber'])) throw new Exception('Enter your telephone number');
			if (!isset($_GET['str1']) OR empty($_GET['str1'])) throw new Exception('Enter your street 1');
			if (!isset($_GET['str2']) OR empty($_GET['str2'])) throw new Exception('Enter your street 2');
			if (!isset($_GET['city']) OR empty($_GET['city'])) throw new Exception('Enter your city');
			if (!isset($_GET['zipCode']) OR empty($_GET['zipCode'])) throw new Exception('Enter your Zip Code');
			if (!isset($_GET['instrument']) OR empty($_GET['instrument'])) throw new Exception('Enter your instrument');

			$db->query("INSERT INTO address (phoneNo, Street1, Street2, city, `Zip code`) VALUES ({$_GET['musicianNumber']}, '{$_GET['str1']}', '{$_GET['str2']}', '{$_GET['city']}', '{$_GET['zipCode']}')");
			$db->query("INSERT INTO musician (name, phoneNo) VALUES ('{$_GET['musicianName']}', {$_GET['musicianNumber']} )");
			
			$last = $db->insert_id;
			$db->query("INSERT INTO musician_instrument (instrumentID, musicianID) VALUES ('{$_GET['instrument']}', $last)");
			//$db->query("INSERT INTO instrument (name, key) VALUES ('{$_GET['instrument']}', '{$_GET['musicalKey']}' )");
			
		    
                    echo "{$_GET['musicianName']} {$_GET['instrument']} The $last Musician and Address were added to the Database successfully.";
  
                 
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

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
                    if (empty($_GET['musicianName']) OR empty($_GET['musicianNumber'])
                         OR empty($_GET['str1']) OR empty($_GET['str2'])
                         OR empty($_GET['city']) OR empty($_GET['zipCode'])) throw new Exception('Incorrect Data types were included');

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

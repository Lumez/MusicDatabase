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
                    if (empty($_GET['musicianName']) OR empty($_GET['musicianNumber']) OR !is_numeric(($_GET['musicianNumber']))) throw new Exception('Incorrect Data types were included');

                    
                    $db->query("INSERT INTO musician (name, phoneNo) VALUES ('{$db->real_escape_string($_GET['musicianName'])}', '{$db->real_escape_string($_GET['musicianNumber'])}' )");

                    echo "{$_GET['musicianName']} The Musician and Address were added to the Database successfully.";
  
                 
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

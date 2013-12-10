<?php
    class htmlPage{
        public $selectOptions;
	
	public function getSelectionOptions(){
	    require('includes/dbConnect.php');
	    
	    $instruments = $db->query("SELECT * FROM instrument");
	    $selectOptions = "";
	    while($instrument = $instruments->fetch_object()) {
		    $selectOptions .= "<option value='$instrument->name($instrument->key)'>$instrument->name ($instrument->key)</option>";
	    }
	    return $selectOptions;
	}
        
        public function streamTop(){
		require('includes/header.php');

        }
    
        
        public function streamBottom(){
                require('includes/footer.php'); 
        }
    }
?>
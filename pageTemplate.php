<?php
    class htmlPage{
        
        //protected $pageTitle = "Red Carpet Films";
        //protected $a, $b, $c;
        //protected $welcomeMes;
        //    
        //public function setTitle($newTitle){
        //      $this->pageTitle = $newTitle;
        //      return;
        //}
        //
        //
        //public function setActiveClass($fileName){
        //      if ($fileName == "index"){
        //        $this->a = "current_page_item";
        //      }
        //      if ($fileName == "film"){
        //        $this->b = "current_page_item";
        //      }
        //      if ($fileName == "genre"){
        //        $this->c = "current_page_item";
        //      }
        //      else{
        //        return;
        //      }
        //}
        
        
        public function streamTop(){
          
?>
	
		<?php require('includes/header.php'); ?> 
                    
<?php
        }
    
        
        public function streamBottom(){

?>
                <?php require('includes/footer.php'); ?> 

<?php
        }
    }
?>
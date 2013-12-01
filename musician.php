<?php
    require('includes/dbConnect.php');
    require("pageTemplate.php");
    $page = new htmlPage();
    //$page->setTitle("Red Carpet Films - Latest Releases");
    //$page->setActiveClass("index");
    $page->streamTop();
?>           
            
            
            


            <div class = "mainBody">

            <?php

                //check the no of album
                $targetID = 1;

                $albums= $db->query("SELECT * FROM album WHERE musicianID = $targetID");
                $musicianName= $db->query("SELECT name FROM musician WHERE musicianID = $targetID")->fetch_object()->name;

                echo("<h1> $musicianName's Library</h1>");



                //if there are more than 1 album show accordance ELSE Error message say no album found

                if($albums->num_rows == 0){

                    echo("<p>Musician's Library is empty!</p>");


                } else {
            ?>

            <div id="accord">
                <div id="content">
                <?php
                    while ($album = $albums->fetch_object()) {
                        $songs = $db->query("SELECT * FROM song WHERE albumID={$album->albumID}");
                        ?>

                        <h3><a href="#"><?=$album->title?></a></h3>
                        <table class="" >
                            <tr>
                                <th>SongID</th>
                                <th>Title</th>
                                <th>Author</th>
                            </tr>
                            <?php
                                while ($song = $songs->fetch_object()){
                                    include('partials/song.php');
                                }
                            ?>
                        </table>
                    <?php
                    }
                ?>
                </div>
            </div><!--END OF DIV "ACCORD"-->
                
            <?php
            }//end if

        ?> 
    <script type="text/javascript" src="js/jquery-ui.js"></script>    <!--JQUERY - UI file for the whole website-->
    <script type="text/javascript" src="js/uiAccordion.js"></script>  <!--JQUERY - UI - Accordion file for running accordion, should be at the end-->
                
    </div>      <!--END OF DIV "mainBody"-->
<?php
    $page->streamBottom();
?>
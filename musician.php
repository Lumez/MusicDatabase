<?php
    require('includes/dbConnect.php');
    require("pageTemplate.php");
    $page = new htmlPage();
    //$page->setTitle("Red Carpet Films - Latest Releases");
    //$page->setActiveClass("index");
    $page->streamTop();

    //redirect if id is not set
    if(!(isset($_GET['id'])) || empty($_GET['id'])){

        header('Location:home.php');
    }


?>           
    
    <div class = "mainBody">

        <?php
            try {
                if (!isset($_GET['id']) OR empty($_GET['id'])) throw new Exception("No musician selected!");

                $musician = $db->query("SELECT name FROM musician WHERE musicianID={$_GET['id']}");

                if($musician->num_rows == 0) throw new Exception("Musician does not exist!");
                $musicianName = $musician->fetch_object()->name;

                echo("<h1>$musicianName's Library</h1>");

            } catch (Exception $e) {
                echo "<p>{$e->getMessage()}</p><a href=\"home.php\">Home</a>";
            }
        ?>
              
            <div class="page-section">

                <h4>Performed Songs</h4>

                <?php                 
                    $songsPerformed = $db->query("SELECT * FROM play_list WHERE musicianID={$_GET['id']}");

                    if ($songsPerformed->num_rows != 0) {
                        ?>
                        <table class="">
                        <tr>
                            <th>SongID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Instrument Used</th>
                        </tr>
                        <?php
                        while ($songPerformed = $songsPerformed->fetch_object()) {
                            include('partials/songPerformed.php');
                        }
                        ?>
                        </table>
                    <?php
                    } else {
                        ?>
                        <p>Musician does not play any songs!</p>
                        <?php
                    }

                    require('partials/songPerformed_form.php');
                ?>
            </div>

            <div class="page-section">

                <h4>Authored Songs</h4>

                <?php                 
                    $songsAuthored = $db->query("SELECT * FROM song WHERE author={$_GET['id']}");

                    if ($songsAuthored->num_rows != 0) {
                        ?>
                        <table class="">
                        <tr>
                            <th>SongID</th>
                            <th>Title</th>
                            <th>Album</th>
                        </tr>
                        <?php
                        while ($songAuthored = $songsAuthored->fetch_object()) {
                            include('partials/songAuthored.php');
                        }
                        ?>
                        </table>
                    <?php
                    } else {
                        ?>
                        <p>Musician has not authored any songs!</p>
                        <?php
                    }

                    require('partials/songAuthored_form.php');
                ?>
            </div>

                <h4>Produced Albums</h4>
                
                <?php 
                    $albumsAuthored = $db->query("SELECT * FROM album WHERE musicianID={$_GET['id']}");
                    require_once("partials/musician_album_wrapper.php"); 
                ?>
                <!-- add album ========================================================================== -->

                <?php require_once("partials/album_form.php"); ?>


                <!-- ==================================================================================== -->
            <?php    
                if (isset($_GET['albumid']) OR isset($_GET['title'])){
                    echo("<hr/>");
                    echo("<h4>".$_GET['title']."'s song</h4>");
                    
                    // sql query to get all the song in the selected album
                    $album_song = $db->query("SELECT * FROM song WHERE AlbumID={$_GET['albumid']}");

                    if($album_song->num_rows > 0){
            ?>
                    <table class="">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Song-Writer</th>
                            <th>Instruments</th>

                        </tr>
            <?php
                        $no = 1;
                        while($song=$album_song->fetch_object()){
                            //display the album song here            
            ?>
                            <tr class="targettablerow">
                                <td><?=$no ?></td>
                                <td><a href=''><?=$song->title?></a></td>

                                <!-- get the name of the musician (author) -->
                                <?php $musician = $db->query("SELECT name FROM musician WHERE musicianID=$song->author")->fetch_object(); ?>
                                <td><?=$musician->name?></td>
                                <!-- check the playlist of the songid -->
                                <?php 
                                    $instruments = $db->query("SELECT instrumentID FROM play_list WHERE songID=$song->songID"); 

                                    if($instruments->num_rows > 0){
                                        $instrumentplayed = "";

                                        while($instrument = $instruments->fetch_object()){
                                            $instrumentname = $db->query("SELECT name FROM instrument WHERE instrumentID=$instrument->instrumentID")->fetch_object()->name; 
                                            
                                                $instrumentplayed.= "$instrumentname,";
                                            
                                        }
                                    }else{
                                        $instrumentplayed="none";
                                    }

                                ?>

                                <td><?= $instrumentplayed ?></td>
                            </tr>
            <?php
                            $no++;
                        }
            ?>
                    </table>                   
            <?php
                                            
                }else{
                    // if there is no song in the album display no song in album
                    echo("<p class='text-danger'><b>There are no song in the album <br/> Add a song?</b></p>");
                }
            ?>
                    <hr/>
                    <!-- add song here -->
                    <form action="#" onsubmit="return false;" >
                        <input type="submit" value="Add Song"/>
                        <!-- form here -->
                    </form>
            <?php

                }else{
                    echo("<p>Check the album's song by selecting the album above</p>");
                }

            ?>   
    <script type="text/javascript" src="js/jquery-ui.js"></script>    <!--JQUERY - UI file for the whole website-->
    <script type="text/javascript" src="js/uiAccordion.js"></script>  <!--JQUERY - UI - Accordion file for running accordion, should be at the end-->
                
    </div>      <!--END OF DIV "mainBody"-->
<?php
    $page->streamBottom();
?>
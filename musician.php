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
            try {
                if (!isset($_GET['id']) OR empty($_GET['id'])) throw new Exception("No musician selected!");

                $musician = $db->query("SELECT name FROM musician WHERE musicianID={$_GET['id']}");

                if($musician->num_rows == 0) throw new Exception("Musician does not exist!");
                $musicianName = $musician->fetch_object()->name;

                echo("<h1>$musicianName's Library</h1>");

                //if there are more than 1 album, throw exception with error message saying library is empty
                //if($songsPerformed->num_rows == 0) throw new Exception("Musician does not play any songs!");
                //if($albumsAuthored->num_rows == 0) throw new Exception("Musician has not authored any albums!");
            } catch (Exception $e) {
                echo "<p>{$e->getMessage()}</p><a href=\"home.php\">Home</a>";
            }
        ?>
                <br />
                <h2>Performed Songs</h2>

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
                ?>

                <h2>Authored Songs</h2>

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
                ?>

                <div id="accord">
                    <div id="content">

                    </div>
                </div><!--END OF DIV "ACCORD"-->

                <h2>Authored Albums</h2>
                <?php
                    $albumsAuthored = $db->query("SELECT * FROM album WHERE musicianID={$_GET['id']}");

                    if ($albumsAuthored->num_rows != 0) {
                    ?>
                    <table class="">
                        <tr>
                            <th>AlbumID</th>
                            <th>Title</th>
                            <th>Date</th>
                        </tr>
                        <?php
                            while ($album = $albumsAuthored->fetch_object()) {
                                include('partials/album.php');
                            }
                        ?>
                        </table>
                    <?php
                    } else {
                        ?>
                        <p>Musician has not authored any albums!</p>
                        <?php
                    }
                ?>
                    
                <input type="submit" value="Add Album"></input>

            <?php    
                if (isset($_GET['albumid']) OR empty($_GET['albumid']) == false){

                    echo("<p>album's song here</p>");

                }else{echo("<p>Check the album's song by selecting the album above</p>");}

            ?>   
    <script type="text/javascript" src="js/jquery-ui.js"></script>    <!--JQUERY - UI file for the whole website-->
    <script type="text/javascript" src="js/uiAccordion.js"></script>  <!--JQUERY - UI - Accordion file for running accordion, should be at the end-->
                
    </div>      <!--END OF DIV "mainBody"-->
<?php
    $page->streamBottom();
?>
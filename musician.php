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
                
                $albums = $db->query("SELECT * FROM album WHERE musicianID={$_GET['id']}");
                $musician = $db->query("SELECT name FROM musician WHERE musicianID={$_GET['id']}");

                if($musician->num_rows == 0) throw new Exception("Musician does not exist!");
                $musicianName = $musician->fetch_object()->name;

                echo("<h1> $musicianName's Library</h1>");

                //if there are more than 1 album, throw exception with error message saying library is empty
                if($albums->num_rows == 0) throw new Exception("Musician's Library is empty!");
            ?>

            <div id="accord">
                <div id="content">
                <?php
                    while ($album = $albums->fetch_object()) {
                        $songs = $db->query("SELECT * FROM song WHERE albumID={$album->albumID}");
                        ?>

                        <h3><a href="#"><?=$album->title?></a></h3>
                        <table class="table-max-width" >
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
            } catch (Exception $e) {
                echo "<p>{$e->getMessage()}</p><a href=\"home.php\">Home</a>";
            }

        ?> 
    <script type="text/javascript" src="js/jquery-ui.js"></script>    <!--JQUERY - UI file for the whole website-->
    <script type="text/javascript" src="js/uiAccordion.js"></script>  <!--JQUERY - UI - Accordion file for running accordion, should be at the end-->
                
    </div>      <!--END OF DIV "mainBody"-->
<?php
    $page->streamBottom();
?>
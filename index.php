<?php
    require('includes/dbConnect.php');
    require("pageTemplate.php");
    $page = new htmlPage();
    //$page->setTitle("Red Carpet Films - Latest Releases");
    //$page->setActiveClass("index");
    $page->streamTop();
?>           
            
            <div class = "mainBody">
                <h1>Hello, world!</h1>
                <p><a href = "#">Back to Homepage</a></p>
                
                <div id="accord">
                    <div id="content">
                        <h3><a href="#">2012-2013</a></h3>
                        <table class="students" >
                            <tr>
                                <th>Album</th><th>Song</th>
                            </tr>
                            <tr>
                                <td>Sevinj Yaqubova</td><td>2012-2013</td>
                            </tr>
                            <tr>
                                <td>Tarlan Isgandarov</td><td>2012-2013</td>
                            </tr>
                        </table>
                                
                        <h3><a href="#">2011-2012</a></h3>
                        <table class="students">
                            <tr>
                                <th>Album</th><th>Song</th>
                            </tr>
                            <tr>
                                <td>Nigar Guliyeva</td><td>2011-2014</td>
                            </tr>
                            <tr>
                                <td>Orkhan Bakhshiyev</td><td>2011-2012</td>
                            </tr>
                        </table>
                                    
                        <h3><a href="#">2010-2011</a></h3>
                        <table class="students">
                            <tr>
                                <th>Album</th><th>Song</th>
                            </tr>
                            <tr>
                                <td>Elnur Mammadov</td><td>2010-2011</td>
                            </tr>
                            <tr>
                                <td>Kanan Farzaliyev</td><td>2010-2011</td>
                            </tr>
                        </table>
                    </div><br/><br/>   
                </div>  <!--END OF DIV "ACCORD"-->
                <script type="text/javascript" src="js/jquery-ui.js"></script>    <!--JQUERY - UI file for the whole website-->
                <script type="text/javascript" src="js/uiAccordion.js"></script>  <!--JQUERY - UI - Accordion file for running accordion, should be at the end-->
                
            </div>      <!--END OF DIV "mainBody"-->
<?php
    $page->streamBottom();
?>
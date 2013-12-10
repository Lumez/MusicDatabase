<?php

require_once("includes/predispatch.php");

$_SESSION = array();
    
session_destroy();

echo "You've logged out! <a href='index.php'>Return to main page</a>";


header('Location: index.php');
?>
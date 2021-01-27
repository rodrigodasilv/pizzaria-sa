<?php

session_start();
if(!isset($_SESSION['user'])){
    header("Location: http://localhost/pizzaria_sa/index.php?folder=app/&file=home.php");
    exit;
}

?>
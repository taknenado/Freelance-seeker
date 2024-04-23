<?php

session_start();

if(!isset($_SESSION['username']) && $_SERVER['SCRIPT_NAME'] != '/index.php') {
    header("Location: ../main_pages/login.php");
    exit(); 

}

?>

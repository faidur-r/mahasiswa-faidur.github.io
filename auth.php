<?php
    session_start();
    if(!isset($_SESSION["npm"])){
        header("Location: login.php");
        exit();
    }
?>
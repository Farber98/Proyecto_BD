<?php
    session_start();
    if(!isset($_SESSION['$user']) || $_SESSION['$user'] != 'admin') {
         header("Location: index.html");
         die();
    }
?>
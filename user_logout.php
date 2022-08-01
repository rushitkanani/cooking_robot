<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['name']);
    unset($_SESSION['userId']);
    header('Location:homepage.php');
?>
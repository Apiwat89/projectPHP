<?php 
    session_start();
    require_once('database/db.php');

    // check -> logout
    setcookie('user', '', time() - 3600, "/");
    setcookie('cart', 0, time() + (10 * 365 * 24 * 60 * 3600));
    unset($_SESSION['autoLOG']);
    header("location: home.php");
?>
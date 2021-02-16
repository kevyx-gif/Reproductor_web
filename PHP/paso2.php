<?php
    include("con_db.php");
    session_start();
    unset($_SESSION['variable']);

    ob_start();
    header('Location: http://localhost:3000/PHP/login.php');
    exit;
?>
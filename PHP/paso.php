<?php
    include("con_db.php");
    session_start();
    $ids = $_GET['var'];
    $_SESSION["id"] = $ids;
    header('Location: http://localhost:3000/PHP/Principal.php');
    exit;
?>
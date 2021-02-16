<?php
    include("con_db.php");
    session_start();
    unset($_GET['var']);
    header('Location: http://localhost:3000/PHP/Perfiles.php');
    exit;
?>
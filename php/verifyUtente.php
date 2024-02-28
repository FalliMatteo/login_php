<?php
    session_start();
    include "connect.php";
    $connection = connectMySQL();
    header("Location: ../pages/login.php");
?>
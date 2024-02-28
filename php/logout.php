<?php
    session_start();
    unset($_SESSION["message"]);
    session_unset();
    header("Location: ../index.php");
?>
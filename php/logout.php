<?php
    session_start();
    
    unset($_SESSION["message_signup"]);
    session_unset();
    header("Location: ../index.php");
?>
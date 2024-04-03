<?php
    session_start();
    include "connect.php";
    $connection = connectMySQL();
    $username = $_SESSION["username"];
    $password = hash("sha256", $_POST["password"]);
    $connection->query("UPDATE utente SET password = '$password' WHERE username = '$username'");
    if($connection->affected_rows > 0){
        $_SESSION["message_new_password"] = "<p>Password cambiata</p>";
    }else{
        $_SESSION["message_new_password"] = "<p class='error'>Password non cambiata</p>";
    }
    header("Location: ../pages/cambiaPassword.php");
?>
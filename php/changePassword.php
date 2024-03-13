<?php
    include "connect.php";
    $connection = connectMySQL();
    $username = $_SESSION["username"];
    $password = hash("sha256", $_POST["password"]);
    $connection->query("UPDATE utente SET password = '$password' WHERE username = '$username'");
    if($connection->affected_rows > 0){
        $_SESSION["class_new_password"] = "";
        $_SESSION["message_new_password"] = "Password cambiata";
    }else{
        $_SESSION["class_new_password"] = "error";
        $_SESSION["message_new_password"] = "Password non cambiata";
    }
    header("Location: ../pages/cambiaPassword.php");
?>
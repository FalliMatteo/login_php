<?php
    session_start();
    include "connect.php";
    $connection = connectMySQL();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = $connection->query("SELECT * FROM utenti WHERE Username = '$username' AND Password = '$password'");
    if($result){
        if($result->num_rows > 0){
            $_SESSION["username"] = $username;
            $location = "../pages/benvenuto.php";
        }else{
            $_SESSION["message_login"] = "Utente o password errati";
            $location = "../pages/login.php";
        }
    }else{
        $_SESSION["message_login"] = "Errore nel controllo sugli utenti";
        $location = "../pages/login.php";
    }
    header("Location: ../pages/login.php");
?>
<?php
    session_start();
    include "connect.php";
    $connection = connectMySQL();
    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);
    $result = $connection->query("SELECT * FROM utente WHERE username = '$username'");
    if($result){
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if($row["password"] == $password){
                $_SESSION["username"] = $username;
                unset($_SESSION["message_login"]);
                $location = "../pages/benvenuto.php";
            }else{
                $_SESSION["message_login"] = "Password errata";
                $location = "../pages/login.php";
            }
        }else{
            $_SESSION["message_login"] = "Utente inesistente";
            $location = "../pages/login.php";
        }
    }else{
        $_SESSION["message_login"] = "Errore nel controllo sugli utenti";
        $location = "../pages/login.php";
    }
    header("Location: $location");
?>
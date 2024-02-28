<?php
    session_start();
    include "connect.php";
    $connection = connectMySQL();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $result = $connection->query("SELECT * FROM utenti WHERE username = '$username'");
    if($result){
        if($result->num_rows == 0){
            $connection->query("INSERT INTO utenti (nome, password, nome, cognome, email) VALUES('$username', '$password', '$nome', '$cognome', '$email')");
            if($connection->affected_rows > 0){
                $_SESSION["username"] = $username;
                $location = "../pages/benvenuto.php";
            }else{
                $_SESSION["message"] = "Errore nella creazione utente";
                $location = "../index.php";
            }
        }else{
            $_SESSION["message"] = "Username già esistente";
            $location = "../index.php";
        }
    }else{
        $_SESSION["message"] = "Errore nel controllo sugli utenti";
        $location = "../index.php";
    }
    header("Location: $location");
?>
<?php
    session_start();
    include "connect.php";
    $connection = connectMySQL();
    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $result = $connection->query("SELECT * FROM utente");
    if($result){
        $already_exists = false;
        while($row = $result->fetch_assoc()){
            if($row["username"] === $username){
                $already_exists = true;
                $location = "../index.php";
                $_SESSION["message_signup"] = "Username già esistente";
            }
            if($row["email"] === $email){
                $already_exists = true;
                $location = "../index.php";
                $_SESSION["message_signup"] = "Email già esistente";
            }
        }
        if(!$already_exists){
            $connection->query("INSERT INTO utente (username, password, nome, cognome, email) VALUES('$username', '$password', '$nome', '$cognome', '$email')");
            if($connection->affected_rows > 0){
                $_SESSION["username"] = $username;
                unset($_SESSION["message_signup"]);
                $location = "../pages/benvenuto.php";
            }else{
                $_SESSION["message_signup"] = "Errore nella creazione utente";
                $location = "../index.php";
            }
        }
    }else{
        $_SESSION["message_signup"] = "Errore nel controllo sugli utenti";
        $location = "../index.php";
    }
    header("Location: $location");
?>
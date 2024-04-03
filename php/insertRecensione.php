<?php
    session_start();
    include "connect.php";
    $connection = connectMySQL();
    $username = $_SESSION["username"];
    $restaurant = $_POST["ristorante"];
    $vote = $_POST["voto"];
    $result = $connection->query("SELECT id FROM utente WHERE username = '$username'");
    $row = $result->fetch_assoc();
    $user = $row["id"];
    $result = $connection->query("SELECT codice FROM ristorante WHERE nome = '$restaurant'");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $restaurant = $row["codice"];
        $connection->query("INSERT INTO recensione (voto, idutente, codiceristorante) VALUES($vote, $user, '$restaurant')");
        if($connection->affected_rows > 0){
            $_SESSION["class_insert_recensione"] = "";
            $_SESSION["message_insert_recensione"] = "Aggiunta recensione";
        }else{
            $_SESSION["class_insert_recensione"] = "error";
            $_SESSION["message_insert_recensione"] = "Recensione non aggiunta";
        }
    }else{
        $_SESSION["class_insert_recensione"] = "error";
        $_SESSION["message_insert_recensione"] = "Ristorante inesistente";
    }
    header("Location: ../pages/inserisciRecensione.php");
?>
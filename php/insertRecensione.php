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
    $result = $connection->query("SELECT * FROM ristorante WHERE codice = '$restaurant'");
    if($result->num_rows > 0){
        $connection->query("INSERT INTO recensione (voto, idutente, codiceristorante) VALUES($vote, $user, '$restaurant')");
        if($connection->affected_rows > 0){
            $_SESSION["message_insert_recensione"] = "<p>Aggiunta recensione</p>";
        }else{
            $_SESSION["message_insert_recensione"] = "<p class='error'>Recensione non aggiunta</p>";
        }
    }else{
        $_SESSION["message_insert_recensione"] = "<p class='error'>Ristorante inesistente</p>";
    }
    header("Location: ../pages/inserisciRecensione.php");
?>
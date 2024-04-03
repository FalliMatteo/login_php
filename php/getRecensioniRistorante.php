<?php
    session_start();
    include "connect.php";
    $connection = connectMySQL();
    $ristorante = $_POST["ristorante"];
    $result = $connection->query("SELECT R.idrecensione, R.voto, S.nome, R.data FROM recensione as R join ristorante as S on R.codiceristorante = S.codice join utente as U on R.idutente = U.id where S.nome = '$ristorante'");
    if($result){
        if($result->num_rows > 0){
            $string = "<p>Recensioni: " . $result->num_rows . "</p><table><tr><th>ID</th><th>Voto</th><th>Ristorante</th><th>Data</th></tr>";
            while($row = $result->fetch_assoc()){
                $string .= "<tr><td>" . $row["idrecensione"] . "</td><td>" . $row["voto"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["data"] . "</td></tr>";
            }
            $string .= "</table><br>";
        }else{
            $string = "<p class='error'>Nessuna recensione</p>";
        }
    }else{
        $string = "<p class='error'>Errore del server</p>";
    }
    $_SESSION["message_recensioni_ristorante"] = $string;
    header("Location: ../pages/recensioniRistorante.php");
?>
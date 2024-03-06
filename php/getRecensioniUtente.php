<?php
    include "connect.php";
    function getRecensioni(){
        $connection = connectMySQL();
        $username = $_SESSION["username"];
        $result = $connection->query("SELECT R.idrecensione, R.voto, S.nome, U.username FROM recensione as R join ristorante as S on R.codiceristorante = S.codice join utente as U on R.idutente = U.id where U.username = '$username'");
        if($result){
            if($result->num_rows > 0){
                $string = "<table><tr><th>ID</th><th>Voto</th><th>Ristorante</th><th>Utente</th></tr>";
                while($row = $result->fetch_assoc()){
                    $string .= "<tr><td>" . $row["idrecensione"] . "</td><td>" . $row["voto"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["username"] . "</tr>";
                }
                $string .= "</table>";
            }else{
                $string = "<p>Nessuna recensione presente nel database</p>";
            }
        }else{
            $string = "<p>Errore del server</p>";
        }
        return $string;
    }
?>
<?php
    include "connect.php";
    function getRecensioni(){
        $connection = connectMySQL();
        $result = $connection->query("SELECT * FROM recensioni as R join film as F on R.CodFilm = F.CodFilm");
        if($result){
            if($result->num_rows > 0){
                $string = "<table><tr><th>ID</th><th>Voto</th><th>Film</th><th>Username</th></tr>";
                while($row = $result->fetch_assoc()){
                    $string .= "<tr><td>" . $row["IDRecensione"] . "</td><td>" . $row["Voto"] . "</td><td>" . $row["Titolo"] . "</td><td>" . $row["Username"] . "</tr>";
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
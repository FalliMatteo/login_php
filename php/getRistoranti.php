<?php
    include "connect.php";
    function getRistoranti(){
        $connection = connectMySQL();
        $result = $connection->query("SELECT nome FROM ristorante");
        if($result){
            if($result->num_rows > 0){
                $string = "<p>Lista ristoranti:</p><ul>";
                while($row = $result->fetch_assoc()){
                    $string .= "<li>" . $row["nome"] . "</li>";
                }
                $string .= "</ul>";
            }else{
                $string = "<p>Nessun ristorante presente nel database</p>";
            }
        }else{
            $string = "<p>Errore del server</p>";
        }
        return $string;
    }
?>
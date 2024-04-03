<?php
    include "connect.php";
    function getRistoranti(){
        $connection = connectMySQL();
        $result = $connection->query("SELECT codice, nome FROM ristorante");
        $string = "<select name='ristorante'>";
        while($row = $result->fetch_assoc()){
            $string .= "<option value='" . $row["codice"] . "'>" . $row["nome"] . "</option>";
        }
        $string .= "</select>";
        return $string;
    }
?>
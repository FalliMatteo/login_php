<?php
    include "connect.php";
    function getRistoranti(){
        $connection = connectMySQL();
        $result = $connection->query("SELECT nome FROM ristorante");
        $string = "<select name='ristorante'>";
        while($row = $result->fetch_assoc()){
            $string .= "<option value='" . $row["nome"] . "'>" . $row["nome"] . "</option>";
        }
        $string .= "</select>";
        return $string;
    }
?>
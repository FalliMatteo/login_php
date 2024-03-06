<?php
    function connectMySQL(){
        $connection = new mysqli("localhost", "root", "", "recensioni_ristoranti");
        if($connection->connect_error){
            die($connection->connect_error);
        }
        return $connection;
    }
?>
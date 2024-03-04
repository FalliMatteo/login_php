<?php
    function connectMySQL(){
        $connection = new mysqli("localhost", "root", "", "cinema");
        if($connection->connect_error){
            die($connection->connect_error);
        }
        return $connection;
    }
?>
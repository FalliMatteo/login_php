<?php
    session_start();
    include "../php/getRecensioniUtente.php";
    $recensioni = getRecensioni();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Home</title>
</head>
<body>
    <?php
        echo "<h1>Benvenuto " . $_SESSION["username"] ."</h1>" . $recensioni;
    ?>
    <br>
    <button href="inserisciRecensione.php">Inserisci recensione</button><br><br>
    <button href="cambiaPassword.php">Cambia password</button><br><br>
    <button href="gestisciRecensione.php">Gestisci recensione</button><br><br>
    <button href="recensioniRistoranti.php">Visualizza recensioni</button><br><br>
    <a href="../php/logout.php">Logout</a>
</body>
</html>
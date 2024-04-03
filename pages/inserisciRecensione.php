<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
    }
    include "../php/getRistoranti.php";
    $ristoranti = getRistoranti();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Inserisci recensione</title>
</head>
<body>
    <?php
        echo $ristoranti;
    ?>
    <form action="../php/insertRecensione.php" method="POST">
        <label id="label_voto" for="input_voto">Voto</label><br>
        <input type="number" id="input_voto" name="voto" min="1" max="5"><br><br>
        <label id="label_ristorante" for="input_ristorante">Nome ristorante</label><br>
        <input type="text" id="input_ristorante" name="ristorante"><br><br>
        <button type="submit">Conferma</button>
    </form>
    <?php
        if(isset($_SESSION["message_insert_recensione"])){
            echo "<p class='" . $_SESSION["class_insert_recensione"] . "'>" . $_SESSION["message_insert_recensione"] . "</p><br>";
        }
    ?>
    <a href="benvenuto.php">Torna alla home</a>
</body>
</html>
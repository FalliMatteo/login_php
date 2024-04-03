<?php
    session_start();
    include "../php/getRistoranti.php";
    $ristoranti = getRistoranti();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Recensioni ristorante</title>
</head>
<body>
    <form action="../php/getRecensioniRistorante.php" method="POST">
        Ristorante<br>
        <?php
            echo $ristoranti;
        ?>
        <br><br>
        <button type="submit">Visualizza</button>
    </form>
    <?php
        if(isset($_SESSION["message_recensioni_ristorante"])){
            echo $_SESSION["message_recensioni_ristorante"];
        }
    ?>
    <a href="benvenuto.php">Torna alla home</a>
</body>
</html>
<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
    }
    unset($_SESSION["message_recensioni_ristorante"]);
    unset($_SESSION["message_new_password"]);
    unset($_SESSION["message_insert_recensione"]);
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
    <a href="inserisciRecensione.php"><button>Inserisci recensione</button></a><br><br>
    <a href="cambiaPassword.php"><button>Cambia password</button></a><br><br>
    <a href="gestisciRecensione.php"><button>Gestisci recensione</button></a><br><br>
    <a href="recensioniRistorante.php"><button>Visualizza recensioni</button></a><br><br>
    <a href="../php/logout.php">Logout</a>
</body>
</html>
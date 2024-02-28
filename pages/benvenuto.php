<?php
    session_start();
    include "../php/getRecensioni.php";
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
        echo "<h1>Benvenuto " . $_SESSION["username"] ."</h1><br>" . $recensioni;
    ?>
    <br>
    <a href="../php/logout.php">Logout</a>
</body>
</html>
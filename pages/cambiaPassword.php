<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Cambia password</title>
</head>
<body>
    <form action="../php/changePassword.php" method="POST">
        <label id="label_new_password" for="input_new_password">Nuova password</label><br>
        <input type="password" id="input_new_password" name="password"><br><br>
        <button type="submit">Cambia password</button>
    </form>
    <?php
        if(isset($_SESSION["message_new_password"])){
            echo $_SESSION["message_new_password"];
        }
    ?>
    <a href="benvenuto.php">Torna alla home</a>
</body>
</html>
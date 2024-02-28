<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Registrazione</title>
</head>
<body>
    <h1>Pagina di registrazione</h1>
    <form action="php/createUtente.php" method="post">
        <label for="input_username">Username</label><br>
        <input id="input_username" type="text" name="username" required><br><br>
        <label for="input_password">Password</label><br>
        <input id="input_password" type="password" name="password" required><br><br>
        <label for="input_email">E-Mail</label><br>
        <input id="input_email" type="email" name="email" required><br><br>
        <label for="input_nome">Nome</label><br>
        <input id="input_nome" type="text" name="nome" required><br><br>
        <label for="input_cognome">Cognome</label><br>
        <input id="input_cognome" type="text" name="cognome" required><br><br>
        <button type="submit">Registrati</button>
    </form><br>
    <?php
        if(isset($_SESSION["message"])){
            echo "<p class='error'>" . $_SESSION["message"] . "</p><br>";
        }
    ?>
    <a href="pages/login.php">Accedi</a>
</body>
</html>
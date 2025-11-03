<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        header("Location: home.php");
    }
    foreach ($_SESSION as $key => $value) {
        print_r($value);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Inserisci l'username:</label> <br>
        <input type="text" name="username" required><br><br>

        <label for="password">Inserisci la password:</label> <br>
        <input type="password" name="password" required><br><br>

        <button type="submit">LOG IN</button>
    </form>
</body>
</html>
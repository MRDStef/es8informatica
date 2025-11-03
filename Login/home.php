<?php
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["password"]))
        header("Location: login.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>BENVENUTO <?php echo $_SESSION["username"]?></h1>
    <form action="logout.php" method="post">
        <button type="submit">LOG OUT</button>
    </form>
</body>
</html>
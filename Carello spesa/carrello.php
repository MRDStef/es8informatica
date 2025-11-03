<?php

    session_start();
    $_SESSION["counter"] = 0;
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $_SESSION["counter"]++;
        
        $id = $_GET["id"];
        
        
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
    <p> I prodotti nel carrello sono: <?php echo $_SESSION["counter"]; ?></p>

    <form action="svuota.php">
        <button type="submit">SVUOTA</button>
    </form>
</body>
</html>
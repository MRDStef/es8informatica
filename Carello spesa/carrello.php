<?php
session_start();

$prodotti = [
    1 => ["nome" => "Mela", "prezzo" => 0.5],
    2 => ["nome" => "Banana", "prezzo" => 0.3],
    3 => ["nome" => "Latte", "prezzo" => 1.2],
    4 => ["nome" => "Pane", "prezzo" => 1.5],
];

if (isset($_GET['azione']) && $_GET['azione'] === 'svuota') {
    session_destroy();
    header("Location: carrello.php");
    exit;
}

$totale = 0;
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Carrello</title>

    <style>
                html, body{
            font-family: Arial, sans-serif;
        }

        body{
            background-color: #555555ff;
            color: #e9e9e9ff;
            margin: 20px;
            text-align: center;
            font-size: 28px;
        }
        
        
        table, tr, td, th{
            background-color: #ffffff;
            color: #000000;
            border: 3px solid black;
            border-collapse: collapse;
            padding: 5px;
            margin: 0 auto;
        }

        button{
            font-size: 20px;
            padding: 5px 10px;
            cursor: pointer;
            background-color: #65eb6aff;

            border-radius: 15px;
        }
    </style>
</head>
<body>
    <h1>Carrello</h1>

    <?php 
        if (empty($_SESSION['carrello']))
            echo "<p>Il carrello è vuoto.</p>";

        else{
            echo "<table>";
                echo "<tr>";
                    echo "<th>Nome</th>";
                    echo "<th>Prezzo</th>";
                    echo "<th>Quantità</th>";
                    echo "<th>Subtotale</th>";
                echo "</tr>";

            foreach ($_SESSION['carrello'] as $id => $quantita) {
                $subtotale = $prodotti[$id]['prezzo'] * $quantita;
                $totale += $subtotale;
                
                echo "<tr>";
                    echo "<td>".$prodotti[$id]['nome']."</td>";
                    echo "<td>".number_format($prodotti[$id]['prezzo'], 2)."€</td>";
                    echo "<td> $quantita </td>";
                    echo "<td>".number_format($subtotale, 2)." €</td>";
                echo "</tr>";
            }

                echo "<tr>";
                    echo "<td colspan='3'><strong>Totale</strong></td>";
                    echo "<td><strong>".number_format($totale, 2)."€</strong></td>";
                echo "</tr>";
            echo "</table>";

            echo "<br>";
            
            echo "<a href='carrello.php?azione=svuota'><button>Svuota carrello</button></a>";
        }
    ?>

    <br><br>
    <a href="prodotti.php"><button>Continua lo shopping</button></a>
</body>
</html>

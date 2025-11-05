<?php
session_start();

$prodotti = [
    1 => ["nome" => "Mela", "prezzo" => 0.5],
    2 => ["nome" => "Banana", "prezzo" => 0.3],
    3 => ["nome" => "Latte", "prezzo" => 1.2],
    4 => ["nome" => "Pane", "prezzo" => 1.5],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_prodotto'])) {
    $id = (int)$_POST['id_prodotto'];

    if (!isset($_SESSION['carrello']))
        $_SESSION['carrello'] = [];


    (!isset($_SESSION['carrello'][$id])) ? $_SESSION['carrello'][$id] = 1 : $_SESSION['carrello'][$id]++;
    
    header('Location: prodotti.php');

    $messaggio = "Prodotto aggiunto al carrello!";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Prodotti</title>
    <style>
        table, tr, td, th{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Lista Prodotti</h1>

    <?php if (isset($messaggio)) echo $messaggio; ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Prezzo</th>
            <th>Azione</th>
        </tr>
        <?php
        foreach ($prodotti as $id => $prodotto){

            echo "<tr>";
                echo "<td> $id </td>";
                echo "<td>" . $prodotto['nome'] . "</td>";
                echo "<td>" . number_format($prodotto['prezzo'], 2) . "€</td>";
                echo "<td>";
                    echo "<form method='POST'>";
                        echo "<input type='hidden' name='id_prodotto' value=$id>";
                        echo "<button type='submit'>Aggiungi al carrello</button>";
                    echo "</form>";
                echo "</td>";
            echo "</tr>";
        } 
        ?>
    </table>

    <br>
    
    <?php
        if (isset($_SESSION['carrello'])){
            $totaleProdotti = 0;
            foreach ($_SESSION['carrello'] as $id => $quantita){
                $totaleProdotti += $quantita;
            }
            echo "Prodotti nel carrello: $totaleProdotti";
        }
        
        else
            echo "Prodotti nel carrello: 0";
    ?>

    <br>
    <br>
    <a href="carrello.php"><button>Vai al Carrello</button></a>
</body>
</html>

<?php

    session_start();

    class Prodotto{
        public $id;
        public $nome;
        public $prezzo;

        function __construct($id, $nome, $prezzo){
            $this->id = $id;
            $this->nome = $nome;
            $this->prezzo = $prezzo;
        }
    }

    $p1 = new Prodotto(1, "p1", 109.99); 
    $p2 = new Prodotto(1, "p2", 9.99); 
    $p3 = new Prodotto(1, "p3", 10.99); 
    $p4 = new Prodotto(1, "p4", 19.99); 

    $_SESSION["prodotti"] = [
        $p1,    
        $p2,    
        $p3,    
        $p4    
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="carrello.php">
        <button type="submit">VAI AL CARRELLO</button>
    </a>


    <div>
        <?php
            foreach ($prodotti as $key) {
                echo <<<EOL
                <form action="" method="GET" style="border:black thin solid">
                    <h5>PRODOTTO 4</h5>
                    <p>prezzo: €19,99</p>
                    <button type="submit" onclick="aggiunto()" >aggiungi al carrello</button>
                    <input type="hidden" name="id" value="$key->id">
                </form> <br>
                EOL;
            } 
        ?>
    </div>

    <script>
        function aggiunto(){
            alert("AGGIUNTO AL CARRELLO")
        }
    </script>
</body>
</html>
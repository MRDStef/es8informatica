<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
    Contatore di visite
    Realizza una pagina PHP (visite.php) che:Avvii la sessione con session_start().Controlli se esiste una variabile di sessione contatore.
    Se non esiste, la imposti a 1.
    Se esiste, la incrementi di 1.
    Visualizzi un messaggio del tipo:
    “Hai visitato questa pagina X volte durante questa sessione.”Aggiungi un pulsante “Azzera contatore” che distrugga la sessione.
    Estensione possibile:
    Mostra anche la data e ora dell’ultima visita salvandola nella sessione.


    Login
    Crea un mini-sito con tre file PHP:login.php
    Form con username e password.
    Se le credenziali sono corrette (puoi usare valori fissi, es. admin / 1234), salva l’utente nella sessione ($_SESSION["utente"] = "admin").
    Reindirizza a home.php.
    home.php
    Controlla se la sessione è attiva.
    Se non lo è, rimanda a login.php.
    Se sì, mostra un messaggio tipo “Benvenuto, admin!” e un link a logout.php.
    logout.php
    Distrugge la sessione e reindirizza a login.php.
    Estensione possibile:
    Gestisci più utenti con un array associativo.
    Mostra la data di login e il tempo trascorso.


    Carrello spesaCrea un piccolo e-commerce simulato con i file:prodotti.php
    Mostra una lista di prodotti (id, nome, prezzo).
    Ogni prodotto ha un pulsante “Aggiungi al carrello” che invia l’ID del prodotto a carrello.php.
    carrello.php
    Avvia la sessione.
    Se riceve un ID prodotto, lo aggiunge all’array $_SESSION["carrello"].
    Visualizza l’elenco dei prodotti nel carrello con quantità e totale.
    Mostra anche un link “Svuota carrello” che distrugge la sessione.
    checkout.php (facoltativo, livello avanzato)
    Mostra un riepilogo e conferma l’ordine.
    Dopo la conferma, svuota la sessione e ringrazia l’utente.
    Estensione possibile:
    Permetti di aggiornare le quantità.
    Usa una tabella MySQL per i prodotti (integrazione con DB).
    Memorizza il carrello in cookie se la sessione scade.
    -->

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_destroy();
            header('Location:visite.php');
            exit;
        }
        isset($_SESSION["counter"]) ? $_SESSION["counter"]++ : $_SESSION["counter"] = 1;
        
        isset($_SESSION['ultima_visita']) ? $ultima_visita = $_SESSION['ultima_visita'] : $ultima_visita = "Nessuna visita precedente.";

        $_SESSION['ultima_visita'] = date("d/m/Y H:i:s");

        ?>

    <p>Hai visitato questa pagina <?php echo $_SESSION["counter"]; ?> volte.</p>
    <p>Ultima visita: <?php echo $ultima_visita; ?></p>

    <form action="" method="POST">
        <input type="submit" value="azzera">
    </form>

</body>
</html>
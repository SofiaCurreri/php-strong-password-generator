<?php 
/** Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
*   L'esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

*   Milestone 1
*   Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all'utente.
*   Scriviamo tutto (logica e layout) in un unico file *index.php*

*   Milestone 2
*   Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale

*   Milestone 3 (BONUS)
*   Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all'utente.

*   Milestone 4 (BONUS)
*   Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
*   Dare all'utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali. */

$len_password = $_GET["password"];

function randomPassword($len) {
    $elements = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $elementsLen = strlen($elements) - 1;
    $password = [];
    for($i = 0; $i < $len; $i++) {
        $n = rand(0, $elementsLen);
        $password[] = $elements[$n];
    }

    print(implode($password));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
</head>

<body>

    <form method="GET">
        <label for="password"> Inserisci la lunghezza che deve avere la tua password</label>
        <input type="text" id="password" name="password">
        <button>Invia</button>
    </form>

    <p> La password generata è: <?php randomPassword($len_password); ?></p>

</body>

</html>
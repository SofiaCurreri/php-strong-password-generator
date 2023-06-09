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

require_once(__DIR__ . './functions.php');

if(!empty($_GET)) {
    $alphabet = "abcdefghijklmnopqrstuvwxyz";
    $alphabet_uc = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numbers = "1234567890";
    $specials = "!$%&/()=?[]\{}-_";

    $len_password = (int) $_GET["password_length"] ?? 5;        
    $all_chars = $alphabet . $alphabet_uc . $numbers . $specials;
    $allow_repetitions = isset($_GET["allow_repetitions"]) ? true : false;
    
    $allowed_chars = "";
    
    if(isset($_GET["allowed_alphabet_lc"])) $allowed_chars .= $alphabet;
    if(isset($_GET["allowed_alphabet_uc"])) $allowed_chars .= $alphabet_uc;
    if(isset($_GET["allowed_numbers"])) $allowed_chars .= $numbers;
    if(isset($_GET["allowed_specials"])) $allowed_chars .= $specials;
    
    if(empty($allowed_chars)) $allowed_chars .= $all_chars;
    
    if(!$allow_repetitions && ($len_password > strlen($allowed_chars))) {
        $allow_repetitions = true;
    }
    
    session_start();
    $_SESSION["generated_password"] = randomPassword($allowed_chars, $len_password, $allow_repetitions);
    header("Location: ./show-password.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="container mt-5">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1> Password Generator </h1>
                        </div>

                        <div class="card-body">
                            <?php if(!isset($generated_password)) : ?>
                            <form method="GET" class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="mb-3">
                                                <label for="password_length" class="form-label"> Lunghezza password
                                                </label>
                                                <input type="number" class="form-control" min=1 id="password_length"
                                                    name="password_length">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-7">
                                            <div class="mb-3">
                                                <label for="password_length" class="form-label"> Caratteri permessi
                                                </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="allowed_alphabet_lc" name="allowed_alphabet_lc">
                                                    <label class="form-check-label" for="allowed_alphabet_lc">
                                                        Alfabeto minuscolo
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="allowed_alphabet_uc" name="allowed_alphabet_uc">
                                                    <label class="form-check-label" for="allowed_alphabet_uc">
                                                        Alfabeto maiuscolo
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="allowed_numbers" name="allowed_numbers">
                                                    <label class="form-check-label" for="allowed_numbers">
                                                        Numeri
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="allowed_specials" name="allowed_specials">
                                                    <label class="form-check-label" for="allowed_specials">
                                                        Caratteri speciali
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-7">
                                            <div class="mb-3">
                                                <label for="password_length" class="form-label"> Permetti ripetizioni
                                                </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="allow_repetitions" name="allow_repetitions">
                                                    <label class="form-check-label" for="allow_repetitions">
                                                        Sì
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-5 ">
                                            <div class="my-3">
                                                <button class="btn btn-primary"> Genera Password </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <?php else : ?>
                            <div class="alert alert-success" role="alert">
                                La password è stata generata correttamente:
                                <strong><?php echo $generated_password ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>

</html>
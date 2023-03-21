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

include __DIR__ . '/functions.php';
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
                                <div class="col-7">
                                    <div class="mb-3">
                                        <label for="password_length" class="form-label"> Lunghezza password </label>
                                        <input type="number" class="form-control" min=1 id="password_length"
                                            name="password_length">
                                    </div>
                                </div>
                                <div class="col-5 ">
                                    <div style="margin: 2rem">
                                        <button class="btn btn-primary"> Genera Password </button>
                                    </div>
                                </div>
                            </form>

                            <?php else : ?>
                            <div class="alert alert-success" role="alert">
                                La password è stata generata correttamente:
                                <strong><?php echo implode($generated_password) ?></strong>
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
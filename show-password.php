<?php 
session_start();
$generated_password = $_SESSION["generated_password"];
include __DIR__ . '/index.php';

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

                            <div class="alert alert-success" role="alert">
                                La password è stata generata correttamente:
                                <strong><?php echo implode($generated_password) ?></strong>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>

</html>
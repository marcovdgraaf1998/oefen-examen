<?php
    # Email verificatie notificatie
    if (isset($_GET['ver'])) {
        $verificationCheck = $_GET['ver'];

        if ($verificationCheck == 'empty') {
            echo '<div class="alert alert-warning text-center" role="alert">U dient eerst uw emailadres te verifieren!</div>';
        } else if ($verificationCheck == 'success') {
            echo '<div class="alert alert-success text-center" role="alert">Uw e-mailadres is geverifeerd en u kunt nu inloggen!</div>';
        }
    }

    # Login check notificatie
    if (isset($_GET['login'])) {
        $loginCheck = $_GET['login'];

        if ($loginCheck == 'empty') {
            echo '<div class="alert alert-warning text-center" role="alert">Niet alle velden zijn ingevuld!</div>';
        } else if ($loginCheck == 'failed') {
            echo '<div class="alert alert-warning text-center" role="alert">Onjuiste inloggegevens!</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen enquete</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css'/>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Inloggen enquete Grafisch Lyceum Rotterdam</h1>
        <form action="../includes/login.php" method="post">
            <div class="row mb-4">
                <div class="col">
                    <label for="email">E-mailadres</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <div class="form-group mt-3">
                        <label for="password">Wachtwoord</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary float-right" id="submit" value="Log in"></input>
            <a href="../docent/index.php">Docenten login</a>
        </form>
    </div>
</body>
</html>
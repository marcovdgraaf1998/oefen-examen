<?php
    # Login check notificaties
    if (isset($_GET['login'])) {
        $loginCheck = $_GET['login'];

        if ($loginCheck == 'empty') {
            echo '<div class="alert alert-danger text-center" role="alert">Niet alle velden zijn ingevuld!</div>';
        } else if ($loginCheck == 'failed') {
            echo '<div class="alert alert-danger text-center" role="alert">Geen gebruiker gevonden</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen Docent</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css'/>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Inloggen docenten</h1>
        <form action="login.php" method="post">
            <div class="row mb-4">
                <div class="col">
                    <label for="email">E-mailadres</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="form-group mt-3">
                        <label for="password">Wachtwoord</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary float-right" id="submit" name="submit" value="Log in"></input>
        </form>
    </div>
</body>
</html>
<<<<<<< HEAD
=======
<?php
    if(isset($_GET['ver']) && $_GET['ver'] == 'empty') {
        echo '<div class="alert alert-danger" role="alert">U dient eerst uw emailadres te verifieren!</div>';
    }

    if(isset($_GET['ver']) && $_GET['ver'] == 'success') {
        echo '<div class="alert alert-success" role="alert">Uw e-mailadres is geverifeerd en u kunt nu inloggen!</div>';
    }
?>

>>>>>>> e898bd9a46f660b97e5dd2e4885f4b204087863e
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Inloggen Docent</title>
=======
    <title>Document</title>
>>>>>>> e898bd9a46f660b97e5dd2e4885f4b204087863e
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css'/>
</head>
<body>
    <div class="container">
<<<<<<< HEAD
        <h1 class="text-center mt-5">Inloggen docenten</h1>
        <form action="../includes/loginDocent.php" method="post">
=======
        <h1 class="text-center mt-5">Inloggen enquete Grafisch Lyceum Rotterdam</h1>
        <form action="login.php" method="post">
>>>>>>> e898bd9a46f660b97e5dd2e4885f4b204087863e
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
        </form>
    </div>
</body>
</html>
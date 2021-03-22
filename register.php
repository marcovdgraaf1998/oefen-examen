<?php  
    if (isset($_GET['signup'])) {
        $signupCheck = $_GET['signup'];

        if ($signupCheck == 'empty') {
            echo '<div class="alert alert-danger text-center" role="alert">Niet alle velden zijn ingevuld!</div>';
        } else if ($signupCheck == 'char') {
            echo '<div class="alert alert-danger text-center" role="alert">U heeft geen geldige tekens ingevoerd bij de tekstvelden!</div>';
        } else if ($signupCheck == 'number') {
            echo '<div class="alert alert-danger text-center" role="alert">U heeft geen nummers ingevoerd bij de nummervelden!</div>';
        } else if ($signupCheck == 'zipcode') {
            echo '<div class="alert alert-danger text-center" role="alert">U heeft geen geldige postcode ingevoerd</div>';
        } else if ($signupCheck == 'email') {
            echo '<div class="alert alert-danger text-center" role="alert">U heeft geen geldige email ingevoerd</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css'/>
    <link rel='stylesheet' href='css/style.css'/>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Enquete Grafisch Lyceum Rotterdam aanmelden</h1>
        <form action="process/addUser.php" method="post">
            <div class="row">
                <div class="col">
                    <label for="student_number">Studentnummer</label>
                    <input type="text" class="form-control" id="student_number" name="student_number" required>
                </div>
                <div class="col">
                    <label for="class">Klas</label>
                    <input type="text" class="form-control" id="class" name="class" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="class">Voornaam</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col">
                    <label for="class">Achternaam</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="class">Adres</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="row">
                <div class="col">
                    <label for="class">Postcode</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                </div>
                <div class="col">
                    <label for="class">Woonplaats</label>
                    <input type="text" class="form-control" id="residence" name="residence" required>
                </div>
                <div class="col">
                    <label for="age">Leeftijd</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
            </div>
            <div class="form-group">
                <label for="class">E-mailadres</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="class">Wachtwoord</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <input type="hidden" name="user_level">
            <input type="submit" class="btn btn-primary float-right" name="submit" id="submit" value="Registreer" required>
        </form>
    </div>
</body>
</html>
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
                    <input type="text" class="form-control" id="student_number" name="student_number">
                </div>
                <div class="col">
                    <label for="class">Klas</label>
                    <input type="text" class="form-control" id="class" name="class">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="class">Voornaam</label>
                    <input type="text" class="form-control" id="first_name" name="first_name">
                </div>
                <div class="col">
                    <label for="class">Achternaam</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
            </div>
            <div class="form-group">
                <label for="class">Adres</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="row">
                <div class="col">
                    <label for="class">Postcode</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode">
                </div>
                <div class="col">
                    <label for="class">Woonplaats</label>
                    <input type="text" class="form-control" id="residence" name="residence">
                </div>
                <div class="col">
                    <label for="age">Leeftijd</label>
                    <input type="text" class="form-control" id="age" name="age">
                </div>
            </div>
            <div class="form-group">
                <label for="class">E-mailadres</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="class">Wachtwoord</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <input type="hidden" name="user_level">
            <input type="submit" class="btn btn-primary float-right" id="submit" value="Registreer">
        </form>
    </div>
</body>
</html>
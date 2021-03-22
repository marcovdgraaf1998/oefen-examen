<?php
    include '../includes/validateFunction.php';
    include '../includes/config.php';

    if (isset($_POST['submit'])) {
        # Haal waardes binnen en valideer Input d.m.v. functie
        $student_number = validateInput($_POST['student_number']);
        $class = validateInput($_POST['class']);
        $first_name = validateInput($_POST['first_name']);
        $last_name = validateInput($_POST['last_name']);
        $address = validateInput($_POST['address']);
        $zipcode = validateInput($_POST['zipcode']);
        $age = validateInput($_POST['age']);
        $residence = validateInput($_POST['residence']);
        $email = validateInput($_POST['email']);
        $password = sha1($_POST['password']);

        $link = sha1($student_number . $first_name . $last_name);

        # Check inputs en errors
        if (empty($student_number) || empty($class) || empty($first_name) || empty($last_name) || empty($address) || empty($zipcode) || empty($age) || empty($residence) || empty($password)) {
            header('location:../register.php?signup=empty');
            exit();
        } else if (!is_numeric($student_number) && strlen($student_number) <= 0 ||!is_numeric($class) && strlen($class) <= 0 || !is_numeric($age) && strlen($age) <= 0)  {
            header('location:../register.php?signup=number');
            exit();
        } else if (!is_string($first_name) || !is_string($last_name) || !is_string($residence)) {
            header('location:../register.php?signup=char');
            exit();
        } else if (!preg_match('/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', $zipcode)) {
            header('location:../register.php?signup=zipcode');
            exit();
        }  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('location:../register.php?signup=email');
            exit();
        } else {
            # Redirect user dient eerst te verifiëren via email
            header('location:../enquete/index.php?ver=empty');
            
            # Geen errors -> opslaan in database
            $query = "INSERT INTO oefenexamen_enquetes (student_number, class, first_name, last_name, address, zipcode, age, residence, email, password, verified, link)";
            $query .= "VALUES('$student_number', '$class', '$first_name', '$last_name', '$address', '$zipcode', '$age', '$residence', '$email', '$password', '$verified', '$link')";
            
            $result = mysqli_query($mysqli, $query);

            if($result) {
                # Verstuur verifieër mail
                $to = $email;
                $subject = 'Verificatie';

                $message = "<h1>Verifieer uw emailadres</h1>";
                $message .= "<p>Hallo $first_name</p>";
                $message .= "<p>Klik hieronder om uw email te verifieren!</p>";
                $message .= "<a class='btn btn-primary' href='https://84999.ict-lab.nl/oefen-examen/process/verification.php?id=". $link ."'>Verifieer</a>";

                $headers = 'From info@glr.nl' . "\r\n" . 'Reply-To: info@glr.nl' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                mail($to, $subject, $message, $headers);
            }
        }
    }
?>
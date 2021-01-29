<?php
    require_once '../includes/config.php';

    // Get values 
    $student_number = htmlentities($_POST['student_number']);
    $class = htmlentities($_POST['class']);
    $first_name = htmlentities($_POST['first_name']);
    $last_name = htmlentities($_POST['last_name']);
    $address = htmlentities($_POST['address']);
    $zipcode = htmlentities($_POST['zipcode']);
    $age = htmlentities($_POST['age']);
    $residence = htmlentities($_POST['residence']);
    $email = htmlentities($_POST['email']);
    $password = sha1($_POST['password']);
    $user_level = '1';

    $link = sha1($student_number . $first_name . $last_name);

    // Redirect
    header('location:../index.php?ver=empty');

    // Check if values are not empty and write to database
    if(strlen($student_number) > 0 && strlen($class) > 0 && strlen($first_name) > 0 && strlen($last_name) > 0 && strlen($address) > 0 && strlen($zipcode) > 0 && strlen($age) > 0 && strlen($email) > 0 && strlen($password) > 0) {
        $query = "INSERT INTO oefenexamen_users (student_number, class, first_name, last_name, address, zipcode, age, residence, email, password, user_level, verified, link)";
        $query .= "VALUES('$student_number', '$class', '$first_name', '$last_name', '$address', '$zipcode', '$age', '$residence', '$email', '$password', '$user_level', '$verified', '$link')";
        
        $result = mysqli_query($mysqli, $query);

        if($result) {
            // Send mail
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
?>
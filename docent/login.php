<?php
    require_once '../includes/config.php';
    session_start();

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        # Check of inputs een waarde hebben > 0
        if (strlen($email) > 0 && strlen($password) > 0) {
            $password = sha1($password);

            $query = "SELECT * FROM oefenexamen_users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($mysqli, $query);

            # Verkrijg db values
            $getDbValues = mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) == 1) {
                # Zet database waardes in sessies
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $getDbValues['id'];
                $_SESSION['first_name'] = $getDbValues['first_name'];

                header('location:docent.php');
            } else {
                # Onjuiste gegevens
                header('location:index.php?login=failed');
                exit;
            }
        } else {
            # Één van de inputs is leeg
            header('location:index.php?login=empty');
            exit;
        }
    }
?>
<?php
    require_once 'config.php';
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strlen($email) > 0 && strlen($password) > 0) {
        $password = sha1($password);

        $query = "SELECT * FROM oefenexamen_users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($mysqli, $query);

        $getDbValues = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $getDbValues['id'];
            $_SESSION['user_level'] = $getDbValues['user_level'];
            $_SESSION['first_name'] = $getDbValues['first_name'];
            $_SESSION['filled_in'] = $getDbValues['filled_in'];

            header('Location:../docent/docent.php');
        } else {
            header('Location:../docent/index.php');
            exit;
        }
    } else {
        echo 'Niet alle velden zijn ingevuld';
        exit;
    }
?>
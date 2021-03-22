<?php
    include '../includes/config.php';
    include '../includes/session.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strlen($email) > 0 && strlen($password) > 0) {
        $password = sha1($password);

        $query = "SELECT * FROM oefenexamen_users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($mysqli, $query);

        $getDbValues = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            # Zet database waardes in sessies
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $getDbValues['id'];
            $_SESSION['first_name'] = $getDbValues['first_name'];

            header('Location:../docent.php');
        } else {
            header('location:index.php?login=match');
            exit();
        }
    } else {
        header('location:index.php?login=failed');
        exit();
    }
?>
<?php

    require_once '../includes/config.php';
    require_once '../includes/session.php';

    if(isset($_POST['submit'])) {
        $distance = htmlentities($_POST['distance']);
        $travel_time = htmlentities($_POST['travel-time']);
        $transport = implode(', ', $_POST['transport']);
        $start_time = htmlentities($_POST['start-time']);
        $end_time = htmlentities($_POST['end-time']);
        $comment = htmlentities($_POST['comment']);
        $filled_in = 1;
        $id = $_SESSION['id'];

        $query = "UPDATE oefenexamen_enquetes SET distance = '$distance', travel_time = '$travel_time', transport = '$transport', start_time = '$start_time', end_time = '$end_time', comment = '$comment', filled_in = '$filled_in' WHERE id = '$id'";
        $result = mysqli_query($mysqli, $query);

        echo $query;

        if ($result) {
            header('Location:../enquete/enquete.php?msg=success');
        } else {
            echo 'Er ging iets mis!';
        }
    }
?>
<?php
    include '../validateFunction.php';
    include '../includes/config.php';
    include '../includes/session.php';

    # Valideer gegevens
    if(isset($_POST['submit'])) {
        $distance = validateInput($_POST['distance']);
        $travel_time = validateInput($_POST['travel-time']);
        $transport = implode(', ', $_POST['transport']);
        $start_time = validateInput($_POST['start-time']);
        $end_time = validateInput($_POST['end-time']);
        $comment = validateInput($_POST['comment']);
        $filled_in = 1;
        $id = $_SESSION['id'];

        $query = "UPDATE oefenexamen_enquetes SET distance = '$distance', travel_time = '$travel_time', transport = '$transport', start_time = '$start_time', end_time = '$end_time', comment = '$comment', filled_in = '$filled_in' WHERE id = '$id'";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            header('Location:../enquete/enquete.php?enquete=success');
        } else {
            header('Location:../enquete/enquete.php?enquete=failed');
        }
    }
?>
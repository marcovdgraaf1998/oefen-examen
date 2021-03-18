<?php
    require_once '../includes/config.php';

    $id = $_GET['id'];

    $query = "UPDATE oefenexamen_enquetes SET verified = '1' WHERE link ='$id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header('Location:../enquete/index.php?ver=success');
    } else {
        echo 'Iets ging mis!';
    }
?>
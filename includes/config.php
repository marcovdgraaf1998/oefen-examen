<?php 

$db_hostname = 'localhost';
$db_username = '84999_db';
$db_password = 'marco010';
$db_database = '84999_examens';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$mysqli) {
    echo mysqli_connect_error() . '<br/>';
}
?>
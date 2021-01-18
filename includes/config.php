<?php 

$db_hostname = 'localhost';
$db_username = '84999';
$db_password = 'marco010';
$db_database = 'back2_personen';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$mysqli) {
    echo mysqli_connect_error() . '<br/>';
}
?>
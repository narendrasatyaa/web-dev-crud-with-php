<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'crud_donasi';

try {
    $conn = mysqli_connect($hostname, $username, $password, $database);
} catch (Exception $e) {
    echo "<b>Error Cik :  Gagal! </b>".$e;
}
?>

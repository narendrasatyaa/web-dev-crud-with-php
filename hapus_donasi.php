<?php 
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM donasi WHERE id=$id";
$result = mysqli_query($conn, $query);
if ($result) {
    header('Location:data_donasi.php');
}
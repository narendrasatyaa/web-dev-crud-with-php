<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Donasi</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark sticky-top">
    <div class="container">
        <a href="index.php" class="navbar-brand text-white">Siapa Peduli?</a>
        <a href="logout.php" class="btn btn-danger">Logout</a> 
    </div>
</nav>
<div class="container">
    <center><h1>Data Donasi</h1></center>
    <a href="tambah_donasi.php" class="btn btn-primary mb-3">Tambah Donasi</a>
    <table class="table table-success">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Donatur</th>
                <th>Nominal</th>
                <th>Tanggal Diterima</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";

            session_start(); 
            if ($_SESSION['is_login'] != true) {
                header("Location: login.php?pesan=Silahkan Login Terlebih Dahulu");
                exit();  
            }
            
            $query = "SELECT * FROM donasi";
            $result = mysqli_query($conn, $query);

            $no = 0;

            while ($row = mysqli_fetch_array($result)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?> </td>
                    <td><?= $row['nama']?></td>
                    <td>Rp. <?= $row['nominal']?></td>
                    <td><?= $row['tgl_diterima']?></td>
                    <td>
                        <a href="ubah_donasi.php?id=<?=$row['id'] ?>" class="btn btn-warning"><i class="fas fa-pen-to-square"></i></a>
                        <a href="hapus_donasi.php?id=<?=$row['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="./JS/bootstrap.min.js"></script>
</body>
</html>

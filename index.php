<?php include 'koneksi.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Bosku</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./CSS/all"> -->
</head>

<body  class="d-flex flex-column vh-100%">
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container">
            <a href="index.php" class="navbar-brand text-white">Siapa Peduli?</a>
            <?php 
            session_start();
            if ($_SESSION['is login'] != true) { ?>
            <div>
            <a href="data_donasi.php" class="btn btn-primary">Dashboard</a>
            <a href="login.php" class="btn btn-danger">Logout</a>
            </div>
             <?php }  ?>
            
        </div>
    </nav>

    <div class="text-white text-center py-5" style="background:url(asset/image3.png); background-size: cover; background-position:center;">
        <div class="container">
            <h1 class="fw-bold">AYO PEDULI!</h1>
            <p>Lorem Ipsum 12Pt</p>
            <div class="row bg-dark border border-light mt-5">
                <div class="col-md-4">
                    <?php 
                        $query = "SELECT SUM(nominal) AS Total_Donasi FROM donasi";
                        $result =  mysqli_query($conn, $query);
                        $total_donasi = mysqli_fetch_array($result);
                        ?>
                    <h3 class="fw-bold py-2"> Rp.
                        <?= $total_donasi['Total_Donasi']; ?>
                    </h3>
                    <p class="text-uppercase">Total Dana Terkumpul </p>
                </div>
                <div class="col-md-4">
                    <?php 
                        $query = "SELECT COUNT(nominal) AS total_donatur FROM donasi";
                        $result =  mysqli_query($conn, $query);
                        $total_donatur = mysqli_fetch_array($result);   
                        ?>
                    <h3 class="fw-bold py-2">
                        <?= $total_donatur['total_donatur']; ?>
                    </h3>
                    <p class="text-uppercase">Total Donatur tergabung </p>
                </div>
                <div class="col-md-4">
                    <?php 
                        $query = "SELECT tgl_diterima FROM donasi ORDER BY tgl_diterima DESC LIMIT 1";
                        $result =  mysqli_query($conn, $query);
                        $tgl_diterima = mysqli_fetch_array($result);   
                        ?>
                    <h3 class="fw-bold py-2">
                        <?= $tgl_diterima['tgl_diterima']; ?>
                    </h3>
                    <p class="text-uppercase">Tanggal Donasi Terakhir </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <center>
            <h1>Daftar Donatur Tergabung</h1>
        </center>
        <!-- <a href="tambah_donasi.php" class="btn btn-primary mb-3">Tambah Donasi</a> -->
        <table class="table table-success">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Donatur</th>
                    <th>Nominal</th>
                    <th>Tanggal Diterima</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "koneksi.php";
                $query = "SELECT * FROM donasi";
                $result = mysqli_query($conn, $query);

                $no = 0;
                
                while ($row = mysqli_fetch_array($result)) {
                    $no++; ?>
                <tr>
                    <td>
                        <?= $no ?>
                    </td>
                    <td>
                        <?= $row['nama']?>
                    </td>
                    <td>Rp.
                        <?= $row['nominal']?>
                    </td>
                    <td>
                        <?= $row['tgl_diterima']?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <div class="bg-dark text-white text-center py-5 mt-auto">
        <h2 class="fw-bold">Terimakasih Telah Berdonasi</h2>
        <p>Copyright &copy; 2025. All rights reserved.</p>
    </div>
    <script src="./JS/bootstrap.min.js"></script>
    </div>
</body>

</html>
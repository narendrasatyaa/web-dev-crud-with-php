<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Donasi</title>
        <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container">
            <a href="index.php" class="navbar-brand text-white">Siapa Peduli?</a>
            <a href="login.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>
        <div class="container">
        <center><h2>Tambah Data Donasi</h2></center>
  <form action="" method="post">
        <label for="tbNamaPengirim">Nama Pengirim </label>
        <input type="text" id=tbNamaPengirim name="nama" class="form-control">
        <label for="tbNominal">Nominal </label>
        <input type="number" id=tbNominal name="nominal" class="form-control">
        <label>Metode Pembayaran </label>
        <div class="form-check">
        <label for="tbMetode" class="form-label">Shopeepay</label>
        <input type="radio" name="metode" id="tbMetode" class="form-check-input" value="Shopeepay">
        </div>
        <div class="form-check">
        <label for="tbMetode" class="form-label">Gopay</label>
        <input type="radio" name="metode" id="tbMetode" class="form-check-input" value="Gopay">
        </div>
        <div class="form-check">
        <label for="tbMetode" class="form-label">QRIS</label>
        <input type="radio" name="metode" id="tbMetode" class="form-check-input" value="QRIS">
        </div>
        <div class="form-check">
        <label for="tbMetode" class="form-label">Transfer</label>
        <input type="radio" name="metode" id="tbMetode" class="form-check-input" value="Transfer">
        </div>

       <button type="submit"  name="submit" class="btn btn-primary">Simpan Data</button>
       <button type="reset" name="reset" class="btn btn-secondary">Reset Data</button>
       </form>
       <!-- <a href="data_donasi.php" class="btn btn-primary mt-3">Kembali Ke Tabel Data Donasi</a> -->
        <script src="./JS/bootstrap.min.js"></script>
        </div>
    </body>
    </html>

    <?php
include "koneksi.php";  
session_start();  


if ($_SESSION['is_login'] != true) {
    header("Location: login.php?pesan=Silahkan Login Terlebih Dahulu");
    exit();  
}


if (isset($_POST['submit'])) {
    $name = $_POST['nama'];
    $nominal = $_POST['nominal'];
    $metode = $_POST['metode'];

    
    if (empty($name) || empty($nominal) || empty($metode)) {
        echo "<script>alert('Semua data harus diisi');</script>";
    } else {
        
        $query = "INSERT INTO donasi (nama, nominal, metode) VALUES ('$name', $nominal, '$metode')";
        $result = mysqli_query($conn, $query);
        
        
        if ($result) {
            header('Location: data_donasi.php');
            exit();
        } else {
            echo "<script>alert('Terjadi kesalahan saat menambah donasi');</script>";
        }
    }
}
?>
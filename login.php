<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Bos</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
</head>
<body class="bg-dark">
<div class="container">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card bg-light" style="width: 100%; max-width: 480px;">
            <h2>Login</h2>
            <?php if (isset($_GET['pesan'])) { ?>
                <div class="alert alert-danger"><?=$_GET['pesan']?></div>
            <?php } ?>
            <!-- Form Login -->
            <form method="POST" action="login.php">
                <label for="tbUsername">Username</label>
                <input type="text" name="username" id="tbUsername" class="form-control" required>
                <label for="tbPassword">Password</label>
                <input type="password" name="password" id="tbPassword" class="form-control" required>
                <button type="submit" name="submit" class="btn btn-primary mt-2 w-100">Login</button>
            </form>
        </div>
    </div>
</div>

<script src="./JS/bootstrap.min.js"></script>
</body>
</html>

<?php 

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin123') {
        session_start();
        $_SESSION['is_login'] = true;
        header('Location: data_donasi.php');
    } else {
        header('Location:login.php?pesan=Username atau Password salah!');
    }
    
}

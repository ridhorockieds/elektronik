<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff | Toko Elektronik</title>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../../index.php?pesan=notlogin");
    }
    ?>
    <h2>Selamat datang <?= $_SESSION['nama_user']; ?></h2>
    <p><strong>Halaman Staff sedang dalam development!</strong></p>
    <button><a href="../logout.php">Keluar</a></button>
</body>

</html>
<?php
include '../../../config/Database.php';

$namaSuplier = $_POST['nama_suplier'];
$alamat = $_POST['alamat_suplier'];
$noTelp = $_POST['no_telp'];
$email = $_POST['email'];

$query = mysqli_query($connection, " INSERT INTO tb_suplier (
    nama_suplier, alamat_suplier, no_telp, email) VALUES 
('$namaSuplier','$alamat','$noTelp','$email')");
header('location:../master-suplier.php');

<?php
include '../../../config/Database.php';
$idSuplier = $_POST['id_suplier'];
$namaSuplier = $_POST['nama_suplier'];
$alamat = $_POST['alamat_suplier'];
$noTelp = $_POST['no_telp'];
$email = $_POST['email'];

$query = mysqli_query($connection, " UPDATE tb_suplier SET 
nama_suplier = '$namaSuplier',
alamat_suplier = '$alamat',
no_telp = '$noTelp',
email = '$email'
WHERE id_suplier = '$idSuplier'");
header('location:../master-suplier.php');

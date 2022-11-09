<?php
include '../../../config/Database.php';
$idBarang = $_POST['id_barang'];
$namaBarang = $_POST['nama_barang'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$idSuplier = $_POST['id_suplier'];

$query = mysqli_query($connection, " UPDATE tb_barang SET 
nama_barang = '$namaBarang',
stok = '$stok',
harga = '$harga',
id_suplier = $idSuplier
WHERE id_barang = '$idBarang'");

header('location:../master-barang.php');

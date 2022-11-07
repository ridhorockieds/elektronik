<?php
include '../../../config/Database.php';

$kodeBarang = $_POST['kode_barang'];
$namaBarang = $_POST['nama_barang'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$idSuplier = $_POST['id_suplier'];

$query = mysqli_query($connection, " INSERT INTO tb_barang (kode_barang, nama_barang, stok, harga, id_suplier) VALUES ('$kodeBarang','$namaBarang','$stok','$harga','$idSuplier')");
header('location:../master-barang.php');

<?php
include '../../../config/Database.php';
$idSuplier = $_GET['id_suplier'];
// print_r($idBarang);
$query = mysqli_query($connection, "DELETE FROM tb_suplier WHERE id_suplier = '$idSuplier'");

header('location:../master-suplier.php');

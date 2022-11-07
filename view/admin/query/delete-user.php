<?php
include '../../../config/Database.php';
$iduser = $_GET['id_user'];
// print_r($idBarang);
$query = mysqli_query($connection, "DELETE FROM tb_user WHERE id_user = '$iduser'");

header('location:../master-user.php');

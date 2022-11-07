<?php
include '../../../config/Database.php';
$iduser = $_POST['id_user'];
$namauser = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$query = mysqli_query($connection, " UPDATE tb_user SET 
nama_user = '$namauser',
username = '$username',
password = '$password',
role = '$role'
WHERE id_user = '$iduser'");
header('location:../master-user.php');

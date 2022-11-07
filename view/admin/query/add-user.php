<?php
include '../../../config/Database.php';

$namaUser = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$query = mysqli_query($connection, " INSERT INTO tb_user
(nama_user, username, password, role) VALUES 
('$namaUser','$username','$password','$role')");

header('location:../master-user.php');

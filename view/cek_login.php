<?php
session_start();

include '../config/Database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = mysqli_query($connection, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");

$check = mysqli_num_rows($user);

if ($check > 0) {
    $data = mysqli_fetch_assoc($user);
    if ($data['role'] == 'admin') {
        $_SESSION['username'] = $username;
        // $_SESSION['nama_user'] = $check['nama_user'];
        $_SESSION['status'] = 'login';
        header('location:admin/admin.php');
    } elseif ($data['role'] == 'staff') {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        header('location:staff/staff.php');
    }
} else {
    header('location:../index.php?pesan=gagal');
}

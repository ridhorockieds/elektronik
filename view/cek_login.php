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
        $_SESSION['role'] = 'admin';
        $_SESSION['status'] = 'login';
        header('location:admin/');
    } elseif ($data['role'] == 'staff') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'staff';
        $_SESSION['status'] = 'login';
        header('location:staff/');
    }
} else {
    header('location:../index.php?pesan=gagal');
}

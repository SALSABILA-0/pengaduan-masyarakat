<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$query = $koneksi->query("select * from masyarakat where username='$username' AND password='$password'");

if ($query) {
    echo "berhasil";
} else {
    var_dump($koneksi->errorInfo());
}


$jumlahBaris = $query->rowCount();

if ($jumlahBaris > 0) {

    $data = $query->fetch();

    $_SESSION['nik'] = $data['nik'];
    $_SESSION['level'] = 'masyarakat';

    header("location:home.php");
} else {
    header("location:login.php");
}
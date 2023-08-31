<?php
// $id = $_GET['id'];

//koneksi database
include 'koneksi.php';
 
//delete
 $koneksi->query("delete from pengaduan where id_pengaduan= 117 ");

 include 'koneksi.php';
 $id_pengaduan = $_GET['id_pengaduan'];
    $koneksi->query("DELETE FROM `pengaduan` WHERE id_pengaduan=$id_pengaduan");
    header('location:home.php');
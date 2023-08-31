<?php
//koneksi
include "koneksi.php";
$isi_laporan = $_POST['isi laporan'];
$id = $_GET['id'];
// die($isi_laporan);
$query = $koneksi->query("select *from id_pengaduan SET isi_laporan '$isi_laporan' where id_pengaduan '$id' ");

header("location:home.php");



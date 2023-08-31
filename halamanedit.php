<?php
//koneksi
include "koneksi.php";
$isi_laporan = $_POST['isi_laporan'];
$id = $_GET['id'];
//query
$query = $koneksi->query("select *from id_pengaduan SET isi_laporan '$isi_laporan' where id_pengaduan '$id' ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title;
   
</head>
<body>
      <div class="container">
        <form action="backend/prosesedit.php"id=<?=$data['id_pengaduan']?> method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleFormControlTestarea1" class="form-label">Chosee file</label>
        <textarea class="form-control" rows="3" name="isi_laporan"></textarea>
</div>
<div class="d-grid gap-2 col-4 mx-auto">
  <button class="btn btn-primary" type="submit">Send</button>
</div>
</form>
</body>
</html>

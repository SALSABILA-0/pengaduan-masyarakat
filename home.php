<?php
$koneksi        = mysqli_connect("localhost", "root", "", "pengaduan_masyarakat");
$join           = "select * from pengaduan join masyarakat on masyarakat.nik = pengaduan.nik";
$select         = mysqli_query($koneksi, $join);

?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/add.css' rel='stylesheet'>
  <link rel="stylesheet" href="dashboard.css">
</head>

<body style="background-color : #ffffff;">
<!-- NAVBAR-->
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Laporan Pengaduan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container mt-5">
    <a href="pengaduan_masyarakat.php"><button type="button" class="btn btn-secondary mb-3 btn-lg">Tambahkan laporan</button></a>
    <table class="table table-secondary table-bordered text-center">
      <thead>
        <tr class="table-dark">
          <th scope="col">id</th>
          <th scope="col">Nama Pelapor</th>
          <th scope="col">isi Laporan</th>
          <th scope="col">Bukti Foto</th>
          <th scope="col">Status</th>
          <th scope="col">aksi</th>
        </tr>
      </thead>
      <?php while ($data = mysqli_fetch_array($select)) { ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $data['id_pengaduan']; ?></th>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['isi_laporan']; ?></td>
            <td><img src="image/<?php echo $data['foto']; ?>" alt="" width="150px"></td>
            <td><button type="button" class="btn btn-info mt-4 text-white" disabled><?php echo $data['status']; ?></button></td>
            <td>
              <form action="" method="post">
                <button class="btn btn-danger" name="delete" value="<?= $data['id_pengaduan'] ?>">
                  HAPUS
                </button>
              </form>
              <form action="edit.php" method="get">
                <button class="btn btn-success" name="id_key" value="<?= $data['id_pengaduan'] ?>">EDIT</button>
              </form>
            </td>
          </tr>
        </tbody>
      <?php } ?>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
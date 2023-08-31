<?php
require 'koneksi.php';

session_start();

if ($_POST['username'] === 'admin') {
    if (isset($_SESSION['id_petugas'])) {
        echo "
            <script>
                alert('Akun anda sudah terdaftar, silahkan login');
                document.location.href = '../login.php';
            </script>
             ";
        exit();
    }

    $nama = strtolower(stripslashes($_POST['nama']));
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $telp = $_POST['telp'];
    $level = 'admin';

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username='$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username yang anda masukan sudah ada');
                document.location.href = '../registerAdmin.php';
            </script>
             ";
        exit();
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    $data = mysqli_query($conn, "INSERT INTO petugas VALUES ('','$nama','$username','$password','$telp','$level')");
    if ($data) {
        echo "
            <script>
                alert('Akun anda sudah berhasil terdaftar');
                document.location.href = '../login.php';
            </script>
             ";
    }
    return mysqli_affected_rows($conn);
} else {
    if (isset($_SESSION['nik'])) {
        header("Location:home.php");
    }

    $nik = $_POST['nik'];
    $nama = strtolower(stripslashes($_POST['nama']));
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $telp = $_POST['telp'];

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username='$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username yang anda masukan sudah ada');
                document.location.href = '../register.php';
            </script>
             ";
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    $data = mysqli_query($conn, "INSERT INTO masyarakat VALUES ('$nik','$nama','$username','$password','$telp')");
    if ($data) {
        echo "
            <script>
                alert('Akun anda sudah berhasil terdaftar');
                document.location.href = '../login.php';
            </script>
             ";
    }
    return mysqli_affected_rows($conn);
}
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_karyawan = $_POST['nama'];
    $level = $_POST['level'];

    $querySimpan = mysqli_query($koneksi, "INSERT INTO karyawan (username, password, nama_karyawan, level) VALUES ('$username','$password','$nama_karyawan','$level')");
    if ($querySimpan) {
        echo "<script> alert('Data Biaya Kirim Berhasil Masuk'); window.location = '$admin_url'+'dashboardadmin.php?module=karyawan';</script>";
        //echo "masuk";
    } else {
        echo "<script> alert('Data Biaya Kirim Gagal Dimasukkan'); window.location = '$admin_url'+'dashboardadmin.php?module=add_karyawan';</script>";
    }
}
?>
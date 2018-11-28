<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKaryawan = $_POST['id_karyawan'];
    $username = $_POST['username'];
    $password=$_POST['password'];
    $nama=$_POST['nama'];
    $level=$_POST['level'];
    $queryEdit = mysqli_query($koneksi, "UPDATE karyawan SET username='$username', password='$password', nama_karyawan='$nama', level='$level' WHERE id_karyawan='$idKaryawan'");

    if ($queryEdit) {
        echo "<script> alert('Data Biaya Kirim Berhasil Diubah'); window.location = '$admin_url'+'dashboardadmin.php?module=karyawan';</script>";
    } else {
        echo "<script> alert('Data Biaya Kirim Berhasil Diubah'); window.location = '$admin_url'+'dasboardadmin.php?module=edit_karyawan&id_karyawan='+'$idKaryawan';</script>";

    }
}
?>
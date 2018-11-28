<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKaryawan = $_GET['id_karyawan'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id_karyawan='$idKaryawan'");
    if ($queryHapus) {
        echo "<script> alert('Data Biaya Kirim Berhasil Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=karyawan';</script>";
    } else {
        echo "<script> alert('Data Biaya Kirim Gagal Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=karyawan';</script>";

    }
}
?>
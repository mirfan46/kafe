<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idJenisMeja = $_GET['id_jenis_meja'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM jenis_meja WHERE id_jenis_meja ='$idJenisMeja'");
    if ($queryHapus) {
        echo "<script> alert('Data Jenis Meja Berhasil Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=jenis_meja';</script>";
    } else {
        echo "<script> alert('Data Jenis Meja Gagal Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=jenis_meja';</script>";

    }
}
?>
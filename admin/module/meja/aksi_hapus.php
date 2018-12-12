<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idMeja = $_GET['id_meja'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM meja WHERE id_meja ='$idMeja'");
    if ($queryHapus) {
        echo "<script> alert('Data Meja Berhasil Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=meja';</script>";
    } else {
        echo "<script> alert('Data Meja Gagal Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=meja';</script>";

    }
}
?>
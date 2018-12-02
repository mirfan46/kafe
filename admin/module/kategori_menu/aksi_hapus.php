<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKategoriMenu = $_GET['id_kategori_menu'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM kategori_menu WHERE id_kategori_menu ='$idKategoriMenu'");
    if ($queryHapus) {
        echo "<script> alert('Data Kategori Menu Berhasil Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=kategori_menu';</script>";
    } else {
        echo "<script> alert('Data Kategori Menu Gagal Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=kategori_menu';</script>";

    }
}
?>
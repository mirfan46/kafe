<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idmenu = $_GET['id_menu'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM menu WHERE id_menu ='$idmenu'");
    if ($queryHapus) {
        echo "<script> alert('Data Menu Berhasil Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=menu';</script>";
    } else {
        echo "<script> alert('Data Menu Gagal Dihapus'); window.location = '$admin_url'+'dashboardadmin.php?module=menu';</script>";

    }
}
?>
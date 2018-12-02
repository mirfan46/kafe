<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $nama = $_POST['nama'];

    $querySimpan = mysqli_query($koneksi, "INSERT INTO kategori_menu (nama_kategori_menu) VALUES ('$nama')");
    if ($querySimpan) {
        echo "<script> alert('Data Kategori Menu Berhasil Masuk'); window.location = '$admin_url'+'dashboardadmin.php?module=kategori_menu';</script>";
        //echo "masuk";
    } else {
        echo "<script> alert('Data Kategori Menu Gagal Dimasukkan'); window.location = '$admin_url'+'dashboardadmin.php?module=add_kategori_menu';</script>";
    }
}
?>
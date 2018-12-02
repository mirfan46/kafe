<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKategoriMenu=$_POST['id_kategori_menu'];
    $nama = $_POST['nama'];
    $queryEdit = mysqli_query($koneksi, "UPDATE kategori_menu SET nama_kategori_menu='$nama' WHERE id_kategori_menu ='$idKategoriMenu'");

    if ($queryEdit) {
        echo "<script> alert('Data Kategori Menu Berhasil Diubah'); window.location = '$admin_url'+'dashboardadmin.php?module=kategori_menu';</script>";
    } else {
        echo "<script> alert('Data Kategori Menu Berhasil Diubah'); window.location = '$admin_url'+'dasboardadmin.php?module=edit_kategori_menu&id_kategori_menu='+'$idKategoriMenu';</script>";

    }
}
?>
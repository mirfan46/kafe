<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idPelanggan = $_POST['id_pelanggan'];
    $username = $_POST['username'];
    $password=$_POST['password'];
    $nama=$_POST['nama'];

    $queryEdit = mysqli_query($koneksi, "UPDATE pelanggan SET username='$username', password='$password', nama_pelanggan='$nama' WHERE id_pelanggan='$idPelanggan'");

    if ($queryEdit) {
        echo "<script> alert('Data Pelanggan Berhasil Diubah'); window.location = '$admin_url'+'dashboardadmin.php?module=pelanggan';</script>";
    } else {
        echo "<script> alert('Data Pelanggan Berhasil Diubah'); window.location = '$admin_url'+'dasboardadmin.php?module=edit_pelanggan&id_pelanggan='+'$idPelanggan';</script>";

    }
}
?>
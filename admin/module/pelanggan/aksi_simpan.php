<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama_pelanggan = $_POST['nama'];

    $querySimpan = mysqli_query($koneksi, "INSERT INTO pelanggan (email, password, nama_pelanggan) VALUES ('$email','$password','$nama_pelanggan')");
    if ($querySimpan) {
        echo "<script> alert('Data Pelanggan Berhasil Masuk'); window.location = '$admin_url'+'dashboardadmin.php?module=pelanggan';</script>";
        //echo "masuk";
    } else {
        echo "<script> alert('Data Pelanggan Gagal Dimasukkan'); window.location = '$admin_url'+'dashboardadmin.php?module=add_pelanggan';</script>";
    }
}
?>
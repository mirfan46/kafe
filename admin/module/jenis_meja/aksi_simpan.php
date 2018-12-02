<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $jenis = $_POST['jenis'];

    $querySimpan = mysqli_query($koneksi, "INSERT INTO jenis_meja (nama_jenis_meja) VALUES ('$jenis')");
    if ($querySimpan) {
        echo "<script> alert('Data Jensi Meja Berhasil Masuk'); window.location = '$admin_url'+'dashboardadmin.php?module=jenis_meja';</script>";
        //echo "masuk";
    } else {
        echo "<script> alert('Data Jensi Meja Gagal Dimasukkan'); window.location = '$admin_url'+'dashboardadmin.php?module=add_jenis_meja';</script>";
    }
}
?>
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $nomer_meja = $_POST['nomerMeja'];
    $id_jenis_meja = $_POST['idJenisMeja'];
    $status_meja = $_POST['status'];

    $querySimpan = mysqli_query($koneksi, "INSERT INTO meja (nomer_meja, id_jenis_meja, status_meja) VALUES ('$nomer_meja','$id_jenis_meja','$status_meja')");
    if ($querySimpan) {
        echo "<script> alert('Data Meja Berhasil Masuk'); window.location = '$admin_url'+'dashboardadmin.php?module=meja';</script>";
        //echo "masuk";
    } else {
        echo "<script> alert('Data Meja Gagal Masuk'); window.location = '$admin_url'+'dashboardadmin.php?module=add_meja';</script>";
    }
}
?>
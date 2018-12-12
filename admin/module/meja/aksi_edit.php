<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idMeja=$_POST['id_meja'];
    $nomerMeja=$_POST['nomerMeja'];
    $jenisMeja=$_POST['idJenisMeja'];
    $status=$_POST['status'];
    $queryEdit = mysqli_query($koneksi, "UPDATE meja SET nomer_meja ='$nomerMeja', id_jenis_meja = '$jenisMeja', status_meja = '$status' WHERE id_meja ='$idMeja'");

    if ($queryEdit) {
        echo "<script> alert('Data Meja Berhasil Diubah'); window.location = '$admin_url'+'dashboardadmin.php?module=meja';</script>";
    } else {
        echo "<script> alert('Data Meja Berhasil Diubah'); window.location = '$admin_url'+'dasboardadmin.php?module=edit_meja&id_jenis_meja='+'$idMeja';</script>";

    }
}
?>
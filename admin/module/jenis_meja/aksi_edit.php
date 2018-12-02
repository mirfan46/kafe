<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idJenisMeja=$_POST['id_jenis_meja'];
    $jenis = $_POST['jenis'];
    $queryEdit = mysqli_query($koneksi, "UPDATE jenis_meja SET nama_jenis_meja ='$jenis' WHERE id_jenis_meja ='$idJenisMeja'");

    if ($queryEdit) {
        echo "<script> alert('Data Jenis Meja Berhasil Diubah'); window.location = '$admin_url'+'dashboardadmin.php?module=jenis_meja';</script>";
    } else {
        echo "<script> alert('Data Jenis Meja Berhasil Diubah'); window.location = '$admin_url'+'dasboardadmin.php?module=edit_jenis_meja&id_jenis_meja='+'$idJenisMeja';</script>";

    }
}
?>
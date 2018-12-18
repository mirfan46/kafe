<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    //data gambar
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    //data selain gambar
    $idmenu = $_POST['id_menu'];
    $namamenu = $_POST['nama'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    // Set path folder tempat menyimpan gambarnya
    $path = "../../upload/" . $nama_file;
    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {// Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if ($ukuran_file <= 1000000) {// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if (move_uploaded_file($tmp_file, $path)) {// Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $queryEdit = mysqli_query($koneksi, "UPDATE menu SET id_kategori_menu ='$kategori', nama_menu = '$namamenu', harga_menu = '$harga', gambar_menu = '$nama_file', deskripsi_menu = '$deskripsi', status_menu = '$status' WHERE id_menu ='$idmenu'");

                if ($queryEdit) {// Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    echo "<script> alert('Data Menu Berhasil Masuk'); window.location = '$admin_url'+'dashboardadmin.php?module=menu';</script>";
                } else {
                    // Jika Gagal, Lakukan :
                    echo "<script> alert('Data Menu Gagal Masuk'); window.location = '$admin_url'+'dashboardadmin.php?module=edit_menu';</script>";
                }
            } else {
                // Jika gambar gagal diupload, Lakukan :
                echo "<script> alert('Data Gambar Menu Gagal Dimasukkan'); window.location = '$admin_url'+'dashboardadmin.php?module=edit_menu';</script>";
            }
        } else {
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "<script> alert('Data Gambar Menu Gagal Dimasukkan Karena Ukuran Melebihi 1 MB'); window.location = '$admin_url'+'dashboardadmin.php?module=edit_menu';</script>";
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "<script> alert('Data Gambar Menu Gagal Dimasukkan Karena Tidak Berekstensi JPG/JPEG/PNG'); window.location = '$admin_url'+'dashboardadmin.php?module=edit_menu';</script>";
    }
}
?>
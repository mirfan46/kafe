<?php
    $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id_pelanggan]'");
    echo "<script>alert('Data pelanggan berhasil terhapus');</script>";
    echo "<script>location='index.php?module=pelanggan';</script>";
?>
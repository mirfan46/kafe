<?php
    $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$_GET[id_menu]'");
    $pecah = $ambil->fetch_assoc();
    $gambarbarang = $pecah['gambar_menu'];
    if (file_exists("upload/$gambarbarang"))
    {
        unlink("upload/$gambarbarang");
    }

    $koneksi->query("DELETE FROM menu WHERE id_menu='$_GET[id_menu]'");
    echo "<div class='alert alert-info'>Data menu berhasil terhapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=menu'>";
?>
<?php
    $koneksi->query("DELETE FROM kategori_menu WHERE id_kategori_menu='$_GET[id_kategori_menu]'");
    echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=kategori_menu'>";
?>
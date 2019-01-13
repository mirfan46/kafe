<?php
    $koneksi->query("DELETE FROM jenis_meja WHERE id_jenis_meja='$_GET[id_jenis_meja]'");
    echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=jenis_meja'>";
?>
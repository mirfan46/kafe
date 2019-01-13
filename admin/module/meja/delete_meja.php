<?php
    $koneksi->query("DELETE FROM meja WHERE id_meja='$_GET[id_meja]'");
    echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=meja'>";
?>
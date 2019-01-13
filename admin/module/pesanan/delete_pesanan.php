<?php
    $koneksi->query("DELETE FROM pemesanan WHERE id_pemesanan='$_GET[id_pemesanan]'");
    echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=pemesanan'>";
?>
<?php
    $koneksi->query("DELETE FROM karyawan WHERE id_karyawan='$_GET[id_karyawan]'");
    echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=karyawan'>";
?>
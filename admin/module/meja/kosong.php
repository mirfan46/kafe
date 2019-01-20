<?php
    $kosong = "kosong";
    $koneksi->query("UPDATE meja SET status_meja='$kosong' WHERE id_meja='$_GET[id_meja]'");
    echo "<div class='alert alert-success'>Meja berhasil dikosongkan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=meja'>";
?>
<?php
include "../lib/koneksi.php";
//mendapatkan id_pemesanan
$id_pemesanan = $_GET['id_pemesanan'];

?>
<?php
    if (isset($_POST["ubah"])) 
    {
        
        $status = $_POST["status"];
        $koneksi->query("UPDATE pemesanan SET status_pesanan='$status'
        WHERE id_pemesanan='$id_pemesanan'");

        echo "<div class='alert alert-success'>Status pesanan berhasil diubah</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?module=pesanan'>";
    }
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Edit status pemesanan</div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3">Pilih status pesanan</label>
                        <div class="col-md-7">
                            <select name="status" class="form-control">
                                <option value="proses">proses</option>
                                <option value="selesai">selesai</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" name="ubah">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
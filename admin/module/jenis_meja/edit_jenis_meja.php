<?php
  $ambil = $koneksi->query("SELECT * FROM jenis_meja WHERE id_jenis_meja='$_GET[id_jenis_meja]'");
  $pecah = $ambil->fetch_assoc();
?>

<?php
  if (isset($_POST['simpan'])) 
  {
    $koneksi->query("UPDATE jenis_meja SET nama_jenis_meja='$_POST[jenis]' 
    WHERE id_jenis_meja='$_GET[id_jenis_meja]'");

    echo "<div class='alert alert-success'>Data jenis meja berhasil diubah</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=jenis_meja'>";
  }
?>
<div class="row">
  <div class="card col-md-12">
    <div class="card-header">
      <strong>Form Edit</strong> Jenis Meja</div>
    <div class="card-body">
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Jenis Meja :</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="jenis" value="<?php echo $pecah['nama_jenis_meja']; ?>" required>
          </div>
        </div>
    </div>
    <div class="card-footer">
      <button class="btn btn-sm btn-primary" name="simpan">
        <i class="fa fa-dot-circle-o"></i> Simpan</button>
      <button class="btn btn-sm btn-danger" type="reset">
        <i class="fa fa-ban"></i> Reset</button>
    </div>
    </form>
  </div>
</div>
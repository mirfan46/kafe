<?php
  if (isset($_POST['simpan'])) 
  {
    $koneksi->query("INSERT INTO jenis_meja (nama_jenis_meja) VALUES ('$_POST[jenis]')");

    echo "<div class='alert alert-info'>Data jenis meja berhasil tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=jenis_meja'>";
  }
?>
          <div class="row">
        	<div class="card col-md-12">
                  <div class="card-header">
                    <strong>Form Tambah</strong> Jenis Meja</div>
                  <div class="card-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Jenis Meja :</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" name="jenis" placeholder="Jensi meja" required>
                        </div>
                      </div>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-sm btn-primary" name="simpan"">
                      <i class="fa fa-dot-circle-o"></i> Simpan</button>
                    <button class="btn btn-sm btn-danger" type="reset">
                      <i class="fa fa-ban"></i> Reset</button>
                  </div>
                  </form>
                </div>
          </div>
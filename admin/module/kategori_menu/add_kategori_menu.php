<?php
  if (isset($_POST['simpan'])) 
  {
    $koneksi->query("INSERT INTO kategori_menu (nama_kategori_menu) VALUES('$_POST[nama]')");

    echo "<div class='alert alert-info'>Data kategori menu berhasil tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=kategori_menu'>";
  }
?>
          <div class="row">
        	<div class="card col-md-12">
                  <div class="card-header">
                    <strong>Form Tambah</strong> Kategori Menu</div>
                  <div class="card-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Kategori Menu :</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" name="nama" placeholder="kategori menu">
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
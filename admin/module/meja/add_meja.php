<?php
  if (isset($_POST['simpan'])) 
  {
    $koneksi->query("INSERT INTO meja (id_jenis_meja, nomer_meja) VALUES ('$_POST[jenismeja]','$_POST[nomermeja]')");

    echo "<div class='alert alert-info'>Data meja berhasil tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=meja'>";
  }
?>
          <div class="row">
        	<div class="card col-md-12">
                  <div class="card-header">
                    <strong>Form Tambah</strong> Meja</div>
                  <div class="card-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Nomer Meja :</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="number" name="nomermeja" placeholder="Nomer Meja" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="select1">Jenis Meja :</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="jenismeja">
                            <?php
                              include "../lib/koneksi.php";
                              $kueriJenisMeja= mysqli_query($koneksi, "select * from jenis_meja");
                              while($jenis=mysqli_fetch_array($kueriJenisMeja)){
                            ?>
                            <option value="<?php echo $jenis['id_jenis_meja']; ?>"><?php echo $jenis['nama_jenis_meja']; ?></option>
                            <?php } ?>
                          </select>
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
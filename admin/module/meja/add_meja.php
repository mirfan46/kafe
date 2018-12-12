<?php   

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { ?>

	<main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="container-fluid">
          <div class="row">
        	<div class="card col-md-12">
                  <div class="card-header">
                    <strong>Form Tambah</strong> Meja</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="../admin/module/meja/aksi_simpan.php" method="post" enctype="multipart/form-data">
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Nomer Meja :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="nomerMeja" type="text" name="nomerMeja" placeholder="Nomer Meja">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="select1">Jenis Meja :</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="idJenisMeja" name="idJenisMeja">
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
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="select1">Status :</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="status" name="status">
                            <option value="Ada">Ada</option>
                            <option value="Kosong">Kosong</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                      <i class="fa fa-dot-circle-o"></i> Submit</button>
                    <button class="btn btn-sm btn-danger" type="reset">
                      <i class="fa fa-ban"></i> Reset</button>
                  </div>
                  </form>
                </div>
          </div>
        </div>
    </main>
<?php } ?>
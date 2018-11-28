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
                    <strong>Form Tambah</strong> Karyawan</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="../admin/module/karyawan/aksi_simpan.php" method="post" enctype="multipart/form-data">
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Username :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="username" type="text" name="username" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Password :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Ulangi Password :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="text-input" type="password" name="text-input" placeholder="Ulangi password">
                        </div>
                      </div>
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Nama :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="select1">Pilih level :</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="level" name="level">
                            <option value="0">Please select</option>
                            <option value="Admin">Admin</option>
                            <option value="Karyawan">Karyawan</option>
                            <option value="Pemilik">Pemilik</option>
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
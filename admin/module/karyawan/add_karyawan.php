
<?php
    if (isset($_POST["simpan"])) 
    {
        
        $koneksi->query("INSERT INTO karyawan
    (username, password, nama_karyawan, level)
    VALUES('$_POST[username]','$_POST[password]','$_POST[nama]','$_POST[level]')");

    echo "<div class='alert alert-info'>Data karyawan berhasil tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=karyawan'>";

    }
?>

<div class="row">
  <div class="card col-md-12">
    <div class="card-header">
      <strong>Form Tambah</strong> Karyawan</div>
    <div class="card-body">
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Username :</label>
          <div class="col-sm-10">
            <input class="form-control" id="username" type="text" name="username" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Password :</label>
          <div class="col-sm-10">
            <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Nama :</label>
          <div class="col-sm-10">
            <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="select1">Pilih level :</label>
          <div class="col-sm-10">
            <select class="form-control" id="level" name="level">
              <option value="Karyawan">Karyawan</option>
              <option value="Pemilik">Pemilik</option>
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
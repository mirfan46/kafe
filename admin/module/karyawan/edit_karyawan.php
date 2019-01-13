<?php 
    $ambil = $koneksi->query("SELECT * FROM karyawan WHERE id_karyawan='$_GET[id_karyawan]'");
    $pecah = $ambil->fetch_assoc();

    if (isset($_POST['simpan']))
    {
            
            $koneksi->query("UPDATE karyawan SET 
            username='$_POST[username]',
            password='$_POST[password]',
            nama_karyawan='$_POST[nama]',
            level='$_POST[level]'
            WHERE id_karyawan='$_GET[id_karyawan]'");

        echo "<div class='alert alert-success'>Data karyawan berhasil diubah</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?module=karyawan'>";
    }
        
    
?>
<div class="row">
  <div class="card col-md-12">
    <div class="card-header">
      <strong>Form Edit</strong> Karyawan</div>
    <div class="card-body">
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Username :</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="username" value="<?php echo $pecah['username']; ?>">
          </div>
        </div>
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Password :</label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="password" value="<?php echo $pecah['password']; ?>">
          </div>
        </div>
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Nama :</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nama" value="<?php echo $pecah['nama_karyawan']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="select1">Pilih level :</label>
          <div class="col-sm-10">
            <select class="form-control" name="level">
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
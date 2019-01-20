<?php
  $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$_GET[id_menu]'");
  $pecah = $ambil->fetch_assoc();
?>

<?php
    if (isset($_POST['simpan']))
    {
        $namagambar = $_FILES['gambar']['name'];
        $lokasifoto = $_FILES['gambar']['tmp_name'];

        if (!empty($lokasifoto))
        {
            move_uploaded_file($lokasifoto, "upload/$namagambar");

            $koneksi->query("UPDATE menu SET 
            id_kategori_menu='$_POST[kategori]',
            nama_menu='$_POST[nama]',
            harga_menu='$_POST[harga]',
            gambar_menu='$namagambar',
            deskripsi_menu='$_POST[deskripsi]',
            status_menu='$_POST[status]'
            WHERE id_menu='$_GET[id_menu]'");
        }
        else
        {
            $koneksi->query("UPDATE menu SET 
            id_kategori_menu='$_POST[kategori]',
            nama_menu='$_POST[nama]',
            harga_menu='$_POST[harga]',
            deskripsi_menu='$_POST[deskripsi]',
            status_menu='$_POST[status]'
            WHERE id_menu='$_GET[id_menu]'");
        }
        echo "<div class='alert alert-info'>Data menu berhasil tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?module=menu'>";
    }
?>

<div class="row">
  <div class="card col-md-12">
    <div class="card-header">
      <strong>Form Edit</strong> Menu</div>
    <div class="card-body">
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Nama Menu :</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nama" value="<?php echo $pecah['nama_menu']; ?>" required>
          </div>
        </div>
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Harga Menu :</label>
          <div class="col-sm-10">
            <input class="form-control" type="number" name="harga" value="<?php echo $pecah['harga_menu']; ?>" required>
          </div>
        </div>
        <div class="form-grup">
          <img src="upload/<?php echo $pecah['gambar_menu']; ?>" width="200">
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="file-input">Ganti Gambar</label>
          <div class="col-md-10">
            <input class="form-control" type="file" name="gambar">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="select1">Kategori Menu :</label>
          <div class="col-sm-10">
            <select class="form-control" name="kategori">
              <?php
                include "../lib/koneksi.php";
                $kueriKategori= mysqli_query($koneksi, "select * from kategori_menu");
                while($kategori=mysqli_fetch_array($kueriKategori)){
              ?>
              <option value="<?php echo $kategori['id_kategori_menu']; ?>">
                <?php echo $kategori['nama_kategori_menu']; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="textarea-input">Deskripsi</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="deskripsi" rows="9" required><?php echo $pecah['deskripsi_menu']; ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="select1">Status :</label>
          <div class="col-sm-10">
            <select class="form-control" id="status" name="status">
              <option value="Ready">Ready</option>
              <option value="Kosong">Kosong</option>
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

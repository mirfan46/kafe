<?php
  if (isset($_POST['simpan'])) 
  {
    $nama = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($lokasi, "upload/".$nama);
    $koneksi->query("INSERT INTO menu
    (id_kategori_menu, nama_menu, harga_menu, gambar_menu, deskripsi_menu, status_menu)
    VALUES('$_POST[kategori]','$_POST[nama]','$_POST[harga]','$nama','$_POST[deskripsi]','$_POST[status]')");

    echo "<div class='alert alert-info'>Data menu berhasil tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?module=menu'>";
  }
?>

<div class="row">
  <div class="card col-md-12">
    <div class="card-header">
      <strong>Form Tambah</strong> Menu</div>
    <div class="card-body">
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Nama Menu :</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nama" placeholder="Nama Menu" required>
          </div>
        </div>
        <div class="form-group row justify-content-start">
          <label class="col-sm-2 col-form-label" for="text-input">Harga Menu :</label>
          <div class="col-sm-10">
            <input class="form-control" type="number" name="harga" placeholder="Harga Menu" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="file-input">Upload Gambar</label>
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
            <textarea class="form-control" name="deskripsi" rows="9" placeholder="Deskripsi..." required></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="select1">Status :</label>
          <div class="col-sm-10">
            <select class="form-control" name="status">
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
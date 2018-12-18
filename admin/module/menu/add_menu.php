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
                    <strong>Form Tambah</strong> Menu</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="../admin/module/menu/aksi_simpan.php" method="post" enctype="multipart/form-data">
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Nama Menu :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama Menu">
                        </div>
                      </div>
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Harga Menu :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="harga" type="number" name="harga" placeholder="Harga Menu">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="file-input">Upload Gambar</label>
                        <div class="col-md-10">
                          <input id="file-input" type="file" name="gambar">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="select1">Kategori Menu :</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="kategori" name="kategori">
                            <?php
                              include "../lib/koneksi.php";
                              $kueriKategori= mysqli_query($koneksi, "select * from kategori_menu");
                              while($kategori=mysqli_fetch_array($kueriKategori)){
                            ?>
                            <option value="<?php echo $kategori['id_kategori_menu']; ?>"><?php echo $kategori['nama_kategori_menu']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="textarea-input">Deskripsi</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="textarea-input" name="deskripsi" rows="9" placeholder="Deskripsi..."></textarea>
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
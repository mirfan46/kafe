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
                    <strong>Form Edit</strong> Kategori Menu</div>
                    <?php
                    include "../lib/config.php";
                    include "../lib/koneksi.php";

                    $idKategoriMenu=$_GET['id_kategori_menu'];
                    $queryEdit=mysqli_query($koneksi, "SELECT * FROM kategori_menu WHERE id_kategori_menu='$idKategoriMenu'");

                    $hasilQuery=mysqli_fetch_array($queryEdit);
                    $idKategoriMenu=$hasilQuery['id_kategori_menu'];
                    $nama=$hasilQuery['nama_kategori_menu'];
                    ?>
                  <div class="card-body">
                    <form class="form-horizontal" action="../admin/module/kategori_menu/aksi_edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_kategori_menu" value="<?php echo $idKategoriMenu; ?>">
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Kategori Menu :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="nama" type="text" name="nama" placeholder="Kategori Menu" value="<?php echo $nama; ?>">
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
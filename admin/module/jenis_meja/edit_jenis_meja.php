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
                    <strong>Form Edit</strong> Jenis Meja</div>
                    <?php
                    include "../lib/config.php";
                    include "../lib/koneksi.php";

                    $idJenisMeja=$_GET['id_jenis_meja'];
                    $queryEdit=mysqli_query($koneksi, "SELECT * FROM jenis_meja WHERE id_jenis_meja='$idJenisMeja'");

                    $hasilQuery=mysqli_fetch_array($queryEdit);
                    $idJenisMeja=$hasilQuery['id_jenis_meja'];
                    $jenis=$hasilQuery['nama_jenis_meja'];
                    ?>
                  <div class="card-body">
                    <form class="form-horizontal" action="../admin/module/jenis_meja/aksi_edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_jenis_meja" value="<?php echo $idJenisMeja; ?>">
                      <div class="form-group row justify-content-start">
                        <label class="col-sm-2 col-form-label" for="text-input">Jenis Meja :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="jenis" type="text" name="jenis" placeholder="Jensi meja" value="<?php echo $jenis; ?>">
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
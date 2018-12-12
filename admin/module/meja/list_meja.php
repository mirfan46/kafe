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
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Manajemen Meja</div>
                  <div class="card-body">
                    <div class="row justify-content-end">
                      <div class="col-sm-2">
                        <a href="<?php echo $base_url; ?>admin/dashboardadmin.php?module=add_meja">
                          <button class="btn btn-block btn-primary" type="button">Add Meja</button>
                        </a>
                        <br>
                      </div>
                    </div>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nomer Meja</th>
                          <th>Status</th>
                          <th>Jenis Meja</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php 
                      include "../lib/koneksi.php";
                      $query_meja = mysqli_query($koneksi, "SELECT * FROM meja m INNER JOIN jenis_meja jm on m.id_jenis_meja=jm.id_jenis_meja")or die(mysqli_error());
                      $nomor = 1;
                      while($meja = mysqli_fetch_array($query_meja)){
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $nomor++; ?></td>
                          <td><?php echo $meja['nomer_meja']; ?></td>
                          <td><?php echo $meja['status_meja']; ?></td>
                          <td><?php echo $meja['nama_jenis_meja']; ?></td>
                          <td>
                            <a href="<?php echo $admin_url; ?>dashboardadmin.php?module=edit_meja&id_meja=<?php echo $meja['id_meja']; ?>"
                              <span class="badge badge-warning">Edit</span>
                            </a>
                            <a href="<?php echo $admin_url; ?>module/meja/aksi_hapus.php?id_meja=<?php echo $meja['id_meja'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"
                              <span class="badge badge-danger">Delete</span>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                      <?php } ?>
                    </table>
                    <nav>
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="#">Prev</a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
      </main>
<?php } ?>
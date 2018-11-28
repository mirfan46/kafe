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
                    <i class="fa fa-align-justify"></i> Manajemen Karyawan</div>
                  <div class="card-body">
                    <div class="row justify-content-end">
                      <div class="col-sm-2">
                        <a href="<?php echo $base_url; ?>admin/dashboardadmin.php?module=add_karyawan">
                          <button class="btn btn-block btn-primary" type="button">Add Karyawan</button>
                        </a>
                        <br>
                      </div>
                    </div>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Nama</th>
                          <th>Level</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php 
                      include "../lib/koneksi.php";
                      $query_karyawan = mysqli_query($koneksi, "select * from karyawan")or die(mysqli_error());
                      $nomor = 1;
                      while($kar = mysqli_fetch_array($query_karyawan)){
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $nomor++; ?></td>
                          <td><?php echo $kar['username']; ?></td>
                          <td><?php echo $kar['password']; ?></td>
                          <td><?php echo $kar['nama_karyawan']; ?></td>
                          <td><?php echo $kar['level']; ?></td>
                          <td>
                            <a href="<?php echo $admin_url; ?>dashboardadmin.php?module=edit_karyawan&id_karyawan=<?php echo $kar['id_karyawan']; ?>"
                              <span class="badge badge-warning">Edit</span>
                            </a>
                            <a href="<?php echo $admin_url; ?>module/karyawan/aksi_hapus.php?id_karyawan=<?php echo $kar['id_karyawan'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"
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
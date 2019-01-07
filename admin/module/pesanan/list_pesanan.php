 <?php
 include "../lib/config.php";
$koneksi = new mysqli("localhost","root","","kafe");

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
                    <i class="fa fa-align-justify"></i> Manajemen Pesanan</div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pelanggan</th>
                          <th>Tanggal</th>
                          <th>Total</th>
                          <th>Status Pesanan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $nomer=1 ?>
                      <?php $ambil = $koneksi->query("SELECT * FROM pemesanan 
                        JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan"); ?>
                      <?php while($pecah = $ambil->fetch_assoc()){ ?>
                        <tr>
                          <td><?php echo $nomer; ?></td>
                          <td><?php echo $pecah['nama_pelanggan']; ?></td>
                          <td><?php echo $pecah['tanggal']; ?></td>
                          <td>Rp. <?php echo number_format($pecah['total_pesanan']); ?></td>
                          <td><?php echo $pecah['status_pesanan']; ?></td>
                          <td>
                            <a href="<?php echo $admin_url; ?>dashboardadmin.php?module=detail&id_pemesanan=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-info">Detail</a>
                          </td>
                        </tr>
                        <?php $nomer++; ?>
                        <?php } ?>
                      </tbody>
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
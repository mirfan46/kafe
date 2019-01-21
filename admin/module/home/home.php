
<!-- Selamat datang -->
<div class="col-sm-8 col-xl-12">
  <div class="card">
    <div class="card-body">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-3">Selamat Datang
            <?php echo $_SESSION["admin"]["nama_karyawan"]; ?>
          </h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <?php
    $ambil = $koneksi->query("SELECT * FROM pelanggan");
    $jumlahpelanggan = $ambil->num_rows;
  ?>
  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-primary">
      <div class="card-body pb-0">
        <div class="btn-group float-right">
          <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="icon-settings"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="index.php?module=pelanggan">Lihat</a>
          </div>
        </div>
        <div class="text-value"><?= $jumlahpelanggan; ?></div>
        <div>Pelanggan terdaftar</div>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <?php
    $ambil = $koneksi->query("SELECT * FROM pemesanan");
    $jumlahpesanan = $ambil->num_rows;
  ?>
  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-info">
      <div class="card-body pb-0">
        <div class="btn-group float-right">
          <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="icon-settings"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="index.php?module=pesanan">Lihat</a>
          </div>
        </div>
        <div class="text-value"><?= $jumlahpesanan; ?></div>
        <div>Pesanan</div>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <?php
    $ambil = $koneksi->query("SELECT * FROM menu");
    $jumlahmenu = $ambil->num_rows;
  ?>
  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-warning">
      <div class="card-body pb-0">
        <div class="btn-group float-right">
          <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="icon-settings"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="index.php?module=menu">Lihat</a>
          </div>
        </div>
        <div class="text-value"><?= $jumlahmenu; ?></div>
        <div>Menu</div>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <?php
    $ambil = $koneksi->query("SELECT * FROM meja");
    $jumlahmeja = $ambil->num_rows;
  ?>
  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-danger">
      <div class="card-body pb-0">
        <div class="btn-group float-right">
          <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="icon-settings"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="index.php?module=meja">Lihat</a>
          </div>
        </div>
        <div class="text-value"><?= $jumlahmeja; ?></div>
        <div>Meja</div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> Pesanan Baru</div>
      <div class="card-body">
        <table class="table table-responsive-sm table-bordered table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal</th>
              <th>Total</th>
              <th>No Meja</th>
              <th>Status Pesanan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $nomer=1 ?>
            <?php $ambil = $koneksi->query("SELECT * FROM pemesanan 
            JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan ORDER BY id_pemesanan DESC"); ?>
            <?php while($pecah = $ambil->fetch_assoc()){ ?>
            <tr>
              <td>
                <?php echo $nomer; ?>
              </td>
              <td>
                <?php echo $pecah['nama_pelanggan']; ?>
              </td>
              <td>
                <?php echo $pecah['tanggal']; ?>
              </td>
              <td>Rp.
                <?php echo number_format($pecah['total_pesanan']); ?>
              </td>
              <td>
                <?php echo $pecah['nomer_meja']; ?>
              </td>
              <td>
                <strong>
                  <?php echo $pecah['status_pesanan']; ?>
                </strong>
              </td>
              <td>
                <a href="index.php?module=detail_pesanan&id_pemesanan=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-info">Detail</a>
              </td>
            </tr>
            <?php $nomer++; ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- /.col-->
</div>
<!-- /.row-->
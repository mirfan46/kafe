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
              <th>No Meja</th>
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
                <span class="badge badge-info">
                  <?php echo $pecah['status_pesanan']; ?>
                </span>
              </td>
              <td>
                <a href="index.php?module=detail_pesanan&id_pemesanan=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-info">Detail</a>
                <a href="index.php?module=edit_status&id_pemesanan=<?php echo $pecah['id_pemesanan']; ?>" class="btn btn-success">Edit status</a>
                <a href="index.php?module=delete_pesanan&id_pemesanan=<?php echo $pecah['id_pemesanan'] ?>" class="btn btn-danger"onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
              </td>
            </tr>
            <?php $nomer++; ?>
            <?php } ?>
          </tbody>
        </table>


      </div>
    </div>
  </div>
</div>
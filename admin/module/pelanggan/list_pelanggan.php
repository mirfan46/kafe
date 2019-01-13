<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> Manajemen Pelanggan</div>
      <div class="card-body">
        <table class="table table-responsive-sm table-bordered table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Email</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php
          include "../lib/config.php"; 
            include "../lib/koneksi.php";
            $query_pelanggan = mysqli_query($koneksi, "select * from pelanggan")or die(mysqli_error());
            $nomor = 1;
            while($pel = mysqli_fetch_array($query_pelanggan)){
          ?>         
          <tbody>
            <tr>
              <td>
                <?php echo $nomor++; ?>
              </td>
              <td>
                <?php echo $pel['email']; ?>
              </td>
              <td>
                <?php echo $pel['nama_pelanggan']; ?>
              </td>
              <td>
                <a href="index.php?module=delete_pelanggan&id_pelanggan=<?php echo $pel['id_pelanggan'] ?>" class="btn btn-danger"
                  onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
              </td>
            </tr>
          </tbody>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
  <!-- /.col-->
</div>
<!-- /.row-->
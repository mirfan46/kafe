<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> Manajemen Karyawan</div>
      <div class="card-body">
        <div class="row justify-content-end">
          <div class="col-sm-2">
            <a href="index.php?module=add_karyawan">
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
              <td>
                <?php echo $nomor++; ?>
              </td>
              <td>
                <?php echo $kar['username']; ?>
              </td>
              <td>
                <?php echo $kar['nama_karyawan']; ?>
              </td>
              <td>
                <?php echo $kar['level']; ?>
              </td>
              <td>
                <a href="index.php?module=edit_karyawan&id_karyawan=<?php echo $kar['id_karyawan'] ?>" class="btn btn-warning">Edit</a>
                <a href="index.php?module=delete_karyawan&id_karyawan=<?php echo $kar['id_karyawan'] ?>" class="btn btn-danger" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
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
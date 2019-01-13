<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> Manajemen Kategori Menu</div>
      <div class="card-body">
        <div class="row justify-content-end">
          <div class="col-sm-2">
            <a href="index.php?module=add_kategori_menu">
              <button class="btn btn-block btn-primary" type="button">Add Kategori</button>
            </a>
            <br>
          </div>
        </div>
        <table class="table table-responsive-sm table-bordered table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori Menu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php 
            include "../lib/koneksi.php";
            $query_kategori_menu = mysqli_query($koneksi, "select * from kategori_menu")or die(mysqli_error());
            $nomor = 1;
            while($kar = mysqli_fetch_array($query_kategori_menu)){
          ?>
          <tbody>
            <tr>
              <td>
                <?php echo $nomor++; ?>
              </td>
              <td>
                <?php echo $kar['nama_kategori_menu']; ?>
              </td>
              <td>
                <a href="index.php?module=edit_kategori_menu&id_kategori_menu=<?php echo $kar['id_kategori_menu']; ?>"
                  class="btn btn-warning">Edit</a>
                <a href="index.php?module=delete_kategori_menu&id_kategori_menu=<?php echo $kar['id_kategori_menu'];?>"
                  onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
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
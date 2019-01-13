<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> Manajemen Menu</div>
      <div class="card-body">
        <div class="row justify-content-end">
          <div class="col-sm-2">
            <a href="index.php?module=add_menu">
              <button class="btn btn-block btn-primary" type="button">Add Menu</button>
            </a>
            <br>
          </div>
        </div>
        <table class="table table-responsive-sm table-bordered table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Menu</th>
              <th>Harga</th>
              <th>Gambar</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php 
            include "../lib/koneksi.php";
            $query_menu = mysqli_query($koneksi, "SELECT * FROM menu m INNER JOIN kategori_menu km on m.id_kategori_menu = km.id_kategori_menu")or die(mysqli_error());
            $nomor = 1;
            while($menu = mysqli_fetch_array($query_menu)){
          ?>
          <tbody>
            <tr>
              <td>
                <?php echo $nomor++; ?>
              </td>
              <td>
                <?php echo $menu['nama_menu']; ?>
              </td>
              <td>
                <?php echo $menu['harga_menu']; ?>
              </td>
              <td><img src="upload/<?php echo $menu['gambar_menu']; ?>" width="64" /></td>
              <td>
                <?php echo $menu['nama_kategori_menu']; ?>
              </td>
              <td>
                <?php echo $menu['deskripsi_menu']; ?>
              </td>
              <td>
                <?php echo $menu['status_menu']; ?>
              </td>
              <td>
                <a href="index.php?module=edit_menu&id_menu=<?php echo $menu['id_menu']; ?>" class="btn btn-warning">Edit</a>
                <a href="index.php?module=delete_menu&id_menu=<?php echo $menu['id_menu'];?>"
                  onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Delete
                </a>
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
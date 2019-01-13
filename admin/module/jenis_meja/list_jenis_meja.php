
          <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Manajemen Kategori Jenis Meja</div>
                  <div class="card-body">
                    <div class="row justify-content-end">
                      <div class="col-sm-2">
                        <a href="index.php?module=add_jenis_meja">
                          <button class="btn btn-block btn-primary" type="button">Add Jenis</button>
                        </a>
                        <br>
                      </div>
                    </div>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Meja</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php 
                      include "../lib/koneksi.php";
                      $query_jenis_meja = mysqli_query($koneksi, "select * from jenis_meja")or die(mysqli_error());
                      $nomor = 1;
                      while($kar = mysqli_fetch_array($query_jenis_meja)){
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $nomor++; ?></td>
                          <td><?php echo $kar[1]; ?></td>
                          <td>
                            <a href="index.php?module=edit_jenis_meja&id_jenis_meja=<?php echo $kar['id_jenis_meja']; ?> " class="btn btn-warning">Edit</a>
                            <a href="index.php?module=delete_jenis_meja&id_jenis_meja=<?php echo $kar['id_jenis_meja'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Delete</a>
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
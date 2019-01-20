
          <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Manajemen Meja</div>
                  <div class="card-body">
                    <div class="row justify-content-end">
                      <div class="col-sm-2">
                        <a href="index.php?module=add_meja">
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
                            <a href="index.php?module=edit_meja&id_meja=<?php echo $meja['id_meja']; ?>" class="btn btn-warning">Edit</a>
                            <a href="index.php?module=delete_meja&id_meja=<?php echo $meja['id_meja'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Delete</a>
                            <a href="index.php?module=kosongkan_meja&id_meja=<?php echo $meja['id_meja']; ?>" onClick="return confirm('Andat yakin ingin kosongkan meja ini')" class="btn btn-secondary">Kosongkan</a>
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
<style>
    @media print {
        .form-cari, .card-header, .alert {
            display: none;
        }
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Manajemen Pesanan</div>
            <div class="card-body">
                <form action="" method="post" class="form-cari">
                    <input type="text" name="keyword" placeholder="masukkan keyword pencarian..." autocomplete="off" size="40">
                    <button type="submit" name="cari" class="btn btn-secondary">Cari</button>
                </form>
                <div class="alert alert-info">
                    <p>
                    Untuk cetak laporan silahkan print dengan "CTRL+P"
                    </p>
                </div>
                <h3>Laporan Pemesanan</h3>
                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No pesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Status Pesanan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomer=1 ?>
                        <?php 
                        if(isset($_POST['cari']))
                        {
                            $cari = $_POST['keyword'];
                            $ambil = $koneksi->query("SELECT * FROM pemesanan 
                            JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan
                            WHERE nama_pelanggan LIKE '%$cari%' OR
                                id_pemesanan LIKE '%$cari%' OR
                                tanggal LIKE '%$cari%' OR
                                status_pesanan LIKE '%$cari%' OR
                                total_pesanan LIKE '%$cari%'");
                        }else {
                            $ambil = $koneksi->query("SELECT * FROM pemesanan 
                            JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan");
                        }
                        
                        while($pecah = mysqli_fetch_array($ambil)){

                        ?>
                        <tr>
                            <td>
                                <?php echo $nomer; ?>
                            </td>
                            <td>
                                <?php echo $pecah['id_pemesanan']; ?>
                            </td>
                            <td>
                                <?php echo $pecah['nama_pelanggan']; ?>
                            </td>
                            <td>
                                <?php echo $pecah['tanggal']; ?>
                            </td>
                            <td>
                                <?php echo $pecah['status_pesanan']; ?>
                            </td>
                            <td>
                                Rp. <?php echo number_format($pecah['total_pesanan']); ?>
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
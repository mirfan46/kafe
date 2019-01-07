
<?php
include "../lib/koneksi.php";


    $ambil = $koneksi->query("SELECT * FROM pemesanan JOIN pelanggan
    ON pemesanan.id_pelanggan=pelanggan.id_pelanggan
    WHERE pemesanan.id_pemesanan='$_GET[id_pemesanan]'");
    $detail = $ambil->fetch_assoc();
?>

<main class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Detail Pemesanan</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Pemesanan</h3>
                                <strong>No. pemesanan : <?php echo $detail['id_pemesanan']; ?></strong><br>
                                Tanggal pesanan : <?php echo $detail['tanggal']; ?> <br>
                                Status pesanan : <?php echo $detail['status_pesanan']; ?> <br>
                                Total pesanan : Rp. <?php echo number_format($detail['total_pesanan']); ?>
                            </div>
                            <div class="col-md-4">
                                <h3>Pelanggan</h3>
                                <strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong>
                            </div>
                            <div class="col-md-4">
                                <h3>Meja</h3>
                                <strong>Nomer meja : <?php echo $detail['nomer_meja']; ?></strong>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>menu</th>
                                    <th>harga</th>
                                    <th>jumlah</th>
                                    <th>subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $nomer=1; ?>
                            <?php $ambil = $koneksi->query("SELECT * FROM detail_pemesanan
                            WHERE id_pemesanan='$_GET[id_pemesanan]'"); ?>
                            <?php while($pecah = $ambil->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $nomer; ?></td>
                                    <td><?php  echo $pecah['nama']; ?></td>
                                    <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                                    <td><?php echo $pecah['jumlah']; ?></td>
                                    <td>
                                        Rp. <?php echo number_format($pecah['subtotal']); ?>
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
    </div>
</main>
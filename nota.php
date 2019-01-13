<?php
session_start();
include "lib/koneksi.php";

$ambil = $koneksi->query("SELECT * FROM pemesanan JOIN pelanggan
    ON pemesanan.id_pelanggan=pelanggan.id_pelanggan
    WHERE pemesanan.id_pemesanan='$_GET[id_pemesanan]'");
    $detail = $ambil->fetch_assoc();

?>
    
<?php
    //mengamankan nota agar tidak bisa melihat nota orang lain
    //mendapat id_pelanggan yang pesan
    $idpelangganyangpesan = $detail["id_pelanggan"];

    //mendapat id_pelanggan yang login
    $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

    if ($idpelangganyangpesan !== $idpelangganyanglogin) 
    {
        echo "<script>alert('jangan nakal');</script>";
        echo "<script>location='riwayat.php';</script>";
        exit();    
    }
?>

<!DOCTYPE html>
<html>
	<!-- head -->
	<?php include "template/head.php"; ?>
	<body>
		<!-- header -->
		<?php include "template/header.php"; ?>

		<!-- banner -->
		<?php include "template/banner.php"; ?>

        <!-- nota -->
        <section class="konten">
            <div class="container">
                <h2>Detail Pemesanan</h2>
                <br>
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

                        <div class="row">
                            <div class="col-md-7">
                                <div class="alert alert-info">
                                    <p>
                                        Silahkan melakukan pembayaran sebesar Rp. <?php echo number_format($detail['total_pesanan']); ?> di Kasir...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>
            </div>
        </section>
        <!-- footer -->
        <?php include "template/footer.php"; ?>

        <!-- javascript -->
        <?php include "template/js.php"; ?>

	</body>
</html>
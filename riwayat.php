<?php
    session_start();
    include 'lib/koneksi.php';

    //jika tidak ada session pelanggan(belum login)
    if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
    {
        echo "<script>alert('silahkan login');</script>";
        echo "<script>location='login.php';</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>

    <title>Riwayat Pesanan</title>
    <!-- head -->
	<?php include "template/head.php"; ?>
</head>
<body>
    <!-- header -->
	<?php include "template/header.php"; ?>

	<!-- banner -->
	<?php include "template/banner.php"; ?>

    <!-- riwayat pelanggan -->
    <section class="riwayat">
        <div class="container">
            <h3>Riwayat pesanan <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $nomer=1;
                    //mendapatkan id_pelanggan dari session
                    $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

                    $ambil = $koneksi->query("SELECT * FROM pemesanan WHERE id_pelanggan='$id_pelanggan'");
                    while($pecah = $ambil->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $nomer; ?></td>
                        <td><?php echo $pecah["tanggal"] ?></td>
                        <td><?php echo $pecah["status_pesanan"] ?></td>
                        <td>Rp. <?php echo number_format($pecah["total_pesanan"]) ?></td>
                        <td>
                            <a href="nota.php?id_pemesanan=<?php echo $pecah["id_pemesanan"] ?>" class="btn btn-primary">Nota</a>
                        </td>
                    </tr>
                    <?php $nomer++; ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- footer -->
	<?php include "template/footer.php"; ?>

	<!-- javascript -->
	<?php include "template/js.php"; ?>
    
</body>
</html>
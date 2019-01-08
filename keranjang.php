<?php
session_start();

include "lib/koneksi.php";

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
    echo "<script>alert('keranjang kosong, silahkan pesan dulu');</script>";
    echo "<script>location='index.php';</script>";
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

		<!-- main -->

<section class="konten">
	<div class="container">
		<h1>Pesanan Anda</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>no</td>
                        <td>menu</td>
                        <td>harga</td>
                        <td>jumlah</td>
                        <td>sub haraga</td>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $nomer=1; ?>
                <?php foreach ($_SESSION["keranjang"] as $id_menu => $jumlah): ?>
                <!-- menampilkan produk yg sedang diperulangkan berdasarkan id_menu -->
                <?php
                $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$id_menu'");
                $pecah = $ambil->fetch_assoc();
                $sub_harga = $pecah['harga_menu']*$jumlah;
                ?>
                    <tr>
                        <td><?php echo $nomer; ?></td>
                        <td><?php echo $pecah['nama_menu']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga_menu']); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td><?php echo number_format($sub_harga); ?></td>
                        <th>
                            <a href="hapuskeranjang.php?id=<?php echo $id_menu ?>" class="btn btn-danger btn-xs">hapus</a>
                        </th>
                    </tr>
                <?php $nomer++; ?>
                <?php   endforeach ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-default">Lanjut Pesan</a>
            <a href="checkout.php" class="btn btn-primary">Proses Pesan</a>
	</div>
</section>

		<!-- footer -->
		<?php include "template/footer.php"; ?>

		<!-- javascript -->
		<?php include "template/js.php"; ?>

	</body>
</html>
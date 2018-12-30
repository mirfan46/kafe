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
		<?php
session_start();
$koneksi = new mysqli("localhost","root","","kafe");

?>

<!-- konten -->
<section class="konten">
	<div class="container">
		<h1>Silahkan pilih menu anda</h1>

		<div class="row">

			<?php $ambil = $koneksi->query("SELECT * FROM menu"); ?>
			<?php while($permenu = $ambil->fetch_assoc()){ ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="admin/upload/<?php echo $permenu['gambar_menu']; ?>">
					<div class="caption">
						<h3><?php echo $permenu['nama_menu']; ?></h3>
						<h5>Rp. <?php echo number_format($permenu['harga_menu']); ?></h5>
						<h6>Stok <?php echo $permenu['status_menu']; ?></h6>
						<a href="pesan.php?id=<?php echo $permenu['id_menu']; ?>" class="btn btn-primary">Pesan</a>
					</div>
				</div>
			</div>
			<?php } ?>
	</div>
</section>

		<!-- footer -->
		<?php include "template/footer.php"; ?>

		<!-- javascript -->
		<?php include "template/js.php"; ?>

	</body>
</html>
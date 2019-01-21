<?php
session_start();
include "lib/koneksi.php";

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

<!-- konten -->
<section class="konten">
	<div class="container">
		<h1>Silahkan pilih menu anda</h1><br>

		<div class="row">

			<?php $ambil = $koneksi->query("SELECT * FROM menu"); ?>
			<?php while($permenu = $ambil->fetch_assoc()){ ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="admin/upload/<?php echo $permenu['gambar_menu']; ?>" class="img-thumbnail" width="200">
					<div class="caption">
						<h3><?php echo $permenu['nama_menu']; ?></h3>
						<h5>Rp. <?php echo number_format($permenu['harga_menu']); ?></h5>
						<h6>Stok <?php echo $permenu['status_menu']; ?></h6>
						<?php
						$kosong = "Kosong";
						if ($permenu['status_menu'] == $kosong) {
						$disable="btn btn-danger disabled";
						}else{
						$disable="btn btn-primary ";
						}
						?>
						<a href="pesan.php?id=<?php echo $permenu['id_menu']; ?>" class="<?php echo $disable;?>">Pesan</a>
						<a href="detail.php?id=<?php echo $permenu['id_menu']; ?>" class="<?php echo $disable;?>">Detail</a>
					</div>
				</div>
				<br>
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
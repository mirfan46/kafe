<?php
    session_start();
	include "lib/koneksi.php";
	
	if (!isset($_SESSION["pelanggan"]))
	{
		echo "<script>alert('silahkan login dulu');</script>";
    	echo "<script>location='login.php';</script>";
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

        <!-- checkout -->
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
                    </tr>
                </thead>
                <tbody>
                <?php $nomer=1; ?>
				<?php $totalpesanan=0; ?>
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
                    </tr>
                <?php $nomer++; ?>
				<?php $totalpesanan+=$sub_harga; ?>
                <?php   endforeach ?>
                </tbody>
				<tfoot>
					<tr>
						<td colspan="4">Total Pesanan</td>
						<td>Rp. <?php echo number_format($totalpesanan); ?></td>
					</tr>
				</tfoot>
            </table>

			<form method="post">
				<div class="row">
					<div class="col-md-6">
						<input class="form-control" type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>">
					</div>
					<div class="col-md-6">
						<select name="id_meja" class="form-control">
							<option value="">Pilih Meja</option>
							<?php
							$ambil = $koneksi->query("SELECT * FROM meja WHERE status_meja='kosong'");
							while($pilihmeja = $ambil->fetch_assoc()){
							?>
							<option value="<?php echo $pilihmeja['id_meja'] ?>">
								Meja <?php echo $pilihmeja['nomer_meja'] ?> -
								<?php echo $pilihmeja['status_meja'] ?>
							</option>
							<?php } ?>
						</select>
					</div>
				</div>
				<br>
				<button class="btn btn-primary" name="checkout">Checkout</button>
			</form>

			<?php
			if (isset($_POST["checkout"])) 
			{
				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
				$id_meja = $_POST["id_meja"];
				$tanggal_pesan = date("Y-m-d");
				$status = "pending";
				$totalpemesanan = $totalpesanan;
				$ambil = $koneksi->query("SELECT * FROM meja WHERE id_meja='$id_meja'");
				$arraymeja = $ambil->fetch_assoc();
				$nomermeja = $arraymeja['nomer_meja'];
				$status_meja = "Terisi";

				
				//1. menyimpan data ke tabel pemesanan
				$koneksi->query("INSERT INTO pemesanan (id_pelanggan, id_meja, tanggal, status_pesanan, total_pesanan, nomer_meja)
								VALUES ('$id_pelanggan','$id_meja','$tanggal_pesan','$status','$totalpemesanan','$nomermeja')");

				//mendapatkan id_pemesanan yang barusan terjadi
				$id_pemesanan_barusan = $koneksi->insert_id;

				foreach ($_SESSION["keranjang"] as $id_menu => $jumlah) 
				{

					//mendapatkan data menu berdasarkan id menu
					$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
					$permenu = $ambil->fetch_assoc();

					$nama = $permenu['nama_menu'];
					$harga = $permenu['harga_menu'];
					$subtotal = $permenu['harga_menu']*$jumlah;

					$koneksi->query("INSERT INTO detail_pemesanan (id_pemesanan, id_menu, nama, harga, subtotal, jumlah) 
									VALUES ('$id_pemesanan_barusan','$id_menu','$nama','$harga','$subtotal','$jumlah')");
				}
				
				//mengubah status meja
				$koneksi->query("UPDATE meja SET status_meja='$status_meja' WHERE id_meja='$id_meja'");

				//mengkosongkan keranjang belanja
				unset($_SESSION["keranjang"]);

				//tampilkan nota pemesanan
				echo "<script>alert('pemesanan sukses');</script>";
				echo "<script>location='nota.php?id_pemesanan=$id_pemesanan_barusan';</script>";
			}
				
			?>

	</div>
</section>


        <!-- footer -->
		<?php include "template/footer.php"; ?>

		<!-- javascript -->
		<?php include "template/js.php"; ?>
    
</body>
</html>
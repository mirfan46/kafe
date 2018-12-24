<!-- Start menu Area -->
<section class="menu-area section-gap" id="coffee">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">What kind of Coffee we serve for you</h1>
					<p>Who are in extremely love with eco friendly system.</p>
				</div>
			</div>
		</div>						
		<div class="row">
			<?php
			include "lib/koneksi.php";
			include "lib/config.php";
			$menu = mysqli_query($koneksi, "SELECT * FROM menu");
			while($listmenu=mysqli_fetch_array($menu)){
				?>
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4><?php echo $listmenu['nama_menu']; ?></h4>
							<p class="price float-right">
								Rp.<?php echo $listmenu['harga_menu']; ?>
							</p>
						</div>
						<img src="admin/upload/<?php echo $listmenu['gambar_menu']; ?>" alt="gambar menu" class="img-responsive" width="300" height="200">
						<div class="stok">
							<p class="font-weight-bold">Stok : <?php echo $listmenu['status_menu']; ?></p>
						</div>
						<form method="post" action="order.php?action=add&id=<?php echo $listmenu["id_menu"]; ?>">
							<input type="number" name="quantity" placeholder="masukkan jumlah pesanan" class="form-control" />
							<input type="hidden" name="hidden_name" value="<?php echo $listmenu["nama_menu"]; ?>" />
							<input type="hidden" name="hidden_price" value="<?php echo $listmenu["harga_menu"]; ?>" />
							<input type="submit" name="add_to_cart" class="btn btn-warning btn-block" value="Pesan" />
						</form>								
					</div>
				</div>
			<?php } ?>											
		</div>

		<!-- End menu Area -->
	</div>	
</section>
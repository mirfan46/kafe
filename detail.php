<?php
session_start();
?>

<?php
include "lib/koneksi.php";

//mendapatkan id_menu dari url
$id_menu = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
$detail = $ambil->fetch_assoc();

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

        <!-- detail menu -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="admin/upload/<?php echo $detail["gambar_menu"]; ?>" alt="" class="img-embed-responsive">
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo $detail["nama_menu"]; ?></h2>
                        <h4>Rp. <?php echo number_format($detail["harga_menu"]); ?></h4>
                        <h5>Status : <?php echo $detail["status_menu"]; ?></h5>

                        <form method="post">
                            <div class="form-group">
                                <input type="number" min="1" class="form-control" name="jumlah">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="pesan">Pesan</button>
                                </div>
                            </div>
                        </form>

                        <?php
                            if (isset($_POST["pesan"])) 
                            {
                                //mendapatkan jumlah yang diinputkan
                                $jumlah = $_POST["jumlah"];

                                //masukkan dikeranjang belanaja
                                $_SESSION["keranjang"][$id_menu] = $jumlah;
                                echo "<script>alert('produk telah ditambahkan dikeranjang');</script>";
                                echo "<script>location='keranjang.php';</script>";
                            }
                        ?>

                        <p><?php echo $detail["deskripsi_menu"]; ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer -->
		<?php include "template/footer.php"; ?>

		<!-- javascript -->
		<?php include "template/js.php"; ?>

	</body>
</html>
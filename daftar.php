<?php
    include 'lib/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <!-- head -->
	<?php include "template/head.php"; ?>
</head>
<body>
    <!-- header -->
		<?php include "template/header.php"; ?>

	<!-- banner -->
	<?php include "template/banner.php"; ?>

    <!-- daftar pelanggan -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card-panel">
                    <h2 class="card-title">Daftar Pelanggan</h2>
                    <div class="card-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7">
                                    <button class="btn btn-primary" name="daftar">Daftar</button>
                                </div>
                            </div>
                        </form>
                        <?php
                            if (isset($_POST["daftar"])) 
                            {
                                //mengambil inputan text dari form
                                $nama = $_POST["nama"];
                                $email = $_POST["email"];
                                $password = $_POST["password"];

                                //cek apakah email sudah digunakan
                                $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email'");
                                $yangcocok = $ambil->num_rows;

                                if ($yangcocok==1) 
                                {
                                    echo "<script>alert('email sudah digunakan');</script>";
                                    echo "<script>location='daftar.php';</script>";
                                }
                                else 
                                {
                                    //query insert ke tabel pelanggan
                                    $koneksi->query("INSERT INTO pelanggan (email, password, nama_pelanggan)
                                    VALUES ('$email','$password','$nama')");

                                    echo "<script>alert('Selamat pendaftaran sukses, silahkan login');</script>";
                                    echo "<script>location='login.php';</script>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
	<?php include "template/footer.php"; ?>

	<!-- javascript -->
	<?php include "template/js.php"; ?>
</body>
</html>
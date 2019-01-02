<?php
    session_start();
    $koneksi = new mysqli("localhost","root","","kafe");
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

        <!-- login -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1>Login Pelanggan</h1>
                        </div>
                        <div class="panel-body">
                            <form method="post">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <button class="btn btn-primary" name="login">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            //jika tombol login ditekan
            if (isset($_POST["login"]))
            {
                $email = $_POST["email"];
                $pass = $_POST["password"];
                //melakukan query ngecek di database tabel pelanggan
                $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email' AND password='$pass'");

                //ngitung akun yang terambil
                $akunyangcocok = $ambil->num_rows;

                //jika 1 akun yang cocok maka di loginkan
                if ($akunyangcocok==1)
                {
                    //anda sukses login
                    //mendapatkan akun dalam bentuk array
                    $akun =$ambil->fetch_assoc();
                    $_SESSION["pelanggan"] = $akun;
                    echo"<script>alert('anda sukses login');</script>";
                    echo"<script>location='checkout.php';</script>";
                }
                else {
                    //gagal login
                    echo"<script>alert('anda gagal login, silahkan ulangi lagi');</script>";
                    echo"<script>location='login.php';</script>";
                }
            }

        ?>

        <!-- footer -->
		<?php include "template/footer.php"; ?>

<!-- javascript -->
<?php include "template/js.php"; ?>

</body>
</html>
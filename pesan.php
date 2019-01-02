<?php
session_start();
// mendapatkan id produk dari url
$id_menu = $_GET['id'];

//jika ada produk itu dikeranjang maka akan bertambah 1
if (isset($_SESSION['keranjang'][$id_menu]))
{
    $_SESSION['keranjang'][$id_menu]+=1;
}

//jika belum ada produk dikeranjang maka akan menjadi 1
else
{
    $_SESSION['keranjang'][$id_menu] = 1;
}

//lari ke halaman keranjang
echo "<script>alert('produk telah masuk ke keranjang pesanan');</script>";
echo "<script>location='keranjang.php';</script>";
?>
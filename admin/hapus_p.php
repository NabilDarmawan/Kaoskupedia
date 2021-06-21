<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_produk = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM tb_produk WHERE id_produk='$id_produk'");
 
// mengalihkan halaman kembali ke 
header("location: list_produk.php");
?>

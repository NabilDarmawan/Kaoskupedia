<?php 
// koneksi database
include '../koneksi.php';


// menangkap data yang di kirim dari form
$id =$_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
 
// update data ke database
$save = mysqli_query($con,"UPDATE tb_user SET nama='$nama', alamat='$alamat', no_telp='$no_telp', email='$email' WHERE id='$id'");
 if($save){   
    header("location:../masuk.php");
 }
  echo "Gagal insert data";
// mengalihkan halaman kembali ke 6.index.php
     

?>
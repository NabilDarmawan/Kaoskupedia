<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($con,"SELECT * FROM tb_admin WHERE email='$email' and password='$password'");


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
    $data_admin = mysqli_fetch_assoc($data);
    $_SESSION['id'] = $data_admin['id'];
    $_SESSION['nama'] = $data_admin['nama'];
    $_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	header("location: admin/menu.php");
}else{
	$data = mysqli_query($con,"SELECT * FROM tb_user WHERE email='$email' and password='$password'");
    $cek = mysqli_num_rows($data);
    if($cek > 0){
        $data_user = mysqli_fetch_assoc($data);
        $_SESSION['id'] =  $data_user['id'];
        $_SESSION['nama'] = $data_user['nama'];
        $_SESSION['alamat'] = $data_user['alamat'];
        $_SESSION['no_telp'] = $data_user['no_telp'];
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
        header("location: user/menu.php");
    }else{
        header("location:masuk.php?pesan=gagal");
    }
}
?>
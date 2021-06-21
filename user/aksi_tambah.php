<?php include '../koneksi.php'; 
    //menyimpan data kedalam variable
    $text = "Dijual";
    $id =$_POST['id'];
    $nama_produk= $_POST['nama_produk'];
    $harga_produk=$_POST['harga_produk'];
    $ukuran_produk=$_POST['ukuran_produk'];

    $rand = rand();
    $filename = $_FILES['foto_produk']['name'];
    $filename = $rand.'_'. $filename;
    $file_tmp = $_FILES['foto_produk']['tmp_name'];

    //memindahkan kedalam folder
    $folder = '../files/';

    move_uploaded_file($file_tmp, $folder.$filename);
    //perintah insert ke data base
    $save=mysqli_query($con, "INSERT INTO tb_produk (id_produk, id, nama_produk, foto_produk, harga_produk, ukuran_produk, deskripsi_produk)
            values ('','$id', '$nama_produk','$filename','$harga_produk','$ukuran_produk','$text')"); 
    
   
    //Kondisi apakah berhasil atau tidak
      if ($save) {
        header("location:menu.php?alert=berhasil");
        exit;
      }
    else {
        echo "Gagal insert data";
        exit;
    }  
?>
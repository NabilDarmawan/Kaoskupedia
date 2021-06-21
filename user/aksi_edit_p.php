<?php include '../koneksi.php'; 
    //menyimpan data kedalam variable
    $id_produk =$_POST['id_produk'];
    $nama_produk= $_POST['nama_produk'];
    $harga_produk=$_POST['harga_produk'];
    $ukuran_produk=$_POST['ukuran_produk'];
    $deskripsi_produk=$_POST['deskripsi_produk'];

    //$rand = rand();
    //$filename = $_FILES['foto_produk']['name'];
    //$filename = $rand.'_'. $filename;
    //$file_tmp = $_FILES['foto_produk']['tmp_name'];

    //memindahkan kedalam folder
    //$folder = '../files/';


    move_uploaded_file($file_tmp, $folder.$filename);
    //perintah insert ke data base

    $save=mysqli_query($con,"UPDATE tb_produk SET nama_produk='$nama_produk',  harga_produk='$harga_produk',  
    ukuran_produk='$ukuran_produk', deskripsi_produk='$deskripsi_produk' WHERE tb_produk.id_produk ='$id_produk' ");
   
    //Kondisi apakah berhasil atau tidak
      if ($save) {
        header("location:list_produk.php?alert=berhasil");
        exit;
      }
    else {
        echo "Gagal insert data";
        exit;
    }  
?>
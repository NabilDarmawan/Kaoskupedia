<?php
error_reporting(0); //abaikan error pada browser
//panggil file koneksi.php yang sudah anda buat
include "../koneksi.php";
		session_start();
		if($_SESSION['status']!="login"){
			header("location:../masuk.php?pesan=belum_login");
		}
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- fotawesome -->
    <link rel="stylesheet" type="text/css" href="../alat/fontawesome-free-5.15.3-web/css/all.min.css">
    <!-- CSS -->
    <link href="../alat/style.css" rel="stylesheet" type="text/css">
    <style>
    .text-2{
      text-align: right;
      font-size: 60px;
      font-weight: bold;
      font-family: Arial;
    }
    img {
        width: 100px;
        height: 200px;
    }
    </style>
    <title>Kaoskupedia</title>
  </head>
  <body>
   <!--  navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container-fluid ">
        <!--  pencarian -->
          <form class="form-inline"  action="aksi_cari_menu.php" method="GET" >
            <a class="navbar-brand fw-bold fs-3">Kaoskupedia</a>
            <input type="text-1" name="cari" placeholder="...klik pilih ukuran..." >
        </form>
        <p class="icon"><i class=" fa fa-search text-white ml-2 mt-3"></i></p>
         <!--  pencarian -->
       <a class="text-light fs-5 ms-auto" >Selamat Datang, <?php echo $_SESSION['nama']; ?></a>
       <a type="button"  data-toggle="modal" data-target="#myModal"><i class="fa-2x fas fa-user-circle text-white ml-3"></i></a>
        </div>
    </div>
    </nav> <!-- navbar -->
    <!-- popup -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
       
          
        <!-- Profil-->
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
            <div class="modal-body">
              <div class="card-header bg-dark">
                <p class="fw-bold text-center text-white">PROFIL ANDA</p>
              </div>
                <form  method="POST" action="ubah_profil.php" class="mt-4 ">
                  <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="id">
                  <div class="form-group mt-4">
                    <label >Nama</label>
                    <input type="text" name="nama" class="form-control"  value="<?php echo $_SESSION['nama']; ?>">
                  </div>
                  <div class="form-gruop mt-4">
                    <label >Alamat</label>
                    <input type="text" name="alamat" class="form-control"  value="<?php echo $_SESSION['alamat']; ?>" >
                  </div>
                  <div class="form-gruop mt-4">
                    <label >No. Telepun</label>
                    <input type="text" name="no_telp" class="form-control"  value="<?php echo $_SESSION['no_telp']; ?>">
                  </div>
                  <div class="form-gruop mt-4">
                    <label >Email</label>
                    <input type="email" name="email" class="form-control"  value="<?php echo $_SESSION['email']; ?>">
                  </div>
                  <br>
                    <button type="submit" name="ubah" class="btn btn-danger">UBAH</button></br></br>
                    <em>klik ubah untuk menyimpan perubahan</em>
                   
                </form>
                  
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </div> <!-- Profil-->
                
      </div>
    </div> <!-- popup -->
  


    <div class="row no-gutters mt-5"><!-- menu -->
       <!-- main menu -->
       <div class=" col-md-2 bg-dark" >
      <div class="fixed-top col-md-2 mt-5">
        <ul class="nav flex-column ml-3 mb-5 mt-5">
            <div> <!-- Profil-->
                <center>
                <a  type="button"  data-toggle="modal" data-target="#myModal" ><i class="fa-9x fas fa-user-circle text-white mt-4"></i></a></br></br>
             
                <a class="text-light fs-5 text-center" ><?php echo $_SESSION['nama']; ?></a><br>
                <a class="text-light fs-5 text-center " ><?php echo $_SESSION['email']; ?> </a>
                </center>
                </br> </br>
            </div><!-- Profil-->
        <!-- bar-->
            <li class="nav-item">
              <a class="nav-link active text-white" href="menu.php"><i class="fas fa-home mr-2"></i> Menu</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="list_produk.php"><i class="fas fa-store-alt mr-2"></i></i>Produk Saya</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="keluar.php"><i class="fas fa-sign-out-alt mr-2"></i>Keluar</a><hr class="bg-secondary">
            </li>
        </ul>
        <!-- bar--> 
      </div>
       
      </div> <!-- main menu -->
     

      <!-- tampilan utama -->
      <div class="col-md-10  mt-3">
        <div class="channel">
          </br ></br>
          <p class="text-2 text-secondary mr-5" >SELAMAT <br> DATANG DI <br> KAOSKUPEDIA</p>
        </div>
        <div class="tampilan">
          </br>
          <a type="button"  class=" btn tombol text-light mr-4"  href="tambah_produk.php">+ Tambah Produk</a>
          <hr width="86%"> 
        </div>
        <!-- tampilan Poduk -->
        <?php
            $cari = $_GET['cari'];
            $produk = mysqli_query($con, "SELECT tb_produk.nama_produk, tb_produk.foto_produk, tb_produk.harga_produk, tb_produk.ukuran_produk, tb_produk.deskripsi_produk, tb_user.no_telp FROM tb_produk JOIN tb_user ON tb_produk.id = tb_user.id and ukuran_produk = '$cari'");
            while($hasil = mysqli_fetch_array($produk)){
        ?>
        <div class="container-fluid ml-3">
          <div class="row text-center " style="float: left;">
            <div class="card" style="width: 15rem; margin: 40px;">
                <img src="../files/<?php echo $hasil['foto_produk']; ?>" class="card-img-top" >
                <h5 class="card-title text-body"><?php echo $hasil['nama_produk'];?></h5>
                <div>
                  <span class="text-secondary "><?php echo $hasil['ukuran_produk']?></span>
                  <span class="text-info"><?php echo $hasil['deskripsi_produk']?></span>
                </div>
                  <div class="card-header bg-dark">
                    <div class="form-inline " >
                      <a class="ml-4" href="https://wa.me/<?php echo $hasil['no_telp']?>?text=Isi Pesan ">BELI</i></a>
                      <span class="badge badge-info ml-5"><?php echo $hasil['harga_produk'];?></span> 
                    </div>
                  </div>
            </div>
          </div>
        </div>
      <?php } ?><!-- tampilan uproduk -->
      </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
      </div> <!-- tampilan utama -->
  
    </div><!-- menu -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>
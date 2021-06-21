<?php
session_start();
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
    <link href="alat/style.css" rel="stylesheet" type="text/css">
    <style>
    .container{
      width: 30%;
    }
    </style>
    <title>Kaoskupedia</title>
  </head>
  <body>
    <!-- membuat navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3">Kaoskupedia</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav text-center fs-5 ms-auto">
            <li class="nav-item">
            <a class="nav-link text-light" href="masuk.php">Masuk</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-danger" href="daftar.php">Daftar</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="jumbotron mt-5">
       <div class="container" id="boxlogin">
       <h4 class="text-center">MASUK KAOSKUPEDIA</h4>
       <hr>
         <!-- cek pesan notifikasi -->
         <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "Login gagal! email dan password salah!";
            }else if($_GET['pesan'] == "logout"){
                echo "Anda telah berhasil logout";
            }else if($_GET['pesan'] == "belum_login"){
                echo "Anda harus login untuk mengakses halaman admin";
            }
        }
        ?>
        <br/>
        <!--membuat form login dengan method post kemudian aksi di lanjutkan
        ke cek_login.php-->
       <form  method="POST" action="cek_login.php">
        <div class="form-gruop">
                <label >Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukan email Anda">
        </div>
        <div class="form-gruop">
                <label >Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan Kata Sandi Anda">
        </div>
        <br>
        <button type="submit" class="btn btn-danger">MASUK</button>
        <button type="reset" class="btn btn-dark">BATAL</button>
       </form>
       </div>
    </div>
     <!-- FOOTER -->
    <footer class="bg-light text-center text-lg-start">
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);" >
        © 2021 Kaoskupedia
        <a class="text-dark" >by: 19082010106-19082010117</a>
      </div>
    </footer>
    

    

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
<?php
error_reporting(0); //abaikan error pada browser
//panggil file koneksi.php yang sudah anda buat
include "koneksi.php";
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
    <title>Kaoskupedia</title>
    <style>
    .container{
      width: 30%;
    }
    </style>
  </head>
  <body>
    <?php
    $nama= mysqli_real_escape_string($con, $_POST['nama']); //varibel field nama
    $alamat= mysqli_real_escape_string($con, $_POST['alamat']);//varibel field alamat
    $no_telp= mysqli_real_escape_string($con, $_POST['no_telp']); //varibel field no_telp
    $email= mysqli_real_escape_string($con, $_POST['email']);//varibel field email
    $password= mysqli_real_escape_string($con, $_POST['password']);//varibel field password
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        //validasi nama
        if(empty($nama))//validasi nama
        {
            $error_nama = "Nama tidak boleh kosong";
        }
        elseif(!preg_match("/^[a-zA-Z ]*$/", $nama)) //validasi nama
        {
            $nameErr = "Inputan hanya boleh huruf dan spasi";
        }  
        elseif(empty($alamat)) //validasi alamat
        {
            $error_alamat = "Alamat tidak boleh kosong";
        }
        elseif(empty($no_telp)) //validasi no_telp
        {
            $error_no_telp = "Tidak boleh kosong";
        }
        elseif(!is_numeric($no_telp)) //validasi no_telp
        {
            $error_no_telp = "Hanya boleh angka";
        }
        elseif(empty($email))//validasi email
        {
            $error_email = "Email tidak boleh kosong";
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))//validasi email
        {
            $error_email = "Format email invalid";
        }
        elseif(empty($password))//validasi password
        {
            $error_password = "Password tidak boleh kosong";
        }
        else{
            $save=mysqli_query($con, "INSERT INTO tb_user (id, nama, alamat, no_telp, email, password)
            values ('', '$nama','$alamat','$no_telp','$email','$password')");   
             if($save){ 
                echo "<script>alert('Data Berhasil disimpan ke database');document.location='masuk.php'</script>";
            }else{//jika simpan gagal maka muncul pesan
            echo "<script>alert('Proses simpan gagal, coba kembali');document.location='daftar.php'</script>";
            } 
        }  
    }
    function cek_input ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return($data);
    }
    ?>
 
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
        <div class="container-md">
        <div class="card ">
        <div class="card-header">
        <h4 class="text-center">DAFTAR KAOSKUPEDIA</h4>
        </div>
        <div class="card-body"> 
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!--nama-->
            <div class="form-group">
                <label for="nama_user" class="col-sm-2 col-form-label fw-bold">Nama</label>
                <div>
                    <input type="text" name="nama" class="form-control <?php echo($error_nama !=""?"is-invalid":""); ?>" id="nama"
                    placeholder="Masukan Nama Anda" value="<?php echo $nama; ?>"><span class="warning"><?php echo $error_nama;?></span>
                </div>
                       
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-2 col-form-label fw-bold">Alamat</label>
                    <div >
                        <input type="text" name="alamat" class="form-control <?php echo($error_alamat !=""?"is-invalid":""); ?>" id="alamat"
                        placeholder="Masukan Alamat Anda" value="<?php echo $alamat; ?>"><span class="warning"><?php echo $error_alamat;?></span>
                    </div>
            </div>
            <div class="form-group">
                <label for="no_telp" class="col-sm-2 col-form-label fw-bold">Nomor Telepon</label>
                    <div >
                        <input type="text" name="no_telp" class="form-control <?php echo($error_no_telp !=""?"is-invalid":""); ?>" id="no_telp"
                        placeholder="Masukan No. Telepon Whatsapp Anda" value="<?php echo $no_telp; ?>"><span class="warning"><?php echo $error_no_telp;?></span>
                    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="email" class="col-sm-4 col-form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control <?php echo($error_email !=""?"is-invalid":""); ?>" id="email"
                    placeholder="Masukan Email Anda" value="<?php echo $email; ?>" ><span class="warning"><?php echo $error_email;?></span>
                </div>
                <div class="form-group col-md-6">
                <label for="password" class="col-sm-4 col-form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control <?php echo($error_password !=""?"is-invalid":""); ?>" id="password"
                    placeholder="Masukan Password Anda" value="<?php echo $password; ?>"><span class="warning"><?php echo $error_password;?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">DAFTAR</button>
            <button type="reset" class="btn btn-dark">BATAL</button>
            </form>
        </div>
        </div>
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
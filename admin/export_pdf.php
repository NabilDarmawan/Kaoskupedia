<?php
include('../koneksi.php');
require_once("../alat/dompdf/autoload.inc.php");//menginclude file autoload.inc.php yang berada di folder dompdf
use Dompdf\Dompdf;//menggunakan namespace Dompdf
$dompdf = new Dompdf();// membuat object dompdf 
//menuliskan perintah query
//$id = $_POST['id'];
//$query = mysqli_query($con, "SELECT * FROM tb_produk WHERE id='$id' ");
$query = mysqli_query($con, "SELECT tb_user.nama, tb_produk.id_produk, tb_produk.nama_produk, 
tb_produk.foto_produk, tb_produk.harga_produk, tb_produk.ukuran_produk, tb_produk.deskripsi_produk,
 tb_user.no_telp FROM tb_produk JOIN tb_user ON tb_produk.id=tb_user.id");
$html = '<center><h3>Data Produk</h3></center><hr/><br/>';
//membuat judul tabel serta header tabel
$html .= '<table border="1" width="10">
<tr>
<th>No</th>
<th>PENGGUNA</th>
<th>NAMA</th>
<th>HARGA</th>
<th>UKURAN</th>
<th>FOTO</th>
<th>STATUS</th>
<th>NO. TLP</th>
</tr>
';

$no = 1;//untuk memberi nomor urut
while($row = mysqli_fetch_array($query))
{//extract data di variabel $query menggunakan perintah while
    $html .="<tr>
    <td>".$no."</td>
    <td>".$row['nama']."</td>
    <td>".$row['nama_produk']."</td>
    <td>".$row['harga_produk']."</td>
    <td>".$row['ukuran_produk']."</td>
    <td>".$row['foto_produk']."</td>
    <td>".$row['deskripsi_produk']."</td>
    <td>".$row['no_telp']."</td>
    </tr>";
    $no++;
}

$html .= "</html>";//memberikan tutup html
$dompdf->loadHtml($html);//melakukan konversi dari code html
//setting ukuran dan orientasu kerta
$dompdf->setPaper('A4','portrait');
//rendering dari HTML ke PDF
$dompdf->render();
//melakukan outpu file pdf
$dompdf->stream('kaoskupedia.data_produk.pdf');
?>
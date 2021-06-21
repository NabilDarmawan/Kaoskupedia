<?php
include('../koneksi.php');
require_once("../alat/dompdf/autoload.inc.php");//menginclude file autoload.inc.php yang berada di folder dompdf
use Dompdf\Dompdf;//menggunakan namespace Dompdf
$dompdf = new Dompdf();// membuat object dompdf 
//menuliskan perintah query
$id = $_POST['id'];
$query = mysqli_query($con, "SELECT * FROM tb_produk WHERE id='$id' ");
$html = '<center><h3>Data Produk</h3></center><hr/><br/>';
//membuat judul tabel serta header tabel
$html .= '<table border="1" width="10">
<tr>
<th>No</th>
<th>NAMA</th>
<th>HARGA</th>
<th>UKURAN</th>
<th>FOTO</th>
<th>STATUS</th>
</tr>
';

$no = 1;//untuk memberi nomor urut
while($row = mysqli_fetch_array($query))
{//extract data di variabel $query menggunakan perintah while
    $html .="<tr>
    <td>".$no."</td>
    <td>".$row['nama_produk']."</td>
    <td>".$row['harga_produk']."</td>
    <td>".$row['ukuran_produk']."</td>
    <td>".$row['foto_produk']."</td>
    <td>".$row['deskripsi_produk']."</td>
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
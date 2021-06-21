<?php
include('../koneksi.php'); //include file koneksi.php yang berisi koneksi ke database
require '../alat/vendor/autoload.php';//equire file autoload.php di dalam folder vendor
//menggunakan namespace dari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();//membuat object dengan nama $spreadsheet dengan menggunakan class Spreadsheet
$sheet = $spreadsheet->getActiveSheet(); //membuat variabel $sheet yang digunakan sebagai activesheet di file excel
$sheet->setCellValue('A1','No');//membuat heading dari tabel
$sheet->setCellValue('B1','PENGGUNA');
$sheet->setCellValue('C1','NAMA');
$sheet->setCellValue('D1','HARGA');
$sheet->setCellValue('E1','UKURAN');
$sheet->setCellValue('F1','FOTO');
$sheet->setCellValue('G1','STATUS');
$sheet->setCellValue('H1','NO. TLP');

$rand = rand();
//$id = $_POST['id'];
//$query = mysqli_query($con, "SELECT * FROM tb_produk WHERE id='$id' ");
//membuat query untuk mengambil data di tabel
$query = mysqli_query($con, "SELECT tb_user.nama, tb_produk.id_produk, tb_produk.nama_produk, 
tb_produk.foto_produk, tb_produk.harga_produk, tb_produk.ukuran_produk, tb_produk.deskripsi_produk,
 tb_user.no_telp FROM tb_produk JOIN tb_user ON tb_produk.id=tb_user.id");
$i = 2;
$no = 1;
//extract hasil query menggunakan while, dan setiap perulangan data akan disimpan di variabel $row
while($row = mysqli_fetch_array($query)) 
{//menuliskan perintah untuk menuliskan data dari hasil query
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['nama']);
    $sheet->setCellValue('C'.$i, $row['nama_produk']);
    $sheet->setCellValue('D'.$i, $row['harga_produk']);
    $sheet->setCellValue('E'.$i, $row['ukuran_produk']);
    $sheet->setCellValue('F'.$i, $row['foto_produk']);
    $sheet->setCellValue('G'.$i, $row['deskripsi_produk']);
    $sheet->setCellValue('H'.$i, $row['no_telp']);
    $i++;
}
//membuat settingan border untuk cell
$styleArray =[
    'borders'=> [
        'allBorders'=>[
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border :: BORDER_THIN, 
        ],
    ],
];
$i = $i -1;
//membuat batas border
$sheet->getStyle('A1:H'.$i)->applyFromArray($styleArray);

$write = new Xlsx($spreadsheet);//render menjadi file Xlsx hasil dari object $spreadsheet 
$write->save($rand.'Report Data produk.xlsx');//melakukan penyimpanan / Export file excel
?>
<?php
include '../db.php';
$order_id=$_GET['order_id'];
//include 'O.php';
// Koneksi library FPDF
require('fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'TAGIHAN',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'BAYAR OIIII.',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO ',1,0);
$pdf->Cell(50,6,'NAMA pelanggan',1,0);
$pdf->Cell(35,6,'ALAMAT',1,0);
$pdf->Cell(30,6,'NEGARA',1,0);
$pdf->Cell(25,6,'TANGGAL',1,0);
$pdf->Cell(25,6,'TOTAL',1,1);
 
$pdf->SetFont('Arial','',10);
$query = mysqli_query($con, "SELECT * FROM orders_info");
while ($row = mysqli_fetch_array($query)){
    $pdf->Cell(10,6,$row['order_id'],1,0);
    $pdf->Cell(50,6,$row['f_name'],1,0);
    $pdf->Cell(35,6,$row['address'],1,0);
    $pdf->Cell(30,6,$row['state'],1,0);
    $pdf->Cell(25,6,$row['expdate'],1,0);
    $pdf->Cell(25,6,$row['total_amt'],1,1);
}

$pdf->Output();
?>
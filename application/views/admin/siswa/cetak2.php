<?php
include "database.php";
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
$pdf->SetLeftMargin(19);
// membuat halaman baru
$pdf->AddPage();

$pdf->SetFont('times','B',10);
// mencetak string 
$pdf->Cell(170,5,'MONTHLY INVENTORY',0,1,'C');
$pdf->Cell(170,5,'BURGERKING BELLAGIO',0,1,'C');
$pdf->Cell(27,3,'',0,1);
$pdf->SetFont('times','',10);
$pdf->Cell(150,5,'Tanggal',0,1,'R');
$pdf->Cell(27,3,'',0,1);

$pdf->Cell(25,10,'Kode',1,0, 'C');
$pdf->Cell(45,10,'Name',1,0,'C');
$pdf->Cell(35,10,'Pack',1,0, 'C');
$pdf->Cell(35,10,'Isi Pack',1,0, 'C');
$pdf->Cell(35,10,'EA',1,1, 'C');


$hasil = mysqli_query($db_conn,"SELECT * FROM data_barang JOIN data_transaksi_monthly ON data_barang.id = data_transaksi.id_barang");
while ($row = mysqli_fetch_array($hasil)){
    $pdf->Cell(25,6,$row['kode'],1,0, 'C');
    $pdf->Cell(45,6,$row['item_name'],1,0,'C');
    $pdf->Cell(35,6,$row['pack'],1,0, 'C');
    $pdf->Cell(35,6,$row['isi_pack'],1,0, 'C');
    $pdf->Cell(35,6,$row['ea'],1,1, 'C'); 
}

$pdf->Output();
?>
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
$pdf->Cell(170,5,'TRANSFER',0,1,'C');
$pdf->Cell(170,5,'BURGERKING BELLAGIO',0,1,'C');
$pdf->Cell(27,3,'',0,1);
$pdf->SetFont('times','',10);
foreach ($data_transfer as $barang){
$pdf->Cell(150,5,$barang->date ,0,1,'R');
break;
}
$pdf->Cell(27,3,'',0,1);

$pdf->Cell(25,10,'ID Cabang',1,0, 'C');
$pdf->Cell(45,10,'Nama Cabang',1,0,'C');
$pdf->Cell(35,10,'Item Name',1,0, 'C');
$pdf->Cell(35,10,'Quantity',1,0, 'C');
$pdf->Cell(35,10,'Approved',1,1, 'C');


foreach ($data_transfer as $transfer){
    $pdf->Cell(25,6,$transfer->id_cabang,1,0, 'C');
    $pdf->Cell(45,6,$transfer->nama_cabang,1,0,'C');
    $pdf->Cell(35,6,$transfer->item_name,1,0, 'C');
    $pdf->Cell(35,6,$transfer->qty,1,0, 'C');
    $pdf->Cell(35,6,$transfer->approved,1,1, 'C'); 
}
// $hasil = mysqli_query($db_conn,"SELECT * FROM data_barang JOIN data_transaksi ON data_barang.id = data_transaksi.id_barang where date='$date'");
// while ($row = mysqli_fetch_array($data_barang)){
//     $pdf->Cell(25,6,$row['kode'],1,0, 'C');
//     $pdf->Cell(45,6,$row['item_name'],1,0,'C');
//     $pdf->Cell(35,6,$row['pack'],1,0, 'C');
//     $pdf->Cell(35,6,$row['isi_pack'],1,0, 'C');
//     $pdf->Cell(35,6,$row['ea'],1,1, 'C'); 
// }

$pdf->Output();
?>
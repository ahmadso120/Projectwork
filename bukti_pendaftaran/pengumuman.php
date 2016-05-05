<?php 
define('FPDF_FONTPATH', 'fpdf/font/');
require('fpdf/fpdf.php');

include "../config/koneksi.php";
include "../config/library.php";
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
//ambil Gambar Header
$pdf->Image("../images/logo2.png", 10, 3, '80', 'left');
//Judul Laporan PDF
$pdf->SetFont('Arial','B','18');
$pdf->Cell(310,10,'Pengumuman Hasil Seleksi PSB',0,0,'C');

$pdf->Ln(20);

$pdf->SetFont('Arial','B','8');
$pdf->SetFillColor(192,192,192); // Warna sel tabel header
$pdf->Cell(10,8,'No',1,0,'C', 1);
$pdf->Cell(50,8,'Nama Siswa',1,0,'C', 1);
$pdf->Cell(70,8,'Alamat',1,0,'C', 1);
$pdf->Cell(25,8,'Rata Rata Raport',1,0,'C', 1);
$pdf->Cell(20,8,'SKHUN',1,0,'C', 1);
$pdf->Cell(20,8,'Nilai Total',1,0,'C', 1);
$pdf->Cell(60,8,'Keterangan',1,0,'C', 1);

  $sql = mysql_query("SELECT * FROM  hasil_tes,pendaftaran WHERE hasil_tes.id_pendaftaran=pendaftaran.id_pendaftaran ORDER BY(hasil_tes.total+0) desc");
$no = 1;
  while($r=mysql_fetch_array($sql)){
  $tampung = mysql_query("SELECT * FROM daya_tampung"); 
  $t = mysql_fetch_array($tampung);	
  
  $lahir   = tgl_indo($r['tgl_lahir']);
  $total = $r['rata_raport'] + $r['skhun'];
  $pdf->Ln();
  $pdf->Cell(10,7,$no,1,0,'C'); 
  $pdf->Cell(50,7,$r['nama'],1,0,'L');
  $pdf->Cell(70,7,$r['alamat'],1,0,'L');
  $pdf->Cell(25,7,$r['rata_raport'],1,0,'L');
  $pdf->Cell(20,7,$r['skhun'],1,0,'L');
  $pdf->Cell(20,7,$total,1,0,'L');
  if ($total >$t['nilai_minimal']){
  $pdf->Cell(30,7,'Lulus',1,0,'L');
  }else{
  $pdf->Cell(30,7,'Tidak Lulus',1,0,'L');
  }
  if ($no <=$t['kapasitas'] AND $total >$t['nilai_minimal']){
  $pdf->Cell(30,7,'Diterima',1,0,'L');
  }else{
  $pdf->Cell(30,7,'Tidak Diterima',1,0,'L');
  }
  
$no++;
}
  $tampung = mysql_query("SELECT * FROM daya_tampung"); 
  $t = mysql_fetch_array($tampung);	
  $pdf->Ln();
  $pdf->Ln();
  $pdf->SetFont('Arial','i','9');
  $pdf->SetTextColor(128,0,0);
$pdf->Output(); 
?>
<?php
include "../../config.php";
include "../../tgl_helper.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai,golongan.golongan, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip join golongan on golongan.id_golongan=pegawai.id_golongan where izin.id_izin='$id' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));

$dt = mysqli_fetch_array($sql);

$tanggal1 = new DateTime($dt['tgl_awal']);
$tanggal2 = new DateTime($dt['tgl_akhir']);
$perbedaan = $tanggal2->diff($tanggal1)->format("%a");
$lama = $perbedaan + 1;

include "../../library/fpdf/fpdf.php";
$pdf = new FPDF('P', 'mm', array(210, 330));
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', '', 11);
// mencetak string 

// $pdf->Cell(20, 6, 'Pelaihari, ', 0, 1, 'C');
$pdf->ln(10);
$pdf->Cell(20, 3, 'Pelaihari, ', 0, 0, 'L');
$pdf->Cell(30, 3, tgl_indo($dt['tgl_buat']), 0, 1, 'L');


$pdf->ln();
$pdf->ln(5);
$pdf->Cell(30, 3, 'Hal', 0,0, 'L');
$pdf->Cell(5, 3, ' : ', 0, 0, 'L');
$pdf->Cell(30, 3, 'Izin ', 0, 1, 'L');

$pdf->ln();
$pdf->ln();
$pdf->Cell(30, 3, '', 0, 0, 'L');
$pdf->Cell(5, 3, ' ', 0, 0, 'L');
$pdf->Cell(30, 3, 'Kepada Yth, ', 0, 1, 'L');

$pdf->ln();
$pdf->Cell(30, 3, '', 0, 0, 'L');
$pdf->Cell(5, 3, ' ', 0, 0, 'L');
$pdf->Cell(30, 3, 'Bapak Kepala Sekolah MTsN 4 Tanah Laut ', 0, 1, 'L');

$pdf->ln();
$pdf->Cell(30, 3, '', 0, 0, 'L');
$pdf->Cell(5, 3, ' ', 0, 0, 'L');
$pdf->Cell(30, 3, 'Di -', 0, 1, 'L');

$pdf->ln();
$pdf->Cell(30, 3, '', 0, 0, 'L');
$pdf->Cell(10, 3, ' ', 0, 0, 'L');
$pdf->Cell(30, 3, 'Tempat ', 0, 1, 'C');

$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(30, 3, '', 0, 0, 'L');
$pdf->Cell(5, 3, ' ', 0, 0, 'L');
$pdf->Cell(30, 3, 'Assalamualaikum Wr. Wb', 0, 1, 'L');



$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(30, 3, '', 0, 0, 'L');
$pdf->Cell(15, 3, ' ', 0, 0, 'L');
$pdf->Cell(30, 3, 'Saya yang beratanda tangan dibawah ini : ', 0, 1, 'L');

$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(30, 7, '', 0, 0, 'L');
$pdf->Cell(5, 7, ' ', 0, 0, 'L');
$pdf->Cell(40, 7, 'Nama ', 0, 0, 'L');
$pdf->Cell(5, 7, ' : ', 0, 0, 'L');
$pdf->Cell(30, 7, strtoupper($dt['nama_pegawai']) , 0, 0, 'L');

$pdf->ln();
$pdf->Cell(30, 7, '', 0, 0, 'L');
$pdf->Cell(5, 7, ' ', 0, 0, 'L');
$pdf->Cell(40, 7, 'NIP ', 0, 0, 'L');
$pdf->Cell(5, 7, ' : ', 0, 0, 'L');
$pdf->Cell(30, 7, strtoupper($dt['nip']), 0, 0, 'L');

$pdf->ln();
$pdf->Cell(30, 7, '', 0, 0, 'L');
$pdf->Cell(5, 7, ' ', 0, 0, 'L');
$pdf->Cell(40, 7, 'Pangkat / Gol / Ruang ', 0, 0, 'L');
$pdf->Cell(5, 7, ' : ', 0, 0, 'L');
$pdf->Cell(30, 7, strtoupper($dt['golongan']), 0, 0, 'L');

$pdf->ln();
$pdf->Cell(30, 7, '', 0, 0, 'L');
$pdf->Cell(5, 7, ' ', 0, 0, 'L');
$pdf->Cell(40, 7, 'Unit Kerja ', 0, 0, 'L');
$pdf->Cell(5, 7, ' : ', 0, 0, 'L');
$pdf->Cell(30, 7, 'MTsN 4 Tanah Laut', 0, 0, 'L');

$pdf->ln();
$pdf->ln();
$pdf->Cell(30, 3, '', 0, 0, 'L');
$pdf->Cell(5, 3, ' ', 0, 0, 'L');
$pdf->MultiCell(130, 7, 'Mengajukan izin '.$dt['alasan']. ' Selama ' . $lama . ' hari kerja dari tanggal '.tgl_indo($dt['tgl_awal']).' sampai tanggal '.tgl_indo($dt['tgl_akhir']), 0, 'L');


$pdf->ln();
$pdf->Cell(30, 3, '', 0, 0, 'L');
$pdf->Cell(5, 3, ' ', 0, 0, 'L');
$pdf->MultiCell(130, 7, '      Demikian surat izin ini disampaikan atas perkenan Bapak diucapkan Terimakasih', 0, 'L');


$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(30, 7, '', 0, 0, 'L');
$pdf->Cell(5, 7, ' ', 0, 0, 'L');
$pdf->Cell(20, 7, '', 0, 0, 'L');
$pdf->Cell(85, 7, '  ', 0, 0, 'L');
$pdf->Cell(10, 7, 'Hormat Saya,', 0, 0, 'C');


$pdf->SetFont('Arial', 'U', 11);
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(30, 7, '', 0, 0, 'L');
$pdf->Cell(5, 7, '', 0, 0, 'L');
$pdf->Cell(20, 7, '', 0, 0, 'L');
$pdf->Cell(85, 7, '', 0, 0, 'L');
$pdf->Cell(10, 6, strtoupper($dt['nama_pegawai']), 0, 1, 'C');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(30, 7, '', 0, 0, 'L');
$pdf->Cell(5, 7, ' ', 0, 0, 'L');
$pdf->Cell(20, 7, '', 0, 0, 'L');
$pdf->Cell(85, 7, '  ', 0, 0, 'L');
$pdf->Cell(10, 6, 'NIP. '.strtoupper($dt['nip']), 0, 1, 'C');

$nama = "Surat Izin_". $dt['nama_pegawai'].".pdf";

$pdf->Output("$nama", "I");
?>
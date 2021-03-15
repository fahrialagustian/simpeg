<?php
include "../../config.php";
include "../../tgl_helper.php";

include "../../library/fpdf/fpdf.php";

$query = mysqli_query($koneksi,"SELECT * FROM pegawai where id_jabatan='3'") or die(mysqli_error($koneksi));
$kepala = mysqli_fetch_array($query);

$id = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT jabatan.jabatan,golongan.golongan,pegawai.nip,pegawai.nama_pegawai,sppd.no_sppd,sppd.tgl_buat,sppd.maksud,sppd.alat,sppd.tujuan,sppd.dari,sppd.tgl_berngkat,sppd.tgl_pulang,sppd.lama,sppd.anggaran,sppd.instansi,sppd.mata_anggaran,sppd.keterangan FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan JOIN golongan on golongan.id_golongan=pegawai.id_golongan join sppd on pegawai.nip=sppd.nip where sppd.id_sppd='$id'") or die(mysqli_error($koneksi));
$dt = mysqli_fetch_array($sql);


$pdf = new FPDF('P', 'mm', array(210, 330));
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', '', 10);
// mencetak string 

$pdf->Image('sppd.jpg',0,0,217);

$pdf->Ln(22);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(50, 5, $dt['no_sppd'], 0, 0, 'L');
$pdf->Cell(65, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, tgl_indo($dt['tgl_buat']), 0, 0, 'L');


$pdf->Ln(18);
$pdf->Cell(20);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(60, 5, '  ', 0, 0, 'L');
$pdf->Cell(12);
$pdf->Cell(10, 6, $kepala['nama_pegawai'], 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(60, 5, '  ', 0, 0, 'L');
$pdf->Cell(12);
$pdf->Cell(10, 8, $dt['nama_pegawai'], 0, 1, 'L');

$pdf->Cell(20);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(60, 5, '  ', 0, 0, 'L');
$pdf->Cell(12);
$pdf->Cell(10, 7.5, $dt['nip'], 0, 1, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(60, 5, '  ', 0, 0, 'L');
$pdf->Cell(12);
$pdf->Cell(10, 7.5, $dt['golongan'], 0, 1, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(60, 5, '  ', 0, 0, 'L');
$pdf->Cell(12);
$pdf->Cell(10, 5, $dt['jabatan'], 0, 1, 'L');

$pdf->Ln(10);
$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(66, 5, '  ', 0, 0, 'L');
$pdf->MultiCell(77, 7.5, $dt['maksud'], 0, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(67, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 6.5, $dt['alat'], 0, 1, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7, $dt['dari'], 0, 1, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7.5, $dt['tujuan'], 0, 1, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7.5, $dt['lama'], 0, 1, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7.5, tgl_indo($dt['tgl_berngkat']), 0, 1, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7.5, tgl_indo($dt['tgl_pulang']), 0, 1, 'L');

$pdf->Ln(23);
$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(67, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7, $dt['anggaran'], 0, 1, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7.5, $dt['instansi'], 0, 1, 'L');

$pdf->Cell(25);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7.5, $dt['mata_anggaran'], 0, 1, 'L');

$pdf->Ln(16.5);
$pdf->Cell(65);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(67, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 6, 'Pelaihari', 0, 1, 'L');

$pdf->Cell(65);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(67, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 6, tgl_indo($dt['tgl_buat']), 0, 1, 'L');

$pdf->Ln(23);
$pdf->Cell(24);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(67, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 5, $kepala['nama_pegawai'], 0, 1, 'L');
$pdf->Cell(24);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(67, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 2, 'NIP. '.$kepala['nip'], 0, 1, 'L');

$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', '', 10);
// mencetak string 

$pdf->Image('sppd1.jpg',0,0,217);

$pdf->Ln();
$pdf->Cell(35);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 5, $dt['dari'], 0, 1, 'L');

$pdf->Ln();
$pdf->Cell(35);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7, $dt['tujuan'], 0, 1, 'L');


$pdf->Ln();
$pdf->Cell(35);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, '  ', 0, 0, 'L');
$pdf->Cell(10, 7.5, tgl_indo($dt['tgl_berngkat']), 0, 1, 'L');


$pdf->Ln(18);
$pdf->Cell(35);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(36, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, $kepala['nama_pegawai'], 0, 1, 'L');

$pdf->Cell(35);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(36, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, 'NIP. '.$kepala['nip'], 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(50);
$pdf->Cell(20, 5, $dt['tujuan'], 0, 0, 'L');
$pdf->Cell(63, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, $dt['dari'], 0, 1, 'L');

$pdf->Cell(50);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(63, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, $dt['tujuan'], 0, 1, 'L');

$pdf->Cell(50);
$pdf->Cell(20, 5, tgl_indo($dt['tgl_berngkat']), 0, 0, 'L');
$pdf->Cell(63, 5, '  ', 0, 0, 'L');
$pdf->Cell(72, 5, tgl_indo($dt['tgl_pulang']), 0, 1, 'L');


$pdf->Ln(130);
$pdf->Cell(12);
$pdf->Cell(72, 5, $kepala['nama_pegawai'], 0, 1, 'L');

$pdf->Cell(12);
$pdf->Cell(72, 5, 'NIP. ' . $kepala['nip'], 0, 0, 'L');


$nama = "SPPD.pdf";

$pdf->Output("$nama", "I");

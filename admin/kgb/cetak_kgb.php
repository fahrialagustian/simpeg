<?php
include "../../config.php";
include "../../tgl_helper.php";

include "../../library/fpdf/fpdf.php";
$pdf = new FPDF('P', 'mm', array(210, 330));
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 11);
// mencetak string 

$pdf->Image('logo.jpg',15,7,30);

$pdf->Cell(190, 5, 'KEMENTRIAN AGAMA RI', 0, 1, 'C');
$pdf->Cell(190, 5, 'KANTOR KEMENTERIAN AGAMA KAB. TANAH LAUT', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 5, 'MADRASAH TSANAWIYAH NEGERI 4 TANAH LAUT', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(190, 5, 'Jl. Pengeran Antasari Telp. (5012) 21695 Pelaihari', 0, 1, 'C');
$pdf->Cell(190, 5, 'Kab. Tanah Laut', 0, 1, 'C');
$pdf->Cell(190, 5, 'Email : mtsn4pelaihari@gmail.com', 0, 1, 'C');

$pdf->SetLineWidth(1);
$pdf->Line(10,40,200,40);
$pdf->SetLineWidth(0);
$pdf->Line(10,41,200,41);

$pdf->SetFont('Arial', '', 9);
$pdf->Ln(15);
$pdf->Cell(20);
$pdf->Cell(20, 5, 'Nomor', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(60, 5, '  ', 0, 0, 'L');
$pdf->Cell(30);
$pdf->Cell(10, 5, 'Pelaihari, 4 September 2020', 0, 1, 'L');

$pdf->Cell(20);
$pdf->Cell(20, 5, 'Sipat', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(60, 5, '  ', 0, 1, 'L');

$pdf->Cell(20);
$pdf->Cell(20, 5, 'Lampiran', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(60, 5, ' - ', 0, 1, 'L');


$pdf->Cell(20);
$pdf->Cell(20, 5, 'Perihal', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->SetFont('Arial', 'UB', 9);
$pdf->Cell(60, 5, ' Kenaikan Gaji Berkala ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(5);
$pdf->Cell(10, 5, 'Kepada Yth,', 0, 1, 'L');

$pdf->Cell(20);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(60, 5, ' ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(5);
$pdf->Cell(10, 5, 'Kepala Kantor Pelayanan Perbendaharaan Negara', 0, 1, 'L');

$pdf->Ln(5);
$pdf->Cell(20);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(5, 5, '  ', 0, 0, 'L');
$pdf->Cell(60, 5, ' ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(5);
$pdf->Cell(10, 5, 'Di- Pelaihari', 0, 1, 'L');

$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(190, 5, 'Dengan ini diberitahukan bahwa berhubung dengan telah dipenuhinya masa kerja dan syarat-syarat lainya kepada : ', 0, 0, 'L');

$pdf->Ln(10);
$pdf->Cell(30);
$pdf->Cell(60, 5, '1. Nama ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, '2. NIP ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, '3. Pangkat/Jabatan ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, '4. Kantor/ Tempat ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' MTsN 4 Tanah Laut ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, '5. Gaji Pokok Lama ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln(10);
// $pdf->Cell(20);
$pdf->Cell(190, 5, '( Atas dasar SKP terakhit tentang Gaji/Pangkat yang ditetapkan)', 0, 0, 'C');

$pdf->Ln(10);
$pdf->Cell(30);
$pdf->Cell(60, 5, 'a. Oleh Pejabat ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' Kepala Madrasah Tsanawiyah Negero 4 Tanah Laut ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, 'b. Tanggal dan Nomor ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, 'c. Tanggal mulai berlaku gaji tersebut ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, 'd. Masa Kerja Golongan ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');


$pdf->SetFont('Arial', 'U', 9);
$pdf->Ln(10);
$pdf->Cell(20);
$pdf->Cell(190, 5, 'DIBERIKAN KENAIKAN GAJI BERKALA HINGGA MEMPEROLEH', 0, 0, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->Ln(10);
$pdf->Cell(30);
$pdf->Cell(60, 5, '6. Gaji pokok baru ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, '7. Berdasarkan masa kerja ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, '8. Dalam golongan ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, '9. Mulai berlaku ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(60, 5, '10. Kenaikan Gaji yang akan datang ', 0, 0, 'L');
$pdf->Cell(5, 5, ' : ', 0, 0, 'L');
$pdf->Cell(50, 5, ' ', 0, 0, 'L');

$pdf->Ln(10);
$pdf->Cell(20);
$pdf->Cell(190, 5, 'Diharapkan agar Kepada Pegawai Negeri Sipil tersebut diatas dibayarkan penghasilan berdasarkan gaji pokok yang', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(190, 5, 'baru sesuai dengan Peraturan Pemerintah Nomor: PP No.15 Tahun 2019', 0, 0, 'L');


$pdf->Ln(20);
$pdf->Cell(20);
$pdf->Cell(110, 5, '', 0, 0, 'L');
$pdf->Cell(40, 5, 'KEPALA', 0, 0, 'C');

$pdf->Ln(20);
$pdf->Cell(20);
$pdf->Cell(110, 5, '', 0, 0, 'L');
$pdf->Cell(40, 5, 'Nama Kepala Sekolah', 0, 0, 'C');

$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(110, 5, '', 0, 0, 'L');
$pdf->Cell(40, 5, 'NIP. ', 0, 0, 'C');

$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(110, 5, 'Tembusan disampaikan Kepada Yth,', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(110, 5, '1. Kepala Kanwil Kemenag Prov. Kal - Sel di Banjarmasin', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(110, 5, '2. Kepala Urusan Tata Usaha Kepegawaian Kankemenag', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(110, 5, '    Kab. Tanah Laut di Pelaihari', 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(110, 5, '3. Pegawai yang bersangkutan', 0, 0, 'L');






$pdf->SetFont('Arial', '', 9);

$nama = "KGB.pdf";

$pdf->Output("$nama", "I");
?>
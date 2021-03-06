<?php
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$jumHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

include "../../config.php";
include "../../tgl_helper.php";
$sql = mysqli_query($koneksi, "SELECT * FROM pegawai order by nama_pegawai ASC") or die(mysqli_error($koneksi));
include "../../library/fpdf/fpdf.php";
$pdf = new FPDF('L', 'mm', array(210, 330));
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', '', 12);
// mencetak string 
if($jumHari == 31){
    $panjang = 310;
}elseif ($jumHari == 30) {
    $panjang = 300;
}elseif ($jumHari == 29) {
    $panjang = 290;
}else{
    $panjang = 280;
}
// $pdf->Cell(20, 6, 'Pelaihari, ', 0, 1, 'C');
// $pdf->ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Image('logo.jpg', 20, 7, 30);

$pdf->Cell(320, 5, 'KEMENTRIAN AGAMA RI', 0, 1, 'C');
$pdf->Cell(320, 5, 'KANTOR KEMENTERIAN AGAMA KAB. TANAH LAUT', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(320, 5, 'MADRASAH TSANAWIYAH NEGERI 4 TANAH LAUT', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(320, 5, 'Jl. Pengeran Antasari Telp. (5012) 21695 Pelaihari', 0, 1, 'C');
$pdf->Cell(320, 5, 'Kab. Tanah Laut', 0, 1, 'C');
$pdf->Cell(320, 5, 'Email : mtsn4pelaihari@gmail.com', 0, 1, 'C');
$pdf->SetLineWidth(1);
$pdf->Line(10, 40, 320, 40);
$pdf->SetLineWidth(0);
$pdf->Line(10, 41, 320, 41);

$pdf->ln(5);
$pdf->Cell(320, 6, 'REKAP ABSEN BULAN ' . strtoupper(getBulan($bulan)) . " " . $tahun, 0, 0, 'C');
$pdf->ln(10);
$pdf->SetFont('Arial', '', 8);

$y = 66;
$jum = 10;
$j = 1;
while ($dt =mysqli_fetch_array($sql)) {
    $nip = $dt['nip'];

// for ($j=0; $j < 10; $j++) { 
    if($j % 4 == 0){
        
        if($j % 4 == 0){
            $y = 66;
        }
        else{
            $y = $y;
        }
            
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->Image('logo.jpg', 20, 7, 30);

        $pdf->Cell(320, 5,
            'KEMENTRIAN AGAMA RI',
            0,
            1,
            'C'
        );
        $pdf->Cell(320, 5,
            'KANTOR KEMENTERIAN AGAMA KAB. TANAH LAUT',
            0,
            1,
            'C'
        );
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(320, 5,
            'MADRASAH TSANAWIYAH NEGERI 4 TANAH LAUT',
            0,
            1,
            'C'
        );
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(320, 5,
            'Jl. Pengeran Antasari Telp. (5012) 21695 Pelaihari',
            0,
            1,
            'C'
        );
        $pdf->Cell(320, 5,
            'Kab. Tanah Laut',
            0,
            1,
            'C'
        );
        $pdf->Cell(320, 5,
            'Email : mtsn4pelaihari@gmail.com',
            0,
            1,
            'C'
        );
        $pdf->SetLineWidth(1);
        $pdf->Line(10, 40,
            320,
            40
        );
        $pdf->SetLineWidth(0);
        $pdf->Line(10, 41,
            320,
            41
        );

        $pdf->ln(5);
        $pdf->Cell(320, 6,
            'REKAP ABSEN BULAN ' . strtoupper(getBulan($bulan)) . " " . $tahun,
            0,
            0,
            'C'
        );
        $pdf->ln(10);
        $pdf->SetFont('Arial', '', 8);
        $pdf->ln();
        for ($i = 0; $i < $jumHari; $i++) {
            $pdf->Cell(10, 5, $i + 1, 1, 0, 'C');
        }
        $pdf->Ln();
        $x = 20;
        for ($i = 0; $i < $jumHari; $i++) {
            $day = $i+1;
            $query = mysqli_query($koneksi,"SELECT * FROM absen where nip='$nip' and day(tgl_absen)='$day' and  MONTH(tgl_absen)='$bulan' and Year(tgl_absen)='$tahun' and id_ketengan_absen='1'")or die(mysqli_error($koneksi));
            $cek = mysqli_num_rows($query);
            if($cek > 0){
                $data = mysqli_fetch_array($query);

                $pdf->MultiCell(10, 6, date("h:m", strtotime($data['jam_masuk'])) . "  " .  date("h:m", strtotime($data['jam_pulang'])), 1, 'C');
            }else{
                $data = mysqli_fetch_array($query);

                $pdf->MultiCell(10, 6, "               ", 1, 'C');
            }
            
            
            $pdf->Sety($y);
            $pdf->Setx($x);

            $x += 10;
        }
        $y += 31;
        $pdf->ln(20);
    }else{
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell($panjang, 6, $dt['nip']." | ".$dt['nama_pegawai'], 1, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->ln();
        for ($i = 0; $i < $jumHari; $i++) {
            $pdf->Cell(10, 5, $i + 1, 1, 0, 'C');
        }
        $pdf->Ln();
        $x = 20;
        $nip = $dt['nip'];
        for ($i = 0; $i < $jumHari; $i++) {
            $day = $i + 1;
            $query = mysqli_query($koneksi, "SELECT * FROM absen where nip='$nip' and day(tgl_absen)='$day' and  MONTH(tgl_absen)='$bulan' and Year(tgl_absen)='$tahun' and id_ketengan_absen='1'") or die(mysqli_error($koneksi));
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $data = mysqli_fetch_array($query);

                $pdf->MultiCell(10, 6, date("h:m", strtotime($data['jam_masuk'])) . "  " .  date("h:m", strtotime($data['jam_pulang'])), 1, 'C');
            } else {
                $data = mysqli_fetch_array($query);

                $pdf->MultiCell(10, 6, "               ", 1, 'C');
            }
            $pdf->Sety($y);
            $pdf->Setx($x);

            $x += 10;
        }
        $y += 31;
        $pdf->ln(20);
    }
    
    $j++;
}


$query = mysqli_query($koneksi, "SELECT * FROM pegawai where id_jabatan='3'") or die(mysqli_error($koneksi));
$kepala = mysqli_fetch_array($query);

$pdf->Ln(10);
$pdf->Cell(250);
$pdf->Cell(30,5,'Pelaihari, '.tgl_indo(date('Y-m-d')),0,0,'C');


$pdf->Ln(15);
$pdf->Cell(250);
$pdf->Cell(30, 5, $kepala['nama_pegawai'], 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(250);
$pdf->Cell(30, 5, 'NIP. ' . $kepala['nip'], 0, 0, 'C');

$nama = "Rekap Absen Bulan ". getBulan($bulan)." ".$tahun.".pdf";

$pdf->Output("$nama", "I");
?>
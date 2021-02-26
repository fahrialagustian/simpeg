<?php
include "../../config.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai,golongan.golongan, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip join golongan on golongan.id_golongan=pegawai.id_golongan where izin.id_izin='$id' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));

$dt = mysqli_fetch_array($sql);

require '../../vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <pre>
Pelaihari,    
Hal         : Izin

              Kepada Yth,
              Bapak Kepala Sekolah MTsN 4 Tanah Laut 
              Di -
                    Tempat   


              Assalamualaikum Wr.Wb

                 Saya yang bertanda tangan dibawah ini :

              Nama                : '. strtoupper($dt['nama_pegawai']). '

              NIP                 : ' . strtoupper($dt['nip']) . '

              Pangkat/ Gol/ Ruang :  ' . strtoupper($dt['golongan']) . '

              Unit Kerja          : MTsN 4 Tanah Laut

              
              Mengajukan Izin ' . strtoupper($dt['alasan']) . '
              Selama ................ hari kerja dari tanggal ' . strtoupper($dt['tgl_awal']) . '
              sampai tanggal ' . strtoupper($dt['tgl_akhir']) . ' 


                Demikian surat izin ini disampaikan atas perkenan Bapak diucapkan
            terimakasih.


                                                                Hormat Saya,


                                                                ' . strtoupper($dt['nama_pegawai']) . '                     
</pre>
</body>

</html>';
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('hasil_report.pdf');
?>

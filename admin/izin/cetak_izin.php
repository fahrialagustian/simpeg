<?php
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

              Nama                :

              NIP                 :

              Pangkat/ Gol/ Ruang :  

              Unit Kerja          : MTsN 4 Tanah Laut

              
              Mengajukan Izin ..................................................
              Selama ................ hari kerja dari tanggal ..................
              sampai tanggal ................. 


                Demikian surat izin ini disampaikan atas perkenan Bapak diucapkan
            terimakasih.


                                                                Hormat Saya,


                                                                (...........)                     
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

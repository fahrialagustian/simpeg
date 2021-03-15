<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $nomor = $_POST['nomor'];
    $gaji_lama = $_POST['gaji_lama'];
    $no_lama = $_POST['no_lama'];
    $masa_kerja_lama = $_POST['masa_kerja_lama'];
    $gaji_baru = $_POST['gaji_baru'];
    $masa_kerja_baru = $_POST['masa_kerja_baru'];
    $golongan = $_POST['golongan'];
    $tgl_baru = date('Y-m-d', strtotime($_POST['tgl_baru']));
    $tgl_lama = date('Y-m-d', strtotime($_POST['tgl_lama']));
    $tgl_gaji_lama = date('Y-m-d', strtotime($_POST['tgl_gaji_lama']));
    $mulai_berlaku = date('Y-m-d', strtotime($_POST['mulai_berlaku']));
    $kenaikan_gaji = date('Y-m-d', strtotime($_POST['kenaikan_gaji']));


    $sql = mysqli_query($koneksi, "INSERT INTO kgb VALUES('','$nip','$nomor','$tgl_baru','$gaji_lama','$tgl_lama','$no_lama','$tgl_gaji_lama','$masa_kerja_lama','$gaji_baru','$masa_kerja_baru','$golongan','$mulai_berlaku','$kenaikan_gaji')") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
}

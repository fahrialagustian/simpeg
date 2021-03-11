<?php 
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $tgl_awal = date('Y-m-d',strtotime($_POST['tgl_awal']));
    $tgl_akhir = date('Y-m-d',strtotime($_POST['tgl_akhir']));
    $alasan = $_POST['alasan'];
    $keterangan ='-';
    $status ='Proses';
    $tgl_input = date('Y-m-d');
    $sql = mysqli_query($koneksi,"INSERT INTO izin VALUES('','$nip','$alasan','$tgl_awal','$tgl_akhir','$keterangan','$status','$tgl_input')") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_izin.php';</script>";
    }
    
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_izin.php';</script>";
}

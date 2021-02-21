<?php 
include "../../config.php";
if (isset($_POST['simpan'])) {
    $golongan = $_POST['golongan'];
    $uang_makan = $_POST['uang_makan'];
    $pajak = $_POST['pajak']/100;
    $sql = mysqli_query($koneksi,"INSERT INTO golongan VALUES('','$golongan','$uang_makan','$pajak')") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_golongan.php';</script>";
    }
    
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_golongan.php';</script>";
}

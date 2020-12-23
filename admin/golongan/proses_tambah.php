<?php 
include "../../config.php";
if (isset($_POST['simpan'])) {
    $golongan = $_POST['golongan'];
    $sql = mysqli_query($koneksi,"INSERT INTO golongan VALUES('','$golongan')") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_golongan.php';</script>";
    }
    
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_golongan.php';</script>";
}

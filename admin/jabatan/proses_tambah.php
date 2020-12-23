<?php 
include "../../config.php";
if (isset($_POST['simpan'])) {
    $jabatan = $_POST['jabatan'];
    $sql = mysqli_query($koneksi,"INSERT INTO jabatan VALUES('','$jabatan')") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_jabatan.php';</script>";
    }
    
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_jabatan.php';</script>";
}


?>
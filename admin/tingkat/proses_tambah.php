<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $tingkat = $_POST['tingkat'];
    $sql = mysqli_query($koneksi, "INSERT INTO tingkat VALUES('','$tingkat')") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_tingkat.php';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_tingkat.php';</script>";
}

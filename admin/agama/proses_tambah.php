<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $agama = $_POST['agama'];
    $sql = mysqli_query($koneksi, "INSERT INTO agama VALUES('','$agama')") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
}

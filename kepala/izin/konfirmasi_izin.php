<?php
include "../../config.php";
$id_izin = $_GET['id'];
    $sql = mysqli_query($koneksi, "UPDATE izin SET status='Acc' where id_izin='$id_izin'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
    }

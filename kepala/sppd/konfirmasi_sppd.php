<?php
include "../../config.php";
$id_sppd = $_GET['id'];
$sql = mysqli_query($koneksi, "UPDATE sppd SET status='Konfirmasi' where id_sppd='$id_sppd'") or die(mysqli_error($koneksi));
if ($sql) {
    echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
}

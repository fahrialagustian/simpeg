<?php
include "../../config.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "DELETE FROM kgb  where id_kgb='$id'") or die(mysqli_error($koneksi));
if ($sql) {
    echo "<script language='javascript'>alert('Data Berhasil Dihapus'); document.location='index.php';</script>";
} else {
    echo "<script language='javascript'>alert('Data Gagal Dihapus'); document.location='index.php';</script>";
}

<?php
include "../../config.php";
$nip = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT foto from pegawai where nip='$nip'") or die(mysqli_error($koneksi));
$dt = mysqli_fetch_array($sql);
$file_lama = $dt['foto'];
unlink('../../file/' . $file_lama);
$query = mysqli_query($koneksi,"DELETE from pegawai where nip='$nip'")or die(mysqli_error($koneksi));
if ($query) {
    echo "<script language='javascript'>alert('Data Berhasil Dihapus'); document.location='index.php';</script>";
} else {
    echo "<script language='javascript'>alert('Data Gagal Dihapus'); document.location='index.php';</script>";
}

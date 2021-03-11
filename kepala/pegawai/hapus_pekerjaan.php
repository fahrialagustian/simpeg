<?php
include "../../config.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT nip,file_sk from riwayat_pekerjaan where id_riwayat_pekerjaan='$id'") or die(mysqli_error($koneksi));
$dt = mysqli_fetch_array($sql);
$file_lama = $dt['file_sk'];
$nip = $dt['nip'];
unlink('../../file/sk/' . $file_lama);
$query = mysqli_query($koneksi,"DELETE from riwayat_pekerjaan where id_riwayat_pekerjaan='$id'")or die(mysqli_error($koneksi));
if ($query) {
    echo "<script language='javascript'>alert('Data Berhasil Dihapus'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
} else {
    echo "<script language='javascript'>alert('Data Gagal Dihapus'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
}

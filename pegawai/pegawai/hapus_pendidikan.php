<?php
include "../../config.php";
$id_rp = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT nip,file_ijazah from riwayat_pendidikan where id_rp='$id_rp'") or die(mysqli_error($koneksi));
$dt = mysqli_fetch_array($sql);
$file_lama = $dt['file_ijazah'];
$nip = $dt['nip'];
unlink('../../file/ijazah/' . $file_lama);
$query = mysqli_query($koneksi,"DELETE from riwayat_pendidikan where id_rp='$id_rp'")or die(mysqli_error($koneksi));
if ($query) {
    echo "<script language='javascript'>alert('Data Berhasil Dihapus'); document.location='profil.php?id=$nip&&tab=pendidikan';</script>";
} else {
    echo "<script language='javascript'>alert('Data Gagal Dihapus'); document.location='profil.php?id=$nip&&tab=pendidikan';</script>";
}

?>
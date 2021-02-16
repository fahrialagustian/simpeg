<?php
include "../../config.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT nip,file_sertifikat from pelatihan where id_pelatihan='$id'") or die(mysqli_error($koneksi));
$dt = mysqli_fetch_array($sql);
$file_lama = $dt['file_sertifikat'];
$nip = $dt['nip'];
unlink('../../file/sertifikat/' . $file_lama);
$query = mysqli_query($koneksi, "DELETE from pelatihan where id_pelatihan='$id'") or die(mysqli_error($koneksi));
if ($query) {
    echo "<script language='javascript'>alert('Data Berhasil Dihapus'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
} else {
    echo "<script language='javascript'>alert('Data Gagal Dihapus'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
}

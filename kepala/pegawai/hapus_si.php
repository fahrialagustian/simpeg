<?php
include "../../config.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT nip from suami_istri where id_si='$id'") or die(mysqli_error($koneksi));
$dt = mysqli_fetch_array($sql);
$nip = $dt['nip'];
$query = mysqli_query($koneksi, "DELETE from suami_istri where id_si='$id'") or die(mysqli_error($koneksi));
if ($query) {
    echo "<script language='javascript'>alert('Data Berhasil Dihapus'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
} else {
    echo "<script language='javascript'>alert('Data Gagal Dihapus'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
}
?>
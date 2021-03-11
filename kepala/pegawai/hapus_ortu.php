<?php
include "../../config.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT nip from bapak_ibu where id_bi='$id'") or die(mysqli_error($koneksi));
$dt = mysqli_fetch_array($sql);
$nip = $dt['nip'];
$query = mysqli_query($koneksi, "DELETE from bapak_ibu where id_bi='$id'") or die(mysqli_error($koneksi));
if ($query) {
    echo "<script language='javascript'>alert('Data Berhasil Dihapus'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
} else {
    echo "<script language='javascript'>alert('Data Gagal Dihapus'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
}

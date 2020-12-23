<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $id_golongan = $_POST['id_golongan'];
    $golongan = $_POST['golongan'];
    $sql = mysqli_query($koneksi, "UPDATE golongan set golongan='$golongan' where id_golongan='$id_golongan'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='edit_golongan.php?id=$id_golongan';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='edit_golongan.php?id=$id_golongan';</script>";
}

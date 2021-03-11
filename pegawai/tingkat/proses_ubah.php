<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $id_tingkat = $_POST['id_tingkat'];
    $tingkat = $_POST['tingkat'];
    $sql = mysqli_query($koneksi, "UPDATE tingkat set tingkat='$tingkat' where id_tingkat='$id_tingkat'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='edit_tingkat.php?id=$id_tingkat';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='edit_tingkat.php?id=$id_tingkat';</script>";
}

<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $id_agama = $_POST['id_agama'];
    $agama = $_POST['agama'];
    $sql = mysqli_query($koneksi, "UPDATE agama set agama='$agama' where id_agama='$id_agama'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='edit_agama.php?id=$id_agama';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='edit_agama.php?id=$id_agama';</script>";
}

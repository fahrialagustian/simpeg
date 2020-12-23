<?php 
include "../../config.php";
if (isset($_POST['simpan'])) {
    $id_jabatan = $_POST['id_jabatan'];
    $jabatan = $_POST['jabatan'];
    $sql = mysqli_query($koneksi,"UPDATE jabatan set jabatan='$jabatan' where id_jabatan='$id_jabatan'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='edit_jabatan.php?id=$id_jabatan';</script>";
    }
    
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='edit_jabatan.php?id=$id_jabatan';</script>";
}

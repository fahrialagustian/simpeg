<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $id_akun = $_POST['id_akun'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $sql = mysqli_query($koneksi, "UPDATE akun set username='$username',password='$password',status='$status' where id_akun='$id_akun'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
}

<?php
include "../../config.php";
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama_instansi = $_POST['nama_instansi'];
    $jabatan = $_POST['jabatan'];
    $nomor_sk = $_POST['no_sk'];
    $tgl_mulai = date('Y-m-d', strtotime($_POST['tgl_mulai']));
    $tgl_selesai = date('Y-m-d', strtotime($_POST['tgl_selesai']));
    $tgl_sk = date('Y-m-d', strtotime($_POST['tgl_sk']));
    $ekstensi_diperbolehkan    = array('pdf');
    $file_sk = $_FILES['file_sk']['name'];
    $x = explode('.', $file_sk);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file_sk']['size'];
    $file_tmp = $_FILES['file_sk']['tmp_name'];
    if ($file_sk == '') {

        $sql = mysqli_query($koneksi, "INSERT INTO riwayat_pekerjaan VALUES('','$nip','$nama_instansi','$jabatan','$tgl_mulai','$tgl_selesai','$nomor_sk','$tgl_sk','Tidak Ada File')") or die(mysqli_error($koneksi));
        if ($sql) {
            echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
        } else {
            echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
        }
    } else {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../../file/sk/' . $file_sk);
            $sql = mysqli_query($koneksi, "INSERT INTO riwayat_pekerjaan VALUES('','$nip','$nama_instansi','$jabatan','$tgl_mulai','$tgl_selesai','$nomor_sk','$tgl_sk','$file_sk')") or die(mysqli_error($koneksi));
            if ($sql) {
                echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
            } else {
                echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
            }
        } else {
            // echo "<script language='javascript'>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
        }
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
}

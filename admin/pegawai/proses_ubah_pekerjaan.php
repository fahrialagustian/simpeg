<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $id_riwayat_pekerjaan = $_POST['id'];
    $nama_instansi = $_POST['nama_instansi'];
    $jabatan = $_POST['jabatan'];
    $nomor_sk = $_POST['no_sk'];
    $tgl_mulai = date('Y-m-d', strtotime($_POST['tgl_mulai']));
    $tgl_selesai = date('Y-m-d', strtotime($_POST['tgl_selesai']));
    $tgl_sk = date('Y-m-d', strtotime($_POST['tgl_sk']));
    $ekstensi_diperbolehkan    = array('pdf');
    $file_sk = $_FILES['file_sk']['name'];
    $file_sk_lama = $_POST['file_sk_lama'];
    $x = explode('.', $file_sk);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file_sk']['size'];
    $file_tmp = $_FILES['file_sk']['tmp_name'];
    if ($file_sk == '') {

        $sql = mysqli_query($koneksi, "UPDATE riwayat_pekerjaan set instansi='$nama_instansi',jabatan='$jabatan',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',nomor_sk='$nomor_sk',tgl_sk='$tgl_sk',file_sk='$file_sk_lama' where id_riwayat_pekerjaan='$id_riwayat_pekerjaan'") or die(mysqli_error($koneksi));
        if ($sql) {
            echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
        } else {
            echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
        }
    } else {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../../file/sk/' . $file_sk);
            unlink('../../file/sk/' . $file_sk_lama);
            $sql = mysqli_query($koneksi, "UPDATE riwayat_pekerjaan set instansi='$nama_instansi',jabatan='$jabatan',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',nomor_sk='$nomor_sk',tgl_sk='$tgl_sk',file_sk='$file_sk' where id_riwayat_pekerjaan='$id_riwayat_pekerjaan'");
            if ($sql) {
                echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
            } else {
                echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
            }
        } else {
            echo "<script language='javascript'>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
        }
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pekerjaan';</script>";
}

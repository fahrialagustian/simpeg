<?php
include "../../config.php";
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama_pelatihan = $_POST['nama_pelatihan'];
    $tgl_mulai = date('Y-m-d', strtotime($_POST['tgl_mulai']));
    $tgl_selesai = date('Y-m-d', strtotime($_POST['tgl_selesai']));
    $no_sertifikat = $_POST['no_sertifikat'];
    $penyelenggara = $_POST['penyelenggara'];
    $ekstensi_diperbolehkan    = array('pdf');
    $file_sertifikat = $_FILES['file_sertifikat']['name'];
    $x = explode('.', $file_sertifikat);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file_sertifikat']['size'];
    $file_tmp = $_FILES['file_sertifikat']['tmp_name'];
    if ($file_sertifikat == '') {

        $sql = mysqli_query($koneksi, "INSERT INTO pelatihan VALUES('','$nip','$nama_pelatihan','$tgl_mulai','$tgl_selesai','$no_sertifikat','$penyelenggara','Tidak Ada File')") or die(mysqli_error($koneksi));
        if ($sql) {
            echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
        } else {
            echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
        }
    } else {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../../file/sertifikat/' . $file_sertifikat);
            $sql = mysqli_query($koneksi, "INSERT INTO pelatihan VALUES('','$nip','$nama_pelatihan','$tgl_mulai','$tgl_selesai','$no_sertifikat','$penyelenggara','$file_sertifikat')") or die(mysqli_error($koneksi));
            if ($sql) {
                echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
            } else {
                echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
            }
        } else {
            echo "<script language='javascript'>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
        }
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
}

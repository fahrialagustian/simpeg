<?php
include "../../config.php";
$nip = $_POST['nip'];
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $id = $_POST['id'];
    $sertifikat_lama = $_POST['sertifikat_lama'];
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

        $sql = mysqli_query($koneksi, "UPDATE pelatihan SET nama_pelatihan='$nama_pelatihan',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',no_sertifikat='$no_sertifikat',penyelenggara='$penyelenggara',file_sertifikat='$sertifikat_lama' where id_pelatihan='$id'") or die(mysqli_error($koneksi));
        if ($sql) {
            echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
        } else {
            echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pelatihan';</script>";
        }
    } else {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            unlink('../../file/sertifikat/' . $sertifikat_lama);
            move_uploaded_file($file_tmp, '../../file/sertifikat/' . $file_sertifikat);
            $sql = mysqli_query($koneksi, "UPDATE pelatihan SET nama_pelatihan='$nama_pelatihan',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',no_sertifikat='$no_sertifikat',penyelenggara='$penyelenggara',file_sertifikat='$file_sertifikat' where id_pelatihan='$id'") or die(mysqli_error($koneksi));
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

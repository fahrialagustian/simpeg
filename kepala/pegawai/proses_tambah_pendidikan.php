<?php
include "../../config.php";
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $jurusan = $_POST['jurusan'];
    $akreditasi = $_POST['akreditasi'];
    $no_ijazah = $_POST['no_ijazah'];
    $id_tingkat = $_POST['id_tingkat'];
    $tgl_ijazah = date('Y-m-d',strtotime($_POST['tgl_ijazah']));
    $ekstensi_diperbolehkan    = array('pdf');
    $file_ijazah = $_FILES['file_ijazah']['name'];
    $x = explode('.', $file_ijazah);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file_ijazah']['size'];
    $file_tmp = $_FILES['file_ijazah']['tmp_name'];
    if ($file_ijazah == '') {

        $sql = mysqli_query($koneksi, "INSERT INTO riwayat_pendidikan VALUES('','$nip','$id_tingkat','$nama_sekolah','$jurusan','$akreditasi','$no_ijazah','$tgl_ijazah','Tidak Ada File')") or die(mysqli_error($koneksi));
        if ($sql) {
            echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=pendidikan';</script>";
        } else {
            echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pendidikan';</script>";
        }
    } else {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../../file/ijazah/' . $file_ijazah);
            $sql = mysqli_query($koneksi, "INSERT INTO riwayat_pendidikan VALUES('','$nip','$id_tingkat','$nama_sekolah','$jurusan','$akreditasi','$no_ijazah','$tgl_ijazah','$file_ijazah')") or die(mysqli_error($koneksi));
            if ($sql) {
                echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=pendidikan';</script>";
            } else {
                echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pendidikan';</script>";
            }
        } else {
            echo "<script language='javascript'>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); document.location='profil.php?id=$nip&&tab=pendidikan';</script>";
        }
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=pendidikan';</script>";
}

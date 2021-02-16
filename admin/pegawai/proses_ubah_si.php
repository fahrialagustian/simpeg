<?php
include "../../config.php";
$nip = $_POST['nip'];
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $id_si = $_POST['id_si'];
    $nama_si = $_POST['nama_si'];
    $tmpt_lhr = $_POST['tmpt_lhr'];
    $tgl_lhr = date('Y-m-d',strtotime($_POST['tgl_lahir']));
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $nik = $_POST['nik'];
    $pekerjaan = $_POST['pekerjaan'];

    $sql = mysqli_query($koneksi, "UPDATE suami_istri SET nik_si='$nik',nama_si='$nama_si',tmpt_lhr_si='$tmpt_lhr',tgl_lhr_si='$tgl_lhr',alamat_si='$alamat',pekerjaan_si='$pekerjaan',status_hidup_si='$status' where id_si='$id_si'") or die(mysqli_error($koneksi));



    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
}

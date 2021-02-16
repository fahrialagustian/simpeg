<?php
include "../../config.php";
$nip = $_POST['nip'];
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $id_bi = $_POST['id_bi'];
    $nama_bi = $_POST['nama_bi'];
    $tmpt_lhr = $_POST['tmpt_lhr'];
    $tgl_lhr = date('Y-m-d', strtotime($_POST['tgl_lahir']));
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $nik = $_POST['nik'];
    $pekerjaan = $_POST['pekerjaan'];

    $sql = mysqli_query($koneksi, "UPDATE bapak_ibu SET nik_bi='$nik',nama_bi='$nama_bi',tmpt_lhr_bi='$tmpt_lhr',tgl_lhr_bi='$tgl_lhr',alamat_bi='$alamat',pekerjaan_bi='$pekerjaan',status_hidup_bi='$status' where id_bi='$id_bi'") or die(mysqli_error($koneksi));



    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
}

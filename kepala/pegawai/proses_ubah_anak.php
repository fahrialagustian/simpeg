<?php
include "../../config.php";
$nip = $_POST['nip'];
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $id_anak = $_POST['id_anak'];
    $nama_anak = $_POST['nama_anak'];
    $tmpt_lhr = $_POST['tmpt_lhr'];
    $tgl_lhr = date('Y-m-d', strtotime($_POST['tgl_lahir']));
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $nik = $_POST['nik'];
    $pekerjaan = $_POST['pekerjaan'];

    $sql = mysqli_query($koneksi, "UPDATE anak SET nik_anak='$nik',nama_anak='$nama_anak',tmpt_lhr_anak='$tmpt_lhr',tgl_lhr_anak='$tgl_lhr',alamat_anak='$alamat',pekerjaan_anak='$pekerjaan',status_hidup_anak='$status' where id_anak='$id_anak'") or die(mysqli_error($koneksi));



    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
}

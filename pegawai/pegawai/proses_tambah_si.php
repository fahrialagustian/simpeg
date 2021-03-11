<?php
include "../../config.php";
$nip = $_POST['nip'];
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama_si = $_POST['nama_si'];
    $tmpt_lhr = $_POST['tmpt_lhr'];
    $tgl_lhr = date('Y-m-d', strtotime($_POST['tgl_lahir']));
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $nik = $_POST['nik'];
    $pekerjaan = $_POST['pekerjaan'];

    $sql = mysqli_query($koneksi,"INSERT INTO suami_istri VALUES('','$nip','$nik','$nama_si','$tmpt_lhr','$tgl_lhr','$alamat','$pekerjaan','$status')") or die(mysqli_error($koneksi));


        
        if ($sql) {
            echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
        } else {
            echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
        }
    
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='profil.php?id=$nip&&tab=keluarga';</script>";
}

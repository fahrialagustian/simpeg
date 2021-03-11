<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];
    $id = $_POST['id_absen'];
    $tgl_absen = date('Y-m-d', strtotime($_POST['tgl_absen']));
    $id_keterangan_absen = $_POST['id_keterangan_absen'];
    $keterangan = $_POST['keterangan'];
    $sql = mysqli_query($koneksi, "UPDATE absen SET nip='$nip',tgl_absen='$tgl_absen',jam_masuk='$jam_masuk',jam_pulang='$jam_pulang',id_ketengan_absen='$id_keterangan_absen',keterangan='$keterangan' where id_absen='$id'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
    }

    // 

} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
}

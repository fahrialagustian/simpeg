<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $id_izin = $_POST['id_izin'];
    $nip = $_POST['nip'];
    $tgl_awal = date('Y-m-d', strtotime($_POST['tgl_awal']));
    $tgl_akhir = date('Y-m-d', strtotime($_POST['tgl_akhir']));
    $alasan = $_POST['alasan'];
    $keterangan = '-';
    $status = 'Proses';
    $tgl_input = date('Y-m-d');
    $sql = mysqli_query($koneksi, "UPDATE izin SET nip='$nip',alasan='$alasan',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',keterangan='$keterangan',status='$status',tgl_buat='$tgl_input' where id_izin='$id_izin'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
}

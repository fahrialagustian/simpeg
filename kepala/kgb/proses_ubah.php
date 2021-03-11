<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $id_kgb = $_POST['id_kgb'];
    $no_sk = $_POST['no_sk'];
    $tmt_sk = $_POST['tmt_sk'];
    $mk_tahun = $_POST['mk_tahun'];
    $mk_bulan = $_POST['mk_bulan'];
    $keterangan = $_POST['keterangan'];
    $tgl_sk = date('Y-m-d', strtotime($_POST['tgl_sk']));


    $sql = mysqli_query($koneksi, "UPDATE kgb SET nip='$nip',no_sk='$no_sk',tgl_sk='$tgl_sk',tmt_sk='$tmt_sk',mk_tahun='$mk_tahun',mk_bulan='$mk_bulan',keterangan='$keterangan' where id_kgb='$id_kgb'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
}

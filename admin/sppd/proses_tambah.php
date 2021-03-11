<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $query = mysqli_query($koneksi,"SELECT max(no_urut) as no_urut from sppd") or die(mysqli_error($koneksi));
    $dt = mysqli_fetch_array($query);
    $no_urut = $dt['no_urut']+1;
    $nip = $_POST['nip'];
    $maksud = $_POST['maksud'];
    $alat = $_POST['alat'];
    $tujuan = $_POST['tujuan'];
    $dari = $_POST['dari'];
    $tgl_berangkat = date('Y-m-d',strtotime($_POST['tgl_berangkat']));
    $tgl_pulang = date('Y-m-d',strtotime($_POST['tgl_pulang']));
    $anggaran = $_POST['anggaran'];
    $instansi = $_POST['instansi'];
    $mata_anggaran = $_POST['mata_anggaran'];
    $status = 'Proses';
    $keterangan = '-';
    $tgl_buat = date('Y-m-d');
    $tanggal1 = new DateTime($tgl_berangkat);
    $tanggal2 = new DateTime($tgl_pulang);
    $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
    $lama = $perbedaan + 1;
    $no_sppd = $no_urut."/Mts.17.11-4/KU.01.1/".date('m')."/".date('y');


    $sql = mysqli_query($koneksi, "INSERT INTO sppd VALUES('','$nip','$no_sppd','$no_urut','$tgl_buat','$maksud','$alat','$tujuan','$dari','$tgl_berangkat','$tgl_pulang','$lama','$anggaran','$instansi','$mata_anggaran','$status','$keterangan')") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
}

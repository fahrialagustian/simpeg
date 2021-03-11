<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $id_sppd = $_POST['id_sppd'];
    $maksud = $_POST['maksud'];
    $alat = $_POST['alat'];
    $tujuan = $_POST['tujuan'];
    $dari = $_POST['dari'];
    $tgl_berangkat = date('Y-m-d', strtotime($_POST['tgl_berangkat']));
    $tgl_pulang = date('Y-m-d', strtotime($_POST['tgl_pulang']));
    $anggaran = $_POST['anggaran'];
    $instansi = $_POST['instansi'];
    $mata_anggaran = $_POST['mata_anggaran'];
    $status = 'Proses';
    $keterangan = '-';
    $tanggal1 = new DateTime($tgl_berangkat);
    $tanggal2 = new DateTime($tgl_pulang);
    $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
    $lama = $perbedaan + 1;


    $sql = mysqli_query($koneksi, "UPDATE sppd SET nip='$nip',maksud='$maksud',alat='$alat',tujuan='$tujuan',dari='$dari',tgl_berngkat='$tgl_berangkat',tgl_pulang='$tgl_pulang',lama='$lama',anggaran='$anggaran',instansi='$instansi',mata_anggaran='$mata_anggaran',status='$status',keterangan='$keterangan' where id_sppd='$id_sppd'") or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_agama.php';</script>";
}

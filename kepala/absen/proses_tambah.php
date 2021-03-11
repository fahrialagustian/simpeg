<?php 
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];
    $tgl_absen = date('Y-m-d',strtotime($_POST['tgl_absen']));
    $id_keterangan_absen = $_POST['id_keterangan_absen'];
    $keterangan = $_POST['keterangan'];
    $query = mysqli_query($koneksi,"SELECT * from absen where nip='$nip' and tgl_absen='$tgl_absen'")or die(mysqli_error($koneksi));
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        echo "<script language='javascript'>alert('Data Sudah Ada'); document.location='tambah_absen.php';</script>";
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO absen VALUES('','$nip','$tgl_absen','$jam_masuk','$jam_pulang','$id_keterangan_absen','$keterangan')") or die(mysqli_error($koneksi));
        if ($sql) {
            echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
        } else {
            echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_absen.php';</script>";
        }
    }
    
    // 
    
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_absen.php';</script>";
}

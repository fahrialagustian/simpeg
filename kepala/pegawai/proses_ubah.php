<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nip = str_replace(" ", "", $_POST['nip']);
    $nama_pegawai = $_POST['nama_pegawai'];
    $tmpt_lhr = $_POST['tmpt_lhr'];
    $tgl_lhr = date('Y-m-d', strtotime($_POST['tgl_lhr']));
    $email = $_POST['email'];
    $no_telpon = $_POST['no_telpon'];
    $alamat = $_POST['alamat'];
    $id_jabatan = $_POST['id_jabatan'];
    $id_golongan = $_POST['id_golongan'];
    $id_agama = $_POST['id_agama'];
    $username = str_replace(" ", "", $_POST['nip']);
    $password = md5(str_replace(" ", "", $_POST['nip']));
    $level = 'Pegawai';
    $status = 'Aktif';
    $nip_lama = $_POST['nip_lama'];
    $foto_lama = $_POST['foto_lama'];
    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
    $foto = $_FILES['file_foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file_foto']['size'];
    $file_tmp = $_FILES['file_foto']['tmp_name'];
        if ($foto == '') {
            $sql = mysqli_query($koneksi, "UPDATE pegawai SET nip='$nip',nama_pegawai='$nama_pegawai',tmpt_lhr='$tmpt_lhr',tgl_lhr='$tgl_lhr',alamat='$alamat',no_telpon='$no_telpon',email='$email',foto='$foto_lama',id_agama='$id_agama',id_golongan='$id_golongan',id_jabatan='$id_jabatan' where nip='$nip_lama'") or die(mysqli_error($koneksi));
            if ($sql) {
                echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
            } else {
                echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
            }
        } else {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                unlink('../../file/' . $foto_lama);
                move_uploaded_file($file_tmp, '../../file/' . $foto);

            $sql = mysqli_query($koneksi, "UPDATE pegawai SET nip='$nip',nama_pegawai='$nama_pegawai',tmpt_lhr='$tmpt_lhr',tgl_lhr='$tgl_lhr',alamat='$alamat',no_telpon='$no_telpon',email='$email',foto='$foto',id_agama='$id_agama',id_golongan='$id_golongan',id_jabatan='$id_jabatan' where nip='$nip_lama'") or die(mysqli_error($koneksi));
                if ($sql) {
                    echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
                } else {
                    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
                }
            } else {
                echo "<script language='javascript'>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); document.location='index.php';</script>";
            }
        }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='index.php';</script>";
}

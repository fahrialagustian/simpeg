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
    // $nip = $_POST['nip'];
    $ekstensi_diperbolehkan    = array('png', 'jpg','jpeg');
    $foto = $_FILES['file_foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file_foto']['size'];
    $file_tmp = $_FILES['file_foto']['tmp_name'];
    $query = mysqli_query($koneksi, "SELECT nip FROM pegawai where nip='$nip'") or die(mysqli_error($koneksi));
    $cek_nip = mysqli_num_rows($query);
    if ($cek_nip > 0) {
        echo "<script language='javascript'>alert('NIP sudah digunakan'); document.location='tambah_pegawai.php';</script>";
    } else {
        if ($foto == '') {
            $akun = mysqli_query($koneksi, "INSERT INTO akun VALUES('','$username','$password','$level','$status')") or die(mysqli_error($koneksi));
            $id_akun = mysqli_insert_id($koneksi);

            $sql = mysqli_query($koneksi, "INSERT INTO pegawai VALUES('$nip','$nama_pegawai','$tmpt_lhr','$tgl_lhr','$alamat','$no_telpon','$email','Kemenag-Logo.png','$id_agama','$id_golongan','$id_jabatan','$id_akun')") or die(mysqli_error($koneksi));
            if ($sql) {
                echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
            } else {
                echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_pegawai.php';</script>";
            }
        } else {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                move_uploaded_file($file_tmp, '../../file/' . $foto);
                $akun = mysqli_query($koneksi, "INSERT INTO akun VALUES('','$username','$password','$level','$status')") or die(mysqli_error($koneksi));
                $id_akun = mysqli_insert_id($koneksi);

                $sql = mysqli_query($koneksi, "INSERT INTO pegawai VALUES('$nip','$nama_pegawai','$tmpt_lhr','$tgl_lhr','$alamat','$no_telpon','$email','$foto','$id_agama','$id_golongan','$id_jabatan','$id_akun')") or die(mysqli_error($koneksi));
                if ($sql) {
                    echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
                } else {
                    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_pegawai.php';</script>";
                }
            } else {
                echo "<script language='javascript'>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); document.location='tambah_pegawai.php';</script>";
            }
        }
    }
} else {
    echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='tambah_jabatan.php';</script>";
}

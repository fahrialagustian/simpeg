<?php
session_start();
include "config.php";

if (isset($_POST['login'])) {
    $username = mysqli_escape_string($koneksi,$_POST['nip']);
    $password = md5(mysqli_escape_string($koneksi,$_POST['password']));
    $sql = mysqli_query($koneksi,"SELECT * FROM akun where username='$username' and password='$password' and status='Aktif'") or die(mysqli_error($koneksi));
    $cek_akun = mysqli_num_rows($sql);
    if ($cek_akun>0) {
        $dt = mysqli_fetch_array($sql);
        if ($dt['level']=='Admin') {
            $_SESSION['id_akun']=$dt['id_akun'];
            $_SESSION['nama_pengguna'] = $dt['username'];
            $_SESSION['status'] = 'Login';
            $_SESSION['level'] = $dt['level'];

            echo "<script language='javascript'>alert('Anda Berhasil Login'); document.location='admin/komponen/index.php';</script>";
        }elseif ($dt['level']=='Pegawai') {
            $id_akun = $dt['id_akun'];
            $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai,jabatan.jabatan,jabatan.id_jabatan from jabatan join pegawai on jabatan.id_jabatan=pegawai.id_jabatan WHERE pegawai.id_akun='$id_akun'")or die(mysqli_error($koneksi));
            $data = mysqli_fetch_array($sql);
            if($data['id_jabatan']=='1'){
                $_SESSION['id_akun'] = $dt['id_akun'];
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['nama_pengguna'] = $data['nama_pegawai'];
                $_SESSION['status'] = 'Login';
                $_SESSION['level'] = $dt['level'];

                echo "<script language='javascript'>alert('Anda Berhasil Login'); document.location='pegawai/komponen/index.php';</script>";
            }elseif ($data['id_jabatan'] == '3') {
                $_SESSION['id_akun'] = $dt['id_akun'];
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['nama_pengguna'] = $data['nama_pegawai'];
                $_SESSION['status'] = 'Login';
                $_SESSION['level'] = $dt['level'];

                echo "<script language='javascript'>alert('Anda Berhasil Login'); document.location='kepala/komponen/index.php';</script>";
            }else{
                echo "<script language='javascript'>alert('Username atau Password salah !!'); document.location='index.php';</script>";
            }
            
        } else {    
            echo "<script language='javascript'>alert('Username atau Password salah !!'); document.location='index.php';</script>";
        }
        
        
    } else {
        echo "<script language='javascript'>alert('Username atau Password salah !!'); document.location='index.php';</script>";
    }
    
} else {
    echo "<script language='javascript'>alert('Username atau Password salah !!'); document.location='index.php';</script>";
}

?>
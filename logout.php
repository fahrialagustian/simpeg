<?php
session_start();
unset($_SESSION['id_akun']);
unset($_SESSION['nama_pengguna']); 
// unset($_SESSION['foto']);
unset($_SESSION['level']); 
unset($_SESSION['status']);
session_destroy();
echo "<script language='javascript'>alert('Anda Berhasil Logout'); document.location='index.php';</script>";

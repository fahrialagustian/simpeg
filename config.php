<?php

$koneksi = mysqli_connect('localhost','root','','simpeg') or die(mysqli_error($koneksi));
if(!$koneksi){
    echo "Koneksi Gagal !!";
}

?>
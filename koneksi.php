<?php
    $koneksi = mysqli_connect("localhost","root","","mahasiswa_db");

    if (mysqli_connect_errno($koneksi)){
        echo "Koneksi Gagal ".mysqli_connect_error();
    }
?>
<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM data_mahasiswa WHERE id='$id'");
    header("location: index.php");
?>
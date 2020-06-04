<?php
include '../../../koneksi.php';


// Dapatkan id dari index.php

$id= $_POST["nis"];


$query = "DELETE FROM siswa WHERE nis='$id'";
mysqli_query($koneksi,$query);
mysqli_close($koneksi);
?>
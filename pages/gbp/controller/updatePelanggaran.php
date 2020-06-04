<?php
include_once '../../../koneksi.php';
$id =  $_POST["id_pelanggaran"];
$nis = $_POST["nis"];
$tgl = $_POST["tgl"];
$thn_ajar = $_POST["tahun_ajar"];
$smt = $_POST["semester"];
$ket = $_POST["ket"];

$query = "UPDATE pelanggaran SET nis='$nis', tgl='$tgl', tahun_ajar='$thn_ajar',
            semester='$smt', ket='$ket'
            WHERE id_pelanggaran=$id";  
if(mysqli_query($koneksi,$query)) {
    header("location: ../pelanggaran.php");
} else {
    echo "Gagal";
}
?>
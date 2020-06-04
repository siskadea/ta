<?php
include '../../../koneksi.php';
$id_pelanggaran = $_POST["id_pelanggaran"];
$nis = $_POST["nis"];
$tgl = $_POST["tgl"];
$thn_ajar = $_POST["tahun_ajar"];
$smt = $_POST["semester"];
$ket = $_POST["ket"];

$query = "INSERT INTO pelanggaran (id_pelanggaran, nis, tgl, tahun_ajar, semester, ket) 
            VALUES ('$id_pelanggaran', '$nis', '$tgl', '$thn_ajar', '$smt','$ket')";
if(mysqli_query($koneksi,$query)) {
    header("location: ../pelanggaran.php");
} else {
    echo "Gagal";
}
?>
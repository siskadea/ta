<?php
include_once '../../../koneksi.php';
$id =  $_POST["id_np"];
$id_mapel =  $_POST["id_mapel"];
$id_deskripsi = $_POST["id_deskripsi"];
$kkm = $_POST["kkm_np"];
$nilai = $_POST["nilai_np"];
$predikat = $_POST["predikat_np"];
$thn_ajar = $_POST["tahun_ajaran"];
$smt = $_POST["semester"];

$query = "UPDATE nilai_pengetahuan SET id_mapel='$id_mapel', id_deskripsi='$id_deskripsi', kkm_np='$kkm',
            nilai_np='$nilai', predikat_np='$predikat', tahun_ajaran='$thn_ajar', semester='$smt'
            WHERE id_np=$id";  
if(mysqli_query($koneksi,$query)) {
    header("location: ../gmapelnp.php");
} else {
    echo "Gagal";
}
?>
<?php
include_once '../../../koneksi.php';
$id =  $_POST["id_nk"];
$id_mapel =  $_POST["id_mapel"];
$id_deskripsi = $_POST["id_deskripsi"];
$kkm = $_POST["kkm_nk"];
$nilai = $_POST["nilai_nk"];
$predikat = $_POST["predikat_nk"];
$thn_ajar = $_POST["tahun_ajaran"];
$smt = $_POST["semester"];

$query = "UPDATE nilai_keterampilan SET id_mapel='$id_mapel', id_deskripsi='$id_deskripsi', kkm_nk='$kkm',
            nilai_nk='$nilai', predikat_nk='$predikat', tahun_ajaran='$thn_ajar', semester='$smt'
            WHERE id_nk=$id";  
if(mysqli_query($koneksi,$query)) {
    header("location: ../gmapelnk.php");
} else {
    echo "Gagal";
}
?>
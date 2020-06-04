<?php
include '../../../koneksi.php';

$id_nk = $_POST["id_nk"];
$nis = $_POST["nis"];
$id_mapel = $_POST["id_mapel"];
$id_deskripsi = $_POST["id_deskripsi"];
$kkm = $_POST["kkm_nk"];
$nilai = $_POST["nilai_nk"];
$predikat = $_POST["predikat_nk"];
$thn_ajar = $_POST["tahun_ajaran"];
$smt = $_POST["semester"];
$query = "INSERT INTO nilai_keterampilan (id_nk, nis, id_mapel, id_deskripsi, kkm_nk, nilai_nk, 
            predikat_nk, tahun_ajaran, semester) 
            VALUES ('$id_nk', '$nis', '$id_mapel', '$id_deskripsi', '$kkm','$nilai','$predikat',
            '$thn_ajar','$smt')";
if(mysqli_query($koneksi,$query)) {
    header("location: ../gmapelnk.php");
} else {
    echo "Gagal";
}
?>
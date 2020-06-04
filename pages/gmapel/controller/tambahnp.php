<?php
include '../../../koneksi.php';
$id_np = $_POST["id_np"];
$nis = $_POST["nis"];
$id_mapel = $_POST["id_mapel"];
$id_deskripsi = $_POST["id_deskripsi"];
$kkm = $_POST["kkm_np"];
$nilai = $_POST["nilai_np"];
$predikat = $_POST["predikat_np"];
$thn_ajar = $_POST["tahun_ajaran"];
$smt = $_POST["semester"];
$query = "INSERT INTO nilai_pengetahuan (id_np, nis, id_mapel, id_deskripsi, kkm_np, nilai_np, predikat_np, 
            tahun_ajaran, semester) 
            VALUES ('$id_np', '$nis', '$id_mapel', '$id_deskripsi', '$kkm','$nilai','$predikat',
            '$thn_ajar','$smt')";
if(mysqli_query($koneksi,$query)) {
    header("location: ../gmapelnp.php");
} else {
    echo "Gagal";
}
?>
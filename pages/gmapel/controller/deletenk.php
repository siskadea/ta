<?php
    include_once '../../../koneksi.php';
    $id = $_GET["id"];
    $query = "DELETE FROM nilai_keterampilan WHERE id_nk=$id";
    if(mysqli_query($koneksi, $query)){
        header("location: ../gmapelnk.php");
    }else{
        echo "Gagal";
    }
?>
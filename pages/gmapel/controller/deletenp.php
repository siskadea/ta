<?php
    include_once '../../../koneksi.php';
    $id = $_GET["id"];
    $query = "DELETE FROM nilai_pengetahuan WHERE id_np=$id";
    if(mysqli_query($koneksi, $query)){
        header("location: ../gmapelnp.php");
    }else{
        echo "Gagal";
    }
?>
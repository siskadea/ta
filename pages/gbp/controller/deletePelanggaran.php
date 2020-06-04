<?php
    include_once '../../../koneksi.php';
    $id = $_GET["id"];
    $query = "DELETE FROM pelanggaran WHERE id_pelanggaran=$id";
    if(mysqli_query($koneksi, $query)){
        header("location: ../pelanggaran.php");
    }else{
        echo "Gagal";
    }
?>
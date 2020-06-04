<?php
    include_once '../../../koneksi.php';
    $id = $_GET["id"];
    $query = "DELETE FROM guru WHERE id_guru='$id'";
    if(mysqli_query($koneksi, $query)){
        header("location: ../datagr.php");
    }else{
        echo "Gagal";
    }
?>
<?php
    include_once '../../../koneksi.php';
    $id = $_GET["id"];
    $query = "DELETE FROM pegawai WHERE id_pegawai='$id'";
    if(mysqli_query($koneksi, $query)){
        header("location: ../datapgw.php");
    }else{
        echo "Gagal";
    }
?>
<?php
    include_once '../../../koneksi.php';
    $id = $_GET["id"];
    $query = "DELETE FROM siswa WHERE nis='$id'";
    if(mysqli_query($koneksi, $query)){
        header("location: ../datasw.php");
    }else{
        echo "Gagal";
    }
    // mysqli_query($k oneksi,$query);
    mysqli_close($koneksi);
    
?>
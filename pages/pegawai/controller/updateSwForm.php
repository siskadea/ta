<?php
include '../../../koneksi.php';

$nis= $_POST["nis"];
$query = "SELECT * FROM siswa WHERE nis=$nis";
$result = mysqli_query($koneksi,$query);

// Check apakah data mahasiswa ada atau tidak
// Kembalikan data dalam format json jika ada
// Jika tidak kembalikan nilai 1
if(mysqli_num_rows($result) > 0){
    $response = mysqli_fetch_assoc($result);
    // kembalikan data dalam bentuk json
    echo json_encode($response);
} else {
    echo 1;
}

mysqli_close($koneksi);
?>
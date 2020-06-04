<?php
include '../../../koneksi.php';
$nis = $_POST["nis"];
$id_ortu = $_POST["id_ortu"];
$id_pegawai = $_POST["id_pegawai"];
$nisn = $_POST["nisn"];
$nama_siswa = $_POST["nama_siswa"];
$jk = $_POST["jk_siswa"];
$tmp_lahir = $_POST["tmp_lahir"];
$tgl_lahir = $_POST["tgl_lahir"];
$agama = $_POST["agama"];
$alamat = $_POST["alamat_siswa"];
$username_s = $_POST["username_s"];
$password_s = $_POST["password_s"];

$queryCheck = "SELECT * FROM siswa WHERE nis=$nis";
$resultCheck = mysqli_query($koneksi, $queryCheck);

$query = "INSERT INTO siswa (nis, id_ortu, id_pegawai, nisn, jk_siswa, tmp_lahir, 
            tgl_lahir, agama_siswa, alamat_pegawai, username_s, password_s) 
            VALUES ('$id_pegawai', '$nip_pegawai','$nama_pegawai','$alamat',
            '$agama','$notelp', '$jk','$tmp_lahir','$tgl_lahir','$username_p', '$password_p')";
// if(mysqli_query($koneksi,$query)) {
//     header("location: ../datapgw.php");
// } else {
//     echo "Gagal";
// }

if(mysqli_num_rows($resultCheck) > 0){
    // return 0 jika sudah ada
    echo 0;
} else {
    // Lakukan insert ke database dan return 1
    mysqli_query($koneksi, $query);
    echo 1;
}

mysqli_close($koneksi);
?>
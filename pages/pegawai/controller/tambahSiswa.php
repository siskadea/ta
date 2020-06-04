<?php
include_once '../../../koneksi.php';
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

$query = "INSERT INTO siswa (nis, id_ortu, id_pegawai, nisn, nama_siswa, jk_siswa, 
            tmp_lahir, tgl_lahir, agama, alamat_siswa, username_s, password_s) 
            VALUES ('$nis', '$id_ortu', '$id_pegawai', '$nisn','$nama_siswa','$jk',
            '$tmp_lahir','$tgl_lahir', '$agama','$alamat','$username_s', '$password_s')";

if(mysqli_query($koneksi,$query)) {
    header("location: ../datasw.php");
} else {
    echo "Gagal";
}
?>
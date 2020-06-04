<?php
include '../../../koneksi.php';
$id_guru = $_POST["id_guru"];
$id_jabatan = $_POST["id_jabatan"];
$nip_guru = $_POST["nip_guru"];
$nama_guru = $_POST["nama_guru"];
$alamat = $_POST["alamat_guru"];
$agama = $_POST["agama_guru"];
$notelp = $_POST["no_telp_guru"];
$jk = $_POST["jk_guru"];
$tmp_lahir = $_POST["tmp_lahir_guru"];
$tgl_lahir = $_POST["tgl_lahir_guru"];
$username_g = $_POST["username_g"];
$password_g = $_POST["password_g"];

$query = "INSERT INTO guru (id_guru, id_jabatan, nip_guru, nama_guru, alamat_guru, 
            agama_guru, no_telp_guru, jk_guru, tmp_lahir_guru, tgl_lahir_guru, username_g, password_g) 
            VALUES ('$id_guru', '$id_jabatan', '$nip_guru','$nama_guru','$alamat',
            '$agama','$notelp', '$jk','$tmp_lahir','$tgl_lahir','$username_g', '$password_g')";

if(mysqli_query($koneksi,$query)) {
    header("location: ../datagr.php");
} else {
    echo "Gagal";
}
?>
<?php
include '../../../koneksi.php';
$id_pegawai = $_POST["id_pegawai"];
$nip_pegawai = $_POST["nip_pegawai"];
$nama_pegawai = $_POST["nama_pegawai"];
$alamat = $_POST["alamat_pegawai"];
$agama = $_POST["agama_pegawai"];
$notelp = $_POST["notelp_pegawai"];
$jk = $_POST["jk_pegawai"];
$tmp_lahir = $_POST["tmp_lahir_pegawai"];
$tgl_lahir = $_POST["tgl_lahir_pegawai"];
$username_p = $_POST["username_pegawai"];
$password_p = $_POST["password_pegawai"];
$query = "INSERT INTO pegawai (id_pegawai, nip_pegawai, nama_pegawai, alamat_pegawai, 
            agama_pegawai, notelp_pegawai, jk_pegawai, tmp_lahir_pegawai, tgl_lahir_pegawai, 
            username_pegawai, password_pegawai) 
            VALUES ('$id_pegawai', '$nip_pegawai','$nama_pegawai','$alamat',
            '$agama','$notelp', '$jk','$tmp_lahir','$tgl_lahir','$username_p', '$password_p')";
if(mysqli_query($koneksi,$query)) {
    header("location: ../datapgw.php");
} else {
    echo "Gagal";
}
?>
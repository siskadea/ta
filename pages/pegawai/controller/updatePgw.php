<?php
include_once '../../../koneksi.php';
$id =  $_POST["id_pegawai"];
$nip_pegawai = $_POST["nip_pegawai"];
$nama_pegawai = $_POST["nama_pegawai"];
$alamat = $_POST["alamat_pegawai"];
$agama = $_POST["agama_pegawai"];
$notelp_pegawai = $_POST["notelp_pegawai"];
$jk = $_POST["jk_pegawai"];
$tmp_lahir = $_POST["tmp_lahir_pegawai"];
$tgl_lahir = $_POST["tgl_lahir_pegawai"];
$username_p = $_POST["username_pegawai"];
$password_p = $_POST["password_pegawai"];

$query = "UPDATE pegawai SET nip_pegawai='$nip_pegawai', nama_pegawai='$nama_pegawai',
            alamat_pegawai='$alamat', agama_pegawai='$agama', notelp_pegawai='$notelp_pegawai', jk_pegawai='$jk',
            tmp_lahir_pegawai='$tmp_lahir', tgl_lahir_pegawai='$tgl_lahir', username_pegawai='$username_p',
            password_pegawai='$password_p'
            WHERE id_pegawai='$id'";  
if(mysqli_query($koneksi,$query)) {
    header("location: ../datapgw.php");
} else {
    echo "Gagal";
}
?>
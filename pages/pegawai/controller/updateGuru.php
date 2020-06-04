<?php
include_once '../../../koneksi.php';
$id =  $_POST["id_guru"];
$id_jabatan =  $_POST["id_jabatan"];
$nip_guru = $_POST["nip_guru"];
$nama_guru = $_POST["nama_guru"];
$alamat = $_POST["alamat_guru"];
$agama = $_POST["agama_guru"];
$no_telp_guru = $_POST["no_telp_guru"];
$jk = $_POST["jk_guru"];
$tmp_lahir = $_POST["tmp_lahir_guru"];
$tgl_lahir = $_POST["tgl_lahir_guru"];
$username_g = $_POST["username_g"];
$password_g = $_POST["password_g"];

$query = "UPDATE guru SET id_jabatan='$id_jabatan', nip_guru='$nip_guru', nama_guru='$nama_guru',
            alamat_guru='$alamat', agama_guru='$agama', no_telp_guru='$no_telp_guru', jk_guru='$jk',
            tmp_lahir_guru='$tmp_lahir', tgl_lahir_guru='$tgl_lahir', username_g='$username_g',
            password_g='$password_g'
            WHERE id_guru='$id'";  
if(mysqli_query($koneksi,$query)) {
    header("location: ../datagr.php");
} else {
    echo "Gagal";
}
?>
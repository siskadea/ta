<?php
include '../../../koneksi.php';

// Dapatkan value dari updateMhsForm.php
$id = $_POST["nis"];
$id_ortu = $_POST["id_ortu"];
$id_pegawai = $_POST["id_pegawai"];
$nisn = $_POST["nisn"];
$nama = $_POST["nama_siswa"];
$jk = $_POST["jk_siswa"];
$tmp_lahir = $_POST["tmp_lahir"];
$tgl_lahir = $_POST["tgl_lahir"];
$agama = $_POST["agama"];
$alamat = $_POST["alamat_siswa"];
$username = $_POST["username_s"];
$password = $_POST["password_s"];


$query = "UPDATE siswa SET id_ortu='$id_ortu', id_pegawai='$id_pegawai', nisn='$nisn', nama_siswa='$nama',
        jk_siswa='$jk', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', agama='$agama',
        alamat_siswa='$alamat', username_s='$username', password_s='$password'
        WHERE nis='$id'";

if(mysqli_query($koneksi,$query)){
    echo 'berhasil';
}
    // header("location: ../index2.php");
// } else {
//     echo "Gagal";
// }

mysqli_close($koneksi);
?>
<?php
include_once '../koneksi.php';
//session_start();
$error='';
if(!empty($_POST["username"]) || !empty($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $log_siswa = "SELECT*FROM siswa where username='$username' and password='$password'";
    $log_guru = "SELECT*FROM guru where username_guru='$username' and password_guru='$password'";
    $log_pegawai = "SELECT*FROM pegawai where username_pegawai='$username' and password_pegawai='$password'";
    $result_s=mysqli_query($koneksi,$log_siswa);
    $result_g=mysqli_query($koneksi,$log_guru);
    $result_p=mysqli_query($koneksi,$log_pegawai);
    $q_siswa = mysqli_fetch_array($result_s);
    $q_guru = mysqli_fetch_array($result_g);
    $q_pegawai = mysqli_fetch_array($result_p);
    $username_s = $q_siswa['username'];
    $username_guru = $q_guru['username_guru'];
    $username_pegawai = $q_pegawai['username_pegawai'];
    if($username==$username_s){
        session_start();
        header("location:../pages/siswa/indexsw.php");
    }
    else if($username==$username_guru){
        session_start();
        header("location:../pages/gmapel/indexgmapel.php");
    }
    else if($username==$username_pegawai){
        session_start();
        header("location:../pages/pegawai/indexpgw.php");
    }
    else{
        echo"<script>alert('Username atau Password SALAH!')</script>";
    }
}
?>
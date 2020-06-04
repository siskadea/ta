<?php
include_once '../koneksi.php';
$error='';
if(!empty($_POST["username"]) || !empty($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $log_siswa = "SELECT*FROM siswa where username_s='$username' and password_s='$password'";
    $log_pegawai = "SELECT*FROM pegawai where username_pegawai='$username' and password_pegawai='$password'";
    $log_guru = "SELECT*FROM guru where username_g='$username' and password_g='$password'";

    $result_s=mysqli_query($koneksi,$log_siswa);
    $result_p=mysqli_query($koneksi,$log_pegawai);
    $result_g=mysqli_query($koneksi,$log_guru);
    
    $q_siswa = mysqli_fetch_array($result_s);
    $q_pegawai = mysqli_fetch_array($result_p);
    $q_guru = mysqli_fetch_array($result_g);
    
    $username_s = $q_siswa['username_s'];
    $password_s = $q_siswa['password_s'];
    $nama_siswa = $q_siswa['nama_siswa'];
    $nis=$q_siswa['nis'];

    $username_pegawai = $q_pegawai['username_pegawai'];
    $password_pegawai = $q_pegawai['password_pegawai'];
    $nama_pegawai = $q_pegawai['nama_pegawai'];
    $nip_pegawai = $q_pegawai['nip_pegawai'];
    
    $username_g = $q_guru['username_g'];
    $password_g = $q_guru['password_g'];
    $nama_guru = $q_guru['nama_guru'];
    $nip_guru=$q_guru['nip_guru'];
    $jabatan = $q_guru['id_jabatan'];

    if($username==$username_s){
        session_start();
        $_SESSION['username_s']=$username;
        $_SESSION['nama_siswa']=$nama_siswa;
        $_SESSION['nis']=$nis;
        $_SESSION['password_s']=$password_s;
        header("location:../pages/siswa/indexsw.php");
    }
    else if($username==$username_pegawai){
        session_start();
        $_SESSION['username_pegawai']=$username;
        $_SESSION['nama_pegawai']=$nama_pegawai;
        $_SESSION['nip_pegawai']=$nip_pegawai;
        $_SESSION['password_pegawai']=$password_pegawai;
        header("location:../pages/pegawai/indexpgw.php");
    }
    else if($username==$username_g){
        if($jabatan==JBT01){
            session_start();
            $_SESSION['username_g']=$username;
            $_SESSION['nama_guru']=$nama_guru;
            $_SESSION['nip_guru']=$nip_guru;
            $_SESSION['password_g']=$password_g;
            $_SESSION['id_jabatan']=$jabatan;
            header("location:../pages/kepsek/indexkepsek.php");
        }
        else if($jabatan===JBT02){
            session_start();
            $_SESSION['username_g']=$username;
            $_SESSION['nama_guru']=$nama_guru;
            $_SESSION['nip_guru']=$nip_guru;
            $_SESSION['password_g']=$password_g;
            $_SESSION['id_jabatan']=$jabatan;
            header("location:../pages/waku/indexwaku.php");
        }
        else if($jabatan==JBT03){
            session_start();
            $_SESSION['username_g']=$username;
            $_SESSION['nama_guru']=$nama_guru;
            $_SESSION['nip_guru']=$nip_guru;
            $_SESSION['password_g']=$password_g;
            $_SESSION['id_jabatan']=$jabatan;
            header("location:../pages/wakel/indexwakel.php");
        }
        else if($jabatan==JBT04){
            session_start();
            $_SESSION['username_g']=$username;
            $_SESSION['nama_guru']=$nama_guru;
            $_SESSION['nip_guru']=$nip_guru;
            $_SESSION['password_g']=$password_g;
            $_SESSION['id_jabatan']=$jabatan;
            header("location:../pages/gbp/indexgbp.php");
        }
        else if($jabatan==JBT05){
            session_start();
            $_SESSION['username_g']=$username;
            $_SESSION['nama_guru']=$nama_guru;
            $_SESSION['nip_guru']=$nip_guru;
            $_SESSION['password_g']=$password_g;
            $_SESSION['id_jabatan']=$jabatan;
            header("location:../pages/gmapel/indexgmapel.php");
        }
        else{
            echo "Kesalahan Login";
        }
    }
    else{
        echo"<script>alert('Username atau Password salah!')</script>";
    }
}
else{
    echo"Username atau Password belum diisi!";
}
?>
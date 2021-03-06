<!DOCTYPE html>
<?php
  include_once '../../../koneksi.php';
  session_start();
  $name = $_SESSION['nama_pegawai'];
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pegawai</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- logout -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name?></span>
                        <img class="img-profile rounded-circle" src="../../../dist/img/avatar5.png" height="23px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIAKADK13</span>
            </a>
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview menu-open">
                            <a href="../indexpgw.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="indexpgw.php" class="nav-link active">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>Data<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item active">
                                    <a href="../datapgw.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pegawai</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../datagr.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../datasw.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Siswa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../indexpgw.php">SiakadK13</a></li>
                                <li class="breadcrumb-item active"><a href="../datasw.php">Data Siswa</a></li>
                                <li class="breadcrumb-item active">Update</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">

                            <!-- general form elements disabled -->
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Update Data Siswa</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                $id =$_GET["id"];
                $query = "SELECT * FROM siswa WHERE nis='$id'";
                $result = mysqli_query($koneksi, $query);    
                if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                ?>
                                    <form role="form" action="../controller/updateSiswa.php" method="POST">
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <input type="hidden" name="nis" value="<?php echo $row["nis"]; ?>">
                                                <div class="form-group">
                                                    <label>NIS</label>
                                                    <input type="text" class="form-control" name="nis"
                                                        value="<?php echo $row["nis"]; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>ID Ortu</label>
                                                    <input type="text" class="form-control" name="id_ortu"
                                                        value="<?php echo $row["id_ortu"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>ID Pegawai</label>
                                                    <input type="text" class="form-control" name="id_pegawai"
                                                        value="<?php echo $row["id_pegawai"]; ?>">
                                                </div>
                                            </div>
                                        </div><!-- row 2 -->
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>NISN</label>
                                                    <input type="text" class="form-control" name="nisn"
                                                        value="<?php echo $row["nisn"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control" name="nama_siswa"
                                                        value="<?php echo $row["nama_siswa"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" name="jk_siswa"
                                                        value="<?php echo $row["jk_siswa"]; ?>">
                                                        <option>Laki-laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <select class="form-control" name="agama"
                                                        value="<?php echo $row["agama"]; ?>">
                                                        <option>Islam</option>
                                                        <option>Kristen</option>
                                                        <option>Katolik</option>
                                                        <option>Hindu</option>
                                                        <option>Budha</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tmp_lahir"
                                                        value="<?php echo $row["tmp_lahir"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Tanggal lahir</label>
                                                    <input type="date" class="form-control" name="tgl_lahir"
                                                        value="<?php echo $row["tgl_lahir"]; ?>">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="username_s"
                                                        value="<?php echo $row["username_s"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" name="password_s"
                                                        value="<?php echo $row["password_s"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input type="textarea" class="form-control" name="alamat_siswa"
                                                        value="<?php echo $row["alamat_siswa"]; ?>">
                                                    <!-- <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea> -->
                                                </div>
                                            </div>
                                        </div><!-- row 4 -->
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-warning" name="btn-update"
                                                value="Update">
                                            <a class="btn btn-danger" href="../datasw.php">Batal</a>
                                        </div>
                                    </form>
                                    <?php } mysqli_close($koneksi); ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="#">SiakadK13</a>.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
    </script>
</body>

</html>
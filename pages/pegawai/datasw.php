<!DOCTYPE html>
<?php
  include_once '../../koneksi.php';
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
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
                        <img class="img-profile rounded-circle" src="../../dist/img/avatar5.png" height="23px">
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
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
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
                                <a href="datapgw.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pegawai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="datagr.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Guru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="datasw.php" class="nav-link active">
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
              <li class="breadcrumb-item"><a href="datasw.php">SiakadK13</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <!-- <a href="datagr.php" class="btn btn-success" type="button">Cancel</a> -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Siswa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIS</th>
                  <th>NISN</th>
                  <th>Nama Siswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Agama</th>
                  <th>Nama Ayah</th>
                  <th>Nama Ibu</th>
                  <th>Pekerjaan Ayah</th>
                  <th>Pekerjaan Ibu</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <!-- <a class="btn btn-primary btn-sm" href="tambahSensorF.php">
                <span class="glyphicon glyphicon-plus">Add</span>
                </a> -->
                <br>
                <?php
                $query = "SELECT s.nis, s.nisn, s.nama_siswa, s.jk_siswa, s.tmp_lahir, s.tgl_lahir,
                          s.agama, s.alamat_siswa, s.username_s, s.password_s, 
                          o.nama_ayah, o.nama_ibu, o.pekerjaan_ayah, o.pekerjaan_ibu
                          FROM siswa s INNER JOIN ortu o
                          ON s.id_ortu=o.id_ortu";
                $result = mysqli_query($koneksi,$query);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['nis']."</td>";
                        echo "<td>".$row['nisn']."</td>";
                        echo "<td>".$row['nama_siswa']."</td>";
                        echo "<td>".$row['jk_siswa']."</td>";
                        echo "<td>".$row['tmp_lahir']."</td>";
                        echo "<td>".$row['tgl_lahir']."</td>";
                        echo "<td>".$row['agama']."</td>";
                        echo "<td>".$row['nama_ayah']."</td>";
                        echo "<td>".$row['nama_ibu']."</td>";
                        echo "<td>".$row['pekerjaan_ayah']."</td>";
                        echo "<td>".$row['pekerjaan_ibu']."</td>";
                        echo "<td>".$row['username_s']."</td>";
                        echo "<td>".$row['password_s']."</td>";
                        echo "<td>".$row['alamat_siswa']."</td>";
                        echo "<td>";
                        echo "<a  href='form/tambahSwF.php'>
                            <span class='glyphicon glyphicon-plus'>Add</span>
                            </a>";
						            echo "<a  href='form/updateSiswaF.php?id=".$row["nis"]."'>
                            <span class='glyphicon glyphicon-plus'>Update</span>
                            </a>";
                        echo "   ";
                        echo "<a  href='controller/deleteSiswa.php?id=".$row["nis"]."'>
                            <span class='glyphicon glyphicon-plus'>Delete</span></a>";
                        echo "<a  href='dataortu.php'>
                        <span class='glyphicon glyphicon-plus'>OrangTua</span>
                        </a>";
                        echo "</td>";
                        
                    }
                }
            ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" untuk keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="../../proses/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

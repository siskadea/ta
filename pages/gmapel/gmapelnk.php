<!DOCTYPE html>
<?php
  include_once '../../koneksi.php';
  // session_start();
  // $name = $_SESSION['nama_pegawai'];
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Guru Mapel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="indexgmapel.php" class="nav-link">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- logout -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name?></span> -->
                        <img class="img-profile rounded-circle" src="../../dist/img/avatar5.png" height="23px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
    <a href="index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIAKADK13</span>
            </a>
    <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview menu-open">
                            <a href="indexgmapel.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="indexgmapel.php" class="nav-link active">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>Nilai<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="gmapelnp.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengetahuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="gmapelnk.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Keterampilan</p>
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
            <h1>Nilai Keterampilan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="indexgmapel.php">Home</a></li>
              <li class="breadcrumb-item active">Nilai Keterampilan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nilai Keterampilan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Mata Pelajaran</th>
                  <th>KKM</th>
                  <th>Nilai</th>
                  <th>Predikat</th>
                  <th>Deskripsi</th>
                  <th>Tahun Ajaran</th>
                  <th>Semester</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
               <!-- <a class="btn btn-primary btn-sm" href="tambahSensorF.php">
                <span class="glyphicon glyphicon-plus"></span>
                </a> -->

                <br>
                <?php
                $query = "SELECT nk.id_nk, nk.nis, nk.kkm_nk, nk.nilai_nk, nk.predikat_nk, nk.tahun_ajaran,
                          nk.semester, m.nama_mapel, d.deskripsi, s.nama_siswa
                          FROM nilai_keterampilan nk JOIN mapel m ON nk.id_mapel=m.id_mapel
                          JOIN deskripsi_nilai d ON nk.id_deskripsi=d.id_deskripsi
                          JOIN siswa s ON nk.nis=s.nis";
                $result = mysqli_query($koneksi,$query);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td><h6>".$row['nis']."</h6></td>";
                        echo "<td><h6>".$row['nama_siswa']."</h6></td>";
                        echo "<td><h6>".$row['nama_mapel']."</h6></td>";
                        echo "<td><h6>".$row['kkm_nk']."</h6></td>";
                        echo "<td><h6>".$row['nilai_nk']."</h6></td>";
                        echo "<td><h6>".$row['predikat_nk']."</h6></td>";
                        echo "<td><h6>".$row['deskripsi']."</h6></td>";
                        echo "<td><h6>".$row['tahun_ajaran']."</h6></td>";
                        echo "<td><h6>".$row['semester']."</h6></td>";
                        echo "<td>";
                        echo "<a  href='form/tambahnkF.php'>
                            <span class='glyphicon glyphicon-plus'>Add</span>
                            </a>";
            						echo "<a  href='form/updatenkF.php?id=".$row["id_nk"]."'>
                            <span class='glyphicon glyphicon-plus'>Update</span>
                            </a>";
                        echo "   ";
                        echo "<a  href='controller/deletenk.php?id=".$row["id_nk"]."'>
                            <span class='glyphicon glyphicon-plus'>Delete</span></a>";
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


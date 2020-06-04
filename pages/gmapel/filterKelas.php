<!DOCTYPE html>
<?php
  //include_once '../../koneksi.php';
  // session_start();
  // $name = $_SESSION['nama_pegawai'];
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Guru Mapel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
            <?php
include '../../koneksi.php';
$kls = $_POST["x"];
echo $kls;
if (isset($_POST["x"])) {
            // $qw="SELECT ";
            $output = '';
            $query = "SELECT s.nama_siswa, s.nis
            FROM anggota_kelas m 
            JOIN siswa s ON s.nis = m.nis
            JOIN kelas k ON k.id_kelas = m.id_kelas
          WHERE k.nama_kelas = '".$_POST["x"]."'";
            $result = mysqli_query($koneksi, $query);
            $output .= '
                      <table>
                      <thead>
                      <tr>
                      <th>NIS</th>
                      <th>NAMA</th>
                      </tr>
                      </thead>
            ';
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '
                                <tbody>
                                <tr>
                                <td>' . $row["nis"] . '</td>
                                <td>' . $row["nama_siswa"] . '</td>
                                </tr>
                                </tbody>
                            ';
                }
            } else {
                $output .= '
                            <tr>
                            <td>No Order Found</td>
                            </tr>
                ';
            }
            $output .= '</table>';
            echo $output;
    }
?>


                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <br>
                        <?php
                        if (isset($_POST["x"])) {
                        $query = "SELECT s.nama_siswa, s.nis
                        FROM anggota_kelas m 
                        JOIN siswa s ON s.nis = m.nis
                        JOIN kelas k ON k.id_kelas = m.id_kelas
                        WHERE k.nama_kelas = '".$_POST["x"]."'";
                        $result = mysqli_query($koneksi,$query);
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>".$row['nis']."</td>";
                                echo "<td>".$row['nama_siswa']."</td>";
                                // echo "</tr>";
                            }
                        }}  
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

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
    $(function() {
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
<html>
<?php
include_once '../../../koneksi.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Guru Mapel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<body>

    <!-- Main content -->
            <!-- <section class="content"> -->
                <!-- <div class="row">
                    <div class="col-12"> -->
                        <!-- <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Siswa</h3>
                            </div>
                            <div class="card-body"> -->
                            <?php 
                            $data = '
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
                                    </thead>';
                                    $query = "SELECT s.nis, s.nisn, s.nama_siswa, s.jk_siswa, s.tmp_lahir, s.tgl_lahir,
                                        s.agama, s.alamat_siswa, s.username_s, s.password_s, 
                                        o.nama_ayah, o.nama_ibu, o.pekerjaan_ayah, o.pekerjaan_ibu
                                        FROM siswa s INNER JOIN ortu o
                          ON s.id_ortu=o.id_ortu";
                $result = mysqli_query($koneksi,$query);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $data .=
                        '<tbody>
                        <tr>
                        <td>'.$row['nis'].'</td>
                        <td>'.$row['nisn'].'</td>
                        <td>'.$row['nama_siswa'].'</td>
                        <td>'.$row['jk_siswa'].'</td>
                        <td>'.$row['tmp_lahir'].'</td>
                        <td>'.$row['tgl_lahir'].'</td>
                        <td>'.$row['agama'].'</td>
                        <td>'.$row['nama_ayah'].'</td>
                        <td>'.$row['nama_ibu'].'</td>
                        <td>'.$row['pekerjaan_ayah'].'</td>
                        <td>'.$row['pekerjaan_ibu'].'</td>
                        <td>'.$row['username_s'].'</td>
                        <td>'.$row['password_s'].'</td>
                        <td>'.$row['alamat_siswa'].'</td>
                        <td>
                            <button class="btn btn-warning mr-2" onclick=updateSwForm('.$row["nis"].')>Update</button>
                            <button class="btn btn-danger" onclick=deleteSw('.$row["nis"].')>Hapus</button>
                        </td>
                        ';

                    }
                }
            ?>
                    </tbody>
                        </tabel>
                    <!-- </div>
                        </div> -->
                     <!-- </div>
                </div>
            </section>
        </div>                 -->
                               
            <?php
echo $data;
mysqli_close($koneksi);
            ?>
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
    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>
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
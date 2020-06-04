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
</head>

<body>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-info" data-toggle="modal" data-target="#tambahNilaiForm">Tambah Nilai</button>
                <button class='btn btn-info' data-toggle='modal' data-target='#tambahNilaiForm'>+ N</button>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>LP</th>
                            <!-- <th>N-1</th>
                            <th>N-2</th>
                            <th>N-3</th>
                            <th>N-4</th>
                            <th>N-5</th>
                            <th>N-6</th>
                            <th>N-7</th>
                            <th>N-8</th>
                            <th>NH TS</th>
                            <th>NH AS</th>
                            <th>N-akhir</th> -->
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <br>
                        <?php
                    
                    if (isset($_POST["x"])) {
                        $query = "SELECT s.nama_siswa, s.nis, s.jk_siswa
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
                                echo "<td>".$row['jk_siswa']."</td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                // echo "<td><input type='text' class='form-control' name='nim' id='nim'/></td>";
                                
                                // echo "</tr>";
                            }   
                        }
                    }  
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Add Form Nilai Modal -->
    <div class="modal fade" id="tambahNilaiForm" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Nilai</h6>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <!-- <table id="contracts_tbl" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th data-sortable="true">LP</th>
                                    <th data-sortable="true">N-1</th>
                                    <th data-sortable="true">N-2</th>
                                    <th data-sortable="true">N-3</th>
                                    <th data-sortable="true">N-4</th>
                                    <th data-sortable="true">N-5</th>
                                    <th data-sortable="true">N-6</th>
                                    <th data-sortable="true">N-7</th>
                                    <th data-sortable="true">N8</th>
                                    <th data-sortable="true">HP TS</th>
                                    <th data-sortable="true">HP AS</th>

                                </tr>
                            </thead>

                            <tbody id="contracts_rows">
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                    <td>80</td>
                                    <td>80</td>
                                    <td>80</td>
                                    <td>80</td>
                                    <td>90</td>
                                    <td>80</td>
                                    <td>80</td>
                                    <td>80</td>
                                    <td>80</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                                <tr>
                                    <td>7001</td>
                                    <td>Asri Putri Dwi Gita Andini</td>
                                    <td>L</td>
                                </tr>
                            </tbody>
                        </table> -->
                        <table class="table table-bordered table-stripped">
                        <thead>
                            <th width="100px">NIM</th>
                            <th>Nama</th>
                            <th>LP</th>
                            <th width="500px">N-1</th><th width="500px">N-2</th><th width="500px">N-3</th>
                            <th width="500px">N-4</th><th width="500px">N-5</th><th width="500px">N-6</th>
                            <th width="500px">N-7</th><th>N-8</th><th>HP TS</th><th>HP AS</th> 
                        </thead>
                        <tr>
                            <td><?php 
                                $qw = "SELECT s.nis
                                FROM anggota_kelas m 
                                JOIN siswa s ON s.nis = m.nis
                                JOIN kelas k ON k.id_kelas = m.id_kelas
                                WHERE k.nama_kelas = '".$_POST["x"]."'";
                                $r= mysqli_query($koneksi,$qw);
                                $p=mysqli_fetch_array($r);
                                $nis=$p["nis"];
                                echo $nis;
                                ?></td>
                            <td><?php 
                                $qw = "SELECT s.nama_siswa
                                FROM anggota_kelas m 
                                JOIN siswa s ON s.nis = m.nis
                                JOIN kelas k ON k.id_kelas = m.id_kelas
                                WHERE k.nama_kelas = '".$_POST["x"]."'";
                                $r= mysqli_query($koneksi,$qw);
                                $p=mysqli_fetch_array($r);
                                $nama=$p["nama_siswa"];
                                echo $nama;
                                ?></td>
                            
                            <td><?php 
                                $qw = "SELECT s.jk_siswa
                                FROM anggota_kelas m 
                                JOIN siswa s ON s.nis = m.nis
                                JOIN kelas k ON k.id_kelas = m.id_kelas
                                WHERE k.nama_kelas = '".$_POST["x"]."'";
                                $r= mysqli_query($koneksi,$qw);
                                $p=mysqli_fetch_array($r);
                                $nama=$p["jk_siswa"];
                                echo $nama;
                                ?></td>
                            <td><input type="text" class="form-control" name="nama_mhs" id="nama_mhs" /></td>
                            <td><input type="text" class="form-control" name="jurusan" id="jurusan" /></td>
                            <td><input type="text" class="form-control" name="angkatan" id="angkatan" /></td>
                            <td><input type="text" class="form-control" name="angkatan" id="angkatan" /></td>
                            <td><input type="text" class="form-control" name="angkatan" id="angkatan" /></td>
                            <td><input type="text" class="form-control" name="angkatan" id="angkatan" /></td>
                            <td><input type="text" class="form-control" name="angkatan" id="angkatan" /></td>
                            <td><input type="text" class="form-control" name="angkatan" id="angkatan" /></td>
                            <td><input type="text" class="form-control" name="angkatan" id="angkatan" /></td>
                            <td><input type="text" class="form-control" name="angkatan" id="angkatan" /></td>
                        </tr>
                    </table> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" onclick="tambahMhs()">Tambah</button>
                </div>
            </div>
        </div>
    </div>


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
</body>

</html>
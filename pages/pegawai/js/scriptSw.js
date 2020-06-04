// Fungsi untuk menampilkan data mahasiswa dari database
function readRecords(){
    $.get("controller/readSw.php", {}, function (data, status) {
        $("#dataSw").html(data);
    });
}

// Fungsi untuk menambahkan data mahasiswa ke database
function tambahSw(){
    // Mendapatkan nilai dari form
    var nis_s = $("#nis").val();
    var id_ortu_s = $("#id_ortu").val();
    var id_pegawai_s = $("#id_pegawai").val();
    var nisn_s = $("#nisn").val();
    var nama_s = $("#nama_siswa").val();
    var jk_s = $("#jk_siswa").val();
    var agama_s = $("#agama").val();
    var tmp_s = $("#tmp_lahir").val();
    var tgl_s = $("#tgl_lahir").val();
    var alamat_s = $("#alamat_siswa").val();
    var username = $("#username_s").val();
    var password = $("#password_s").val();

    // Lakukan metode POST
    $.post("controller/tambahSw.php", {
        nis: nis_s,
        id_ortu: id_ortu_s,
        id_pegawai: id_pegawai_s,
        nisn: nisn_s,
        nama_siswa: nama_s,
        jk_siswa: jk_s,
        agama: agama_s,
        tmp_lahir: tmp_s,
        tgl_lahir: tgl_s,
        alamat_siswa: alamat_s,
        username_s: username,
        password_s: password,
        
    }, function (data, status) {
        if (data == 0) {
            alert("Siswa dengan NIS : "+nis+" sudah ada!");
            readRecords();
        } else {
            // Tutup popup modal
            $("#tambahSwForm").modal("hide");
            // muat ulang table data mahasiswa
            readRecords();
            // Hapus semua input di dalam popup modal
            $("#nis").val("");
            $("#id_ortu").val("");
            $("#id_pegawai").val("");
            $("#nisn").val("");
            $("#nama_siswa").val("");
            $("#jk_siswa").val("");
            $("#tmp_lahir").val("");
            $("#tgl_lahir").val("");
            $("#agama").val("");
            $("#alamat_siswa").val("");
            $("#username_s").val("");
            $("#password_s").val("");
        }
    });
}

// Fungsi untuk menghapus mahasiswa
// Parameter id digunakan untuk melakukan filter pada query Delete
function deleteSw(id){
    // Membuat dialog konfirmasi
    var conf = confirm("Apakah Anda yakin ingin menghapus data siswa ini ?");
    if (conf == true) {
        $.post("controller/deleteSw.php", {
                nis: id
            },
            function (data, status) {
                // muat ulang table data mahasiswa
                readRecords();
            }
        );
    }
}

// Function digunakan untuk mendapatkan data yang akan diisikan kedalam Form update
function updateSwForm(id){
    // hidden input
    $("#edit_nis").val(id);
    $.post("controller/updateSwForm.php", {
            nis: id
        },
        function (data, status) {
            if (data != 1) {
                // Dapatkan data JSON dari updateMhsForm.php
                var mhs = JSON.parse(data);
                // Datakan data sesuai dengan key pada JSON
                $("#edit_nis").val(mhs["nis"]);
                $("#edit_id_ortu").val(mhs["id_ortu"]);
                $("#edit_id_pegawai").val(mhs["id_pegawai"]);
                $("#edit_nisn").val(mhs["nisn"]);
                $("#edit_nama_siswa").val(mhs["nama_siswa"]);
                $("#edit_jk_siswa").val(mhs["jk_siswa"]);
                $("#edit_agama").val(mhs["agama"]);
                $("#edit_tmp_lahir").val(mhs["tmp_lahir"]);
                $("#edit_tgl_lahir").val(mhs["tgl_lahir"]);
                $("#edit_alamat_siswa").val(mhs["alamat_siswa"]);
                $("#edit_username_s").val(mhs["username_s"]);
                $("#edit_password_s").val(mhs["password_s"]);

                // tampilkan popup modal update form
                $("#updateSwForm").modal("show");
            } else {
                // handling jika data tidak ditemukan
                alert("Mahasiswa tidak ditemukan!");
            }
        }
    );
}

// Fungsi untuk melakukan update data di database
function updateSw(){
    // dapatkan nilai dari form
    var nis_s = $("#edit_nis").val();
    var id_ortu_s = $("#edit_id_ortu").val();
    var id_pegawai_s = $("#edit_id_pegawai").val();
    var nisn_s = $("#edit_nisn").val();
    var nama_s = $("#edit_nama_siswa").val();
    var jk_s = $("#edit_jk_siswa").val();
    var agama_s = $("#edit_agama").val();
    var tmp_s = $("#edit_tmp_lahir").val();
    var tgl_s = $("#edit_tgl_lahir").val();
    var alamat_s = $("#edit_alamat_siswa").val();
    var username = $("#edit_username_s").val();
    var password = $("#edit_password_s").val();


    // dapatkan nilai hidden value id_mhs
    // var nis = $("#edit_nis").val();

    // Update dengan metode post yang akan ditangani oleh file updateMhs.php
    $.post("controller/updateSw.php", {
        nis: nis_s,
        id_ortu: id_ortu_s,
        id_pegawai: id_pegawai_s,
        nisn: nisn_s,
        nama_siswa: nama_s,
        jk_siswa: jk_s,
        agama: agama_s,
        tmp_lahir: tmp_s,
        tgl_lahir: tgl_s,
        alamat_siswa: alamat_s,
        username_s: username,
        password_s: password,
        },
        function (data, status) {
            // Kosongkan inputan pada modal
            $("#edit_id_ortu").val();
            $("#edit_id_pegawai").val();
            $("#edit_nisn").val();
            $("#edit_nama_siswa").val();
            $("#edit_jk_siswa").val();
            $("#edit_agama").val();
            $("#edit_tmp_lahir").val();
            $("#edit_tgl_lahir").val();
            $("#edit_alamat_siswa").val();
            $("#edit_username_s").val();
            $("#edit_password_s").val()
            
            // sembunyikan modal pop-up
            $("#updateSwForm").modal("hide");
            
            // tampilkan ke table data mahasiswa
            readRecords();
        }
    );
}

// Fungsi yang akan dieksekusi otomatis jika halaman web sudah termuat seluruhnya
$(document).ready(function () {
    readRecords(); // calling function
});
-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 03:52 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siakadk13db`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `id_absensi` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `tgl_absen` date DEFAULT NULL,
  `status` enum('A','I','S') DEFAULT NULL,
  `tahun_ajar` date DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_nilai`
--

CREATE TABLE IF NOT EXISTS `deskripsi_nilai` (
  `id_deskripsi` int(11) NOT NULL,
  `predikat_deskripsi` varchar(5) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nip_guru` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `alamat_guru` text,
  `agama_guru` enum('Islam','Kristen','Katolik','Hindu','Budha') DEFAULT NULL,
  `no_telp_guru` varchar(20) DEFAULT NULL,
  `jk_guru` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tmp_lahir_guru` varchar(30) DEFAULT NULL,
  `tgl_lahir_guru` date DEFAULT NULL,
  `username_g` varchar(20) DEFAULT NULL,
  `password_g` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `id_jabatan`, `id_pegawai`, `nip_guru`, `nama_guru`, `alamat_guru`, `agama_guru`, `no_telp_guru`, `jk_guru`, `tmp_lahir_guru`, `tgl_lahir_guru`, `username_g`, `password_g`) VALUES
(1, 3, 1, '191335000901234567', 'Dina', 'Ds. Ngaringan, Kec. Gandusari, Kab. Blitar', 'Islam', '082132456123', 'Perempuan', 'Blitar', '1988-05-14', 'guru1', 'guru1'),
(2, 1, 1, '1919876789000109901', 'Ariii', 'MALANG', 'Islam', '087345123678', 'Laki-laki', 'BLITAR', '1980-05-02', 'guru24', 'guru24'),
(4, 1, 1, '199123459800020003', 'Umita', 'Jl. Simpang mendut no.11, Kota Malang', 'Islam', '082345123678', 'Perempuan', 'Malang', '1990-05-29', 'guru4', 'guru4');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Waka Kurikulum'),
(3, 'Wali Kelas'),
(4, 'Guru BP'),
(5, 'Guru Mapel');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menempati`
--

CREATE TABLE IF NOT EXISTS `menempati` (
  `id_menempati` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tahun_ajaran` date DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE IF NOT EXISTS `mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ekstra`
--

CREATE TABLE IF NOT EXISTS `nilai_ekstra` (
  `id_ne` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `nama_ekstra` varchar(50) DEFAULT NULL,
  `nilai` enum('SB','B','C','D') DEFAULT NULL,
  `keterangan` text,
  `tahun_ajaran` date DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_keterampilan`
--

CREATE TABLE IF NOT EXISTS `nilai_keterampilan` (
  `id_nk` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_deskripsi` int(11) DEFAULT NULL,
  `kkm_nk` int(11) DEFAULT NULL,
  `nilai_nk` int(3) DEFAULT NULL,
  `predikat_nk` enum('A','B','C','D') DEFAULT NULL,
  `tahun_ajaran` date DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pengetahuan`
--

CREATE TABLE IF NOT EXISTS `nilai_pengetahuan` (
  `id_np` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_deskripsi` int(11) DEFAULT NULL,
  `kkm_np` int(11) DEFAULT NULL,
  `nilai_np` int(3) DEFAULT NULL,
  `predikat_np` enum('A','B','C','D') DEFAULT NULL,
  `tahun_ajaran` date DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sikap`
--

CREATE TABLE IF NOT EXISTS `nilai_sikap` (
  `id_ns` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `id_deskripsi` int(11) DEFAULT NULL,
  `kategori_ns` enum('Spiritual','Sosial') DEFAULT NULL,
  `predikat_ns` enum('Sangat Baik','Baik','Cukup') DEFAULT NULL,
  `tahun_ajaran` date DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE IF NOT EXISTS `ortu` (
  `id_ortu` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(20) DEFAULT NULL,
  `pekerjaan_ibu` varchar(20) DEFAULT NULL,
  `alamat_ortu` text,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `id_pegawai`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `no_telp`) VALUES
(1, 1, 'Han', 'Elena', 'Polisi', 'Ibu rumah tangga', 'Pakisaji, Malang', '087912345098');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip_pegawai` varchar(20) DEFAULT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `alamat_pegawai` text,
  `agama_pegawai` enum('Islam','Kristen','Katolik','Hindu','Budha') DEFAULT NULL,
  `notelp_pegawai` varchar(20) DEFAULT NULL,
  `jk_pegawai` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tmp_lahir_pegawai` varchar(30) DEFAULT NULL,
  `tgl_lahir_pegawai` date DEFAULT NULL,
  `username_pegawai` varchar(20) DEFAULT NULL,
  `password_pegawai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip_pegawai`, `nama_pegawai`, `alamat_pegawai`, `agama_pegawai`, `notelp_pegawai`, `jk_pegawai`, `tmp_lahir_pegawai`, `tgl_lahir_pegawai`, `username_pegawai`, `password_pegawai`) VALUES
(1, '191234000100199111', 'Karita', 'Jl. Ikan piranha no.11 Kota Malang', 'Islam', '087123456123', 'Perempuan', 'Malang', '1987-05-26', 'pgw1', 'pgw1'),
(3, '199179471071290001', 'Nuha', 'Jl. Pisang kipas', 'Islam', '089123098234', 'Laki-laki', 'Blitar', '2020-05-14', 'pgw3', 'pgw3');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE IF NOT EXISTS `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `tahun_ajar` date DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE IF NOT EXISTS `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `jenis` enum('Akademik','Non-Akademik') DEFAULT NULL,
  `ket_prestasi` mediumtext,
  `tgl_prestasi` date DEFAULT NULL,
  `tahun_ajaran` date DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(11) NOT NULL,
  `id_ortu` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nisn` int(11) DEFAULT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `jk_siswa` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha') DEFAULT NULL,
  `alamat_siswa` text,
  `username_s` varchar(20) DEFAULT NULL,
  `password_s` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id_ortu`, `id_pegawai`, `nisn`, `nama_siswa`, `jk_siswa`, `tmp_lahir`, `tgl_lahir`, `agama`, `alamat_siswa`, `username_s`, `password_s`) VALUES
(7123, 1, 1, 1021345678, 'Arita', 'Perempuan', 'Malang', '2006-05-15', 'Islam', 'Jl. Terusan simpang borobudur no. 6, Kota Malang', '07123', '07123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
 ADD PRIMARY KEY (`id_absensi`), ADD UNIQUE KEY `absensi_pk` (`id_absensi`), ADD KEY `fk_absensi_reference_siswa` (`nis`);

--
-- Indexes for table `deskripsi_nilai`
--
ALTER TABLE `deskripsi_nilai`
 ADD PRIMARY KEY (`id_deskripsi`), ADD UNIQUE KEY `deskripsi_nilai_pk` (`id_deskripsi`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`id_guru`), ADD UNIQUE KEY `guru_pk` (`id_guru`), ADD KEY `fk_guru_reference_jabatan` (`id_jabatan`), ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`), ADD UNIQUE KEY `kelas_pk` (`id_kelas`), ADD KEY `fk_kelas_reference_guru` (`id_guru`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
 ADD PRIMARY KEY (`id_mapel`), ADD UNIQUE KEY `mapel_pk` (`id_mapel`);

--
-- Indexes for table `menempati`
--
ALTER TABLE `menempati`
 ADD PRIMARY KEY (`id_menempati`), ADD KEY `menempati_fk` (`id_kelas`), ADD KEY `menempati2_fk` (`nis`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
 ADD PRIMARY KEY (`id_mengajar`), ADD KEY `mengajar_fk` (`id_mapel`), ADD KEY `mengajar2_fk` (`id_guru`);

--
-- Indexes for table `nilai_ekstra`
--
ALTER TABLE `nilai_ekstra`
 ADD PRIMARY KEY (`id_ne`), ADD UNIQUE KEY `nilai_ekstra_pk` (`id_ne`), ADD KEY `fk_nilai_ek_reference_siswa` (`nis`);

--
-- Indexes for table `nilai_keterampilan`
--
ALTER TABLE `nilai_keterampilan`
 ADD PRIMARY KEY (`id_nk`), ADD UNIQUE KEY `nilai_keterampilan_pk` (`id_nk`), ADD KEY `fk_nilai_ke_reference_siswa` (`nis`), ADD KEY `fk_nilai_ke_reference_mapel` (`id_mapel`), ADD KEY `fk_nilai_ke_reference_deskrips` (`id_deskripsi`);

--
-- Indexes for table `nilai_pengetahuan`
--
ALTER TABLE `nilai_pengetahuan`
 ADD PRIMARY KEY (`id_np`), ADD UNIQUE KEY `nilai_pengetahuan_pk` (`id_np`), ADD KEY `fk_nilai_pe_reference_siswa` (`nis`), ADD KEY `fk_nilai_pe_reference_mapel` (`id_mapel`), ADD KEY `fk_nilai_pe_reference_deskrips` (`id_deskripsi`);

--
-- Indexes for table `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
 ADD PRIMARY KEY (`id_ns`), ADD UNIQUE KEY `nilai_sikap_pk` (`id_ns`), ADD KEY `fk_nilai_si_reference_deskrips` (`id_deskripsi`), ADD KEY `fk_nilai_si_reference_siswa` (`nis`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
 ADD PRIMARY KEY (`id_ortu`), ADD UNIQUE KEY `ortu_pk` (`id_ortu`), ADD KEY `fk_ortu_reference_pegawai` (`id_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`id_pegawai`), ADD UNIQUE KEY `pegawai_pk` (`id_pegawai`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
 ADD PRIMARY KEY (`id_pelanggaran`), ADD UNIQUE KEY `pelanggaran_pk` (`id_pelanggaran`), ADD KEY `fk_pelangga_reference_siswa` (`nis`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
 ADD PRIMARY KEY (`id_prestasi`), ADD UNIQUE KEY `prestasi_pk` (`id_prestasi`), ADD KEY `fk_prestasi_reference_siswa` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nis`), ADD UNIQUE KEY `siswa_pk` (`nis`), ADD KEY `fk_siswa_reference_ortu` (`id_ortu`), ADD KEY `fk_siswa_reference_pegawai` (`id_pegawai`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
ADD CONSTRAINT `fk_absensi_reference_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
ADD CONSTRAINT `fk_guru_reference_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
ADD CONSTRAINT `fk_kelas_reference_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `menempati`
--
ALTER TABLE `menempati`
ADD CONSTRAINT `fk_menempat_menempati_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
ADD CONSTRAINT `fk_menempat_menempati_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
ADD CONSTRAINT `fk_mengajar_mengajar2_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
ADD CONSTRAINT `fk_mengajar_mengajar_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `nilai_ekstra`
--
ALTER TABLE `nilai_ekstra`
ADD CONSTRAINT `fk_nilai_ek_reference_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `nilai_keterampilan`
--
ALTER TABLE `nilai_keterampilan`
ADD CONSTRAINT `fk_nilai_ke_reference_deskrips` FOREIGN KEY (`id_deskripsi`) REFERENCES `deskripsi_nilai` (`id_deskripsi`),
ADD CONSTRAINT `fk_nilai_ke_reference_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
ADD CONSTRAINT `fk_nilai_ke_reference_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `nilai_pengetahuan`
--
ALTER TABLE `nilai_pengetahuan`
ADD CONSTRAINT `fk_nilai_pe_reference_deskrips` FOREIGN KEY (`id_deskripsi`) REFERENCES `deskripsi_nilai` (`id_deskripsi`),
ADD CONSTRAINT `fk_nilai_pe_reference_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
ADD CONSTRAINT `fk_nilai_pe_reference_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
ADD CONSTRAINT `fk_nilai_si_reference_deskrips` FOREIGN KEY (`id_deskripsi`) REFERENCES `deskripsi_nilai` (`id_deskripsi`),
ADD CONSTRAINT `fk_nilai_si_reference_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `ortu`
--
ALTER TABLE `ortu`
ADD CONSTRAINT `fk_ortu_reference_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
ADD CONSTRAINT `fk_pelangga_reference_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
ADD CONSTRAINT `fk_prestasi_reference_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
ADD CONSTRAINT `fk_siswa_reference_ortu` FOREIGN KEY (`id_ortu`) REFERENCES `ortu` (`id_ortu`),
ADD CONSTRAINT `fk_siswa_reference_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

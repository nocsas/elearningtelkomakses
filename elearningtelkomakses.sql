-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2020 pada 08.25
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearningtelkomakses`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_div` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `pengampu` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_div`, `nama`, `pengampu`) VALUES
('HD', 'HELPDESK', ''),
('TK', 'TEKNISI', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` int(10) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `password_login` varchar(35) NOT NULL,
  `id_div` varchar(35) NOT NULL,
  `id_tim` varchar(10) NOT NULL,
  `jabatan` enum('Teknisi','Helpdesk','Staff','Team Leader','Site Manager','Manager','Admin') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` enum('ISLAM','KRISTEN','HINDU','BUDHA','KONGHUCU','KATOLIK') NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_lengkap`, `password_login`, `id_div`, `id_tim`, `jabatan`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `email`, `no_hp`) VALUES
(20971000, 'ADJI TAUFIK', '64ba98188333cfacadcac8a490c47bf3', 'HD', '', 'Manager', 'TELKOM AKSES YOGYAKARTA', 'YOGYAKARTA', '2020-11-16', 'L', 'ISLAM', 'adjitaufik@telkomakses.co.id', '081234756100'),
(20971001, 'NILA WIJAYA', '0b3c21c9236ea78eae9c1bd603dcb9a4', 'HD', '', 'Site Manager', 'TELKOM AKSES YOGYAKARTA', 'SLEMAN', '2020-11-16', 'P', 'ISLAM', 'nilawijaya@telkomakses.co.id', '081234756101'),
(20971002, 'RENO JOYO', '5325caaf64eed1bbad21a16d5c23a4c8', 'HD', 'HDA', 'Team Leader', 'TELKOM AKSES YOGYAKARTA', 'SLEMAN', '2020-11-16', 'L', 'ISLAM', 'renojoyo@telkomakses.co.id', '081846532435'),
(20971003, 'MAMAN SURYA', '742885b324f4a6691a71338527e83bca', 'HD', 'HDP', 'Team Leader', 'TELKOM AKSES YOGYAKARTA', 'YOGYAKARTA', '2020-11-16', 'L', 'ISLAM', 'mamansurya@telkomakses.co.id', '081846532764'),
(20971004, 'LILIK SURYANI', 'fe683be31deae0afa01fdeb79c1aef8b', 'HD', 'HDA', 'Helpdesk', 'TELKOM AKSES YOGYAKARTA', 'BANTUL', '2020-11-16', 'P', 'ISLAM', 'liliksuryani@telkomakses.co.id', '081846532700'),
(20971005, 'DINA RESTU AJI', 'd4928a4c54827591d87326a41a1c5c5b', 'HD', 'HDA', 'Helpdesk', 'TELKOM AKSES YOGYAKARTA', 'SLEMAN', '2020-11-16', 'P', 'ISLAM', 'dinarestuaji@gmail.com', '081846532400'),
(20971006, 'RIYAN AJI', 'dc76a49ba112d1797e0adf43c37fec78', 'HD', 'HDA', 'Helpdesk', 'TELKOM AKSES YOGYAKARTA', 'SLEMAN', '2020-11-16', 'L', 'ISLAM', 'riyanaji@telkomakses.co.id', '081846532400'),
(20971007, 'RISMA MARWAH', '497e712cc7c58daf87288bd59a9a5e86', 'HD', 'HDP', 'Helpdesk', 'TELKOM AKSES YOGYAKARTA', 'BANTUL', '2020-11-16', 'P', 'ISLAM', 'rismamarwah@telkomakses.co.id', '081846532410'),
(20971008, 'RIRIN SURYANI', '3b9de6e7167b729193212574de195987', 'HD', 'HDP', 'Helpdesk', 'TELKOM AKSES YOGYAKARTA', 'YOGYAKARTA', '2020-11-16', 'P', 'ISLAM', 'ririnsuryani@telkomakses.co.id', '081000000000'),
(20971009, 'SURYA ADI TAMA', '94145ba91d8b530a2ff1755b9e93c6ee', 'HD', 'HDP', 'Helpdesk', 'TELKOM AKSES YOGYAKARTA', 'SLEMAN', '2020-11-16', 'L', 'ISLAM', 'suryaaditama@telkomakses.co.id', '081846532411'),
(20971108, 'DWI SASONGKO MUKTI', 'ab438322a3c3caacfd4909d1cb1c2644', '', '', 'Admin', 'CANDIBINANGUN PAKEM SLEMAN', 'SLEMAN', '1997-11-04', 'L', 'ISLAM', 'dwisasongkomukti@gmail.com', '085743234760');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_kom` varchar(10) NOT NULL,
  `id_file` varchar(10) NOT NULL,
  `status_kom` varchar(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nik` int(10) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_kom`, `id_file`, `status_kom`, `nama`, `nik`, `isi`) VALUES
('5fc7828c14', '5fc0f59a95', '5fc78', 'DWI SASONGKO MUKTI', 20971108, 'Semangat Pagi.........!!!!!!!!!!!!!!!!!'),
('5fc782c03b', '5fc0f59a95', '5fc78', 'SURYA ADI TAMA', 20971009, 'Pagi.....!!!! Pagi.....!!!! Pagi.....!!!!'),
('5fc782ed65', '5fc0f59a95', '5fc78', 'NILA WIJAYA', 20971001, 'Pagi.....!!!! Pagi.....!!!! Pagi.....!!!! ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_file` varchar(10) NOT NULL,
  `judul` varchar(35) NOT NULL,
  `id_div` varchar(25) NOT NULL,
  `id_tim` varchar(25) NOT NULL,
  `file` varchar(35) NOT NULL,
  `tgl_posting` varchar(35) NOT NULL,
  `pembuat` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_file`, `judul`, `id_div`, `id_tim`, `file`, `tgl_posting`, `pembuat`) VALUES
('5fc0f59a95', 'OPEN ONT ALU', 'HD', 'HDP', 'OPEN_ONT_ALU.pdf', '27-11-2020', 'DWI SASONGKO MUKTI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(10) NOT NULL,
  `id_tq` varchar(10) NOT NULL,
  `nik` int(15) NOT NULL,
  `benar` int(5) NOT NULL,
  `salah` int(5) NOT NULL,
  `jumlah_soal` int(5) NOT NULL,
  `nilai` int(5) NOT NULL,
  `waktu_mengerjakan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_tq`, `nik`, `benar`, `salah`, `jumlah_soal`, `nilai`, `waktu_mengerjakan`) VALUES
('5fb8906a67', '5fb268c416', 20971009, 1, 2, 3, 33, '21-11-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` varchar(10) NOT NULL,
  `id_tq` varchar(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `pil_a` text NOT NULL,
  `pil_b` text NOT NULL,
  `pil_c` text NOT NULL,
  `pil_d` text NOT NULL,
  `kunci` varchar(1) NOT NULL,
  `tgl_buat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `id_tq`, `pertanyaan`, `gambar`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `kunci`, `tgl_buat`) VALUES
('5fb269a3e0', '5fb268c416', 'Apa yang membuat proses validation gagal \"sn ont is not match\" ?', 'default.jpg', 'Data IP OLT antara di pelanggan dengan di sistem berbeda', 'Data PORT OLT antara di pelanggan dengan di sistem berbeda', 'Data Serial Number antara di pelanggan dengan di sistem berbeda', 'Data pelanggan di sistem hilang', 'C', '16-11-2020'),
('5fb26cad07', '5fb26b6f76', 'Langkah-langkah penggantian ONT ALU di pelanggan ?', 'default.jpg', 'Hapus configurasi ont lama - Lepas ont lama - Pasang ont baru - Config ont baru', 'Lepas ont lama - Hapus configurasi ont lama - Pasang ont baru - Config ont baru', 'Lepas ont lama - Hapus configurasi ont lama - Config ont baru - Pasang ont baru', 'Lepas ont lama - Config ont baru  - Hapus configurasi ont lama - Config ont baru - Pasang ont baru', 'A', '16-11-2020'),
('5fb62edb12', '5fb268c416', 'fdsg', '5fb62edb12621.png', 'fdsgfgs', 'dfsa', 'dsaf', 'sdaf', 'B', '19-11-2020'),
('5fb62eea0b', '5fb268c416', 'fdgssfdg', 'default.jpg', 'sdfa', 'dafs', 'sdf', 'gfadsf', 'C', '19-11-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim`
--

CREATE TABLE `tim` (
  `id_tim` varchar(25) NOT NULL,
  `id_div` varchar(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `pengampu` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tim`
--

INSERT INTO `tim` (`id_tim`, `id_div`, `nama`, `pengampu`) VALUES
('HDA', 'HD', 'HELPDESK ASSURENCE', 'RENO JOYO'),
('HDP', 'HD', 'HELPDESK PROVISIONING & MIGRATION', 'MAMAN SURYA'),
('TKA', 'TK', 'TEKNISI ASSURENCE', ''),
('TKP', 'TK', 'TEKNISI PROVISIONING & MIGRATION', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topik_quiz`
--

CREATE TABLE `topik_quiz` (
  `id_tq` varchar(10) NOT NULL,
  `judul` varchar(35) NOT NULL,
  `id_div` varchar(25) NOT NULL,
  `id_tim` varchar(25) NOT NULL,
  `tgl_buat` varchar(10) NOT NULL,
  `pembuat` varchar(35) NOT NULL,
  `batas_mengerjakan` varchar(10) NOT NULL,
  `info` text NOT NULL,
  `terbit` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `topik_quiz`
--

INSERT INTO `topik_quiz` (`id_tq`, `judul`, `id_div`, `id_tim`, `tgl_buat`, `pembuat`, `batas_mengerjakan`, `info`, `terbit`) VALUES
('5fb268c416', ' FLOW VALIDATION PROVISIONING ', 'HD', 'HDP', '26-11-2020', 'NILA WIJAYA', '2020-12-12', 'solid.. speed.. smart', 'Y'),
('5fb26b6f76', ' PENANGANAN GANGGUAN OLT ALU ', 'HD', 'HDA', '26-11-2020', 'NILA WIJAYA', '2020-12-12', 'solid.. speed.. smart', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_div`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_div` (`id_div`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_kom`),
  ADD KEY `id_file` (`id_file`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_div` (`id_div`),
  ADD KEY `id_tim` (`id_tim`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_tq` (`id_tq`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD KEY `id_tq` (`id_tq`);

--
-- Indeks untuk tabel `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`),
  ADD KEY `id_div` (`id_div`);

--
-- Indeks untuk tabel `topik_quiz`
--
ALTER TABLE `topik_quiz`
  ADD PRIMARY KEY (`id_tq`),
  ADD KEY `id_div` (`id_div`),
  ADD KEY `id_tim` (`id_tim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 15. Januari 2017 jam 14:27
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id_Admin` char(4) NOT NULL DEFAULT '',
  `Password` char(8) NOT NULL,
  PRIMARY KEY (`Id_Admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Id_Admin`, `Password`) VALUES
('K00', 'Kepsek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` char(2) NOT NULL,
  `Nama_kelas` char(9) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `Nama_kelas`) VALUES
('A1', 'Nol Kecil'),
('B1', 'Nol Besar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `No_induk` char(5) NOT NULL,
  `Nama` varchar(19) NOT NULL,
  `Jkel` char(1) DEFAULT NULL,
  `TTL` char(30) DEFAULT NULL,
  `alamat` char(40) DEFAULT NULL,
  `Nama_ortu` varchar(15) DEFAULT NULL,
  `id_kelas` char(10) DEFAULT NULL,
  PRIMARY KEY (`No_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`No_induk`, `Nama`, `Jkel`, `TTL`, `alamat`, `Nama_ortu`, `id_kelas`) VALUES
('0001', 'Nadia Meilinda', 'P', ' Jember 09-02-2012', 'Jl Panjaitan 90 Jember', 'Mamad Sugianto', 'A1'),
('0002', 'Fina Darius', 'P', 'Jember 05-01-2012', 'Jl Sutoyo 98 Jember', 'Riki Efendi', 'A1'),
('0003', 'Failin Putri', 'P', 'Jember 05-02-2012', 'Jl Turnojoyo 92 jember', 'Rizki Tinus', 'A1'),
('0004', 'Nadiva Radia', 'P', 'Jember 24-03-2012', 'Jl Sutomo 27 Jember', 'Tono Suherman', 'A1'),
('0005', 'Tamara Susanti', 'P', 'Jember 08-03-2012', 'Jl Bangka 23 Jember', 'Heri Susanto', 'A1'),
('0006', 'Shinta Purnami', 'P', 'Jember 30-01-2012', 'Jl Jawa 23 Jember', 'Hari Setiyadi', 'A1'),
('0007', 'Puji Lestari', 'P', 'Jember 02-05-2012', 'Jl Kenanga 56 Jember', 'Budi Setiyawan', 'A1'),
('0008', 'Fani Kurnia', 'P', 'Jember 08-07-2012', 'Jl sumatra 67 Jember', 'Sugito', 'A1'),
('0009', 'Rismia Sandi', 'P', 'Jember 05-01-2012', 'Jl Turnojoyo 26 Jember', 'Saryo', 'A1'),
('0010', 'Ridanti Putri', 'P', 'Jember 09-08-2012', 'Jl Jawa 78 Jember', 'Miski', 'A1'),
('0011', 'Alvian Hermansyah', 'L', 'Jember 29-07-2012', 'Jl Sutoyo 87 Jember', 'Sugiono', 'A1'),
('0012', 'Rachmad Ilyas', 'L', 'Jember 12-07-2012', 'Jl Gajah Mada 09 Jember', 'Sujono', 'A1'),
('0013', 'Arif Habibi', 'L', 'Jember 08-04-2012', 'Jl Sutomo 27 Jember', 'Gita Hariaji', 'A1'),
('0014', 'Deni Aji', 'L', 'Jember 09-07-2012', 'Jl Sutoyo 43 Jember', 'Jono Sutono', 'A1'),
('0015', 'Gesang Purnomo', 'L', 'Jember 09-08-2012', 'Jl Jawa 23 Jember', 'Purnomo', 'A1'),
('0016', 'Mohammad Anang', 'L', 'Jember 12-04-2012', 'Jl Suprapto 67 Jember', 'Dadang', 'A1'),
('0017', 'Isyom Muhammad', 'L', 'Jember 23-04-2012', 'Jl Panjaitan 27 Jember', 'Danang', 'A1'),
('0018', 'Raka Gusti', 'L', 'Jember 28-06-2012', 'Jl Turnojoyo 35 Jember', 'Gusti Tono', 'A1'),
('0019', 'Khairil Hasan', 'L', 'Jember 02-12-2012', 'Jl Jubung 267 Jember', 'Hasan Muhammad', 'A1'),
('0020', 'Hisyam Radifan', 'L', 'Jember 09-11-2012', 'Jl Kahuripan 45 Jember', 'Agung Setiabudi', 'A1'),
('0021', 'Bachtiar Helga', 'L', 'Jember 09-10-2012', 'Jl Sumatra 76 Jember', 'Helga Kurniawan', 'A1'),
('0022', 'Davidi Septian', 'L', 'Jember 19-12-2012', 'Jl Sutoyo 67 Jember', 'Mayongga', 'A1'),
('0023', 'Mujib Hariyanto', 'L', 'Jember 18-04-2012', 'Jl Jawa 45 Jember', 'Yanto', 'A1'),
('0024', 'Bagas Surya', 'L', 'Jember 31-01-2012', 'Jl Sumatra 234 Jember', 'Zainudin', 'A1'),
('0025', 'Buyung Permadi', 'L', 'Jember 24-04-2012', 'Jl gajah Mada 29 Jember', 'Wajihudin', 'A1'),
('0026', 'Alvin Bimantoro', 'L', 'Jember 30-09-2011', 'Jl Sutoyo 38', 'Sugeng', 'A1'),
('0027', 'Bram Aditiya', 'L', 'Jember 09-06-2011', 'Jl Suprapto 36 Jember', 'Bramayanto', 'B1'),
('0028', 'Pras Kurniawan', 'L', 'Jember 04-09-2012', 'Jl Kahuripan 87 Jember', 'Munih Dian', 'B1'),
('0029', 'Candra Purwanto', 'L', 'Jember 19-08-2011', 'Jl Sumatra 78 Jember', 'Budi Raharjo', 'B1'),
('0030', 'Malik Muhammad', 'L', 'Jember 25-05-2011', 'Jl Jubung 67 Jember', 'Basofi', 'B1'),
('0031', 'Indra Lesmana', 'L', 'Jember 22-09-2011', 'Jl Kenanga 61 Jember', 'Ahmad Mauludi', 'B1'),
('0032', 'Wisnu Teuku', 'L', 'Jember 28-10-2011', 'Jl Sutomo 80 Jember', 'Noval', 'B1'),
('0033', 'Ardy Cahya', 'L', 'Jember 26-05-2011', 'Jl Turnojoyo 90 Jember', 'Tito Agung', 'B1'),
('0034', 'Gigeh Armayunanto', 'L', 'Jember 08-03-2012', 'Jl Kemayoran 64 Jember', 'Umarudin', 'B1'),
('0035', 'Edo Candra', 'L', 'Jember 27-12-2012', 'Jl Jawa 78 Jember', 'Firmansyah', 'B1'),
('0036', 'Umar Faruq', 'L', 'Jember 15-09-2012', 'Jl Halmahera 76 Jember', 'Widodo', 'B1'),
('0037', 'Iqbal Muhammad', 'L', 'Jember 27-09-2012', 'Jl Sumatra 12 Jember', 'Winarso', 'B1'),
('0038', 'Grace Imawati', 'P', 'Jember 19-08-2012', 'Jl Suprapto 78 Jember', 'Sukamto', 'B1'),
('0039', 'Zulia Aisyah', 'P', 'Jember 20-07-2012', 'Jl Sutoyo 82 Jember', 'Samsul Arifin', 'B1'),
('0040', 'Indah lani', 'P', 'Jember 06-07-2012', 'Jl Panjaitan 85 Jember', 'Dedi Hariayanto', 'B1'),
('0041', 'Hani Yuniar', 'P', 'Jember 04-04-2012', 'Jl Bangka 28 Jember', 'Adi Wibowo', 'B1'),
('0042', 'Wahyuning Tyas', 'P', 'Jember 02-03-2012', 'Jl kahuripa 89 Jember', 'Rizaldi', 'B1'),
('0043', 'Dewi Lestari', 'P', 'Jember 09-04-2012', 'Jl Sutiyo 90 Jember', 'Hadi Nugroho', 'B1'),
('0044', 'Jesica Amalia', 'P', 'Jember 08-03-2012', 'Jl Suprapto 62 Jember', 'Wahyu Firman', 'B1'),
('0045', 'Anisa karina', 'P', 'Jember 01-03-2012', 'Jl Jawa 87 jember', 'Edo Ardy', 'B1'),
('0046', 'Amel Dania', 'P', 'Jember 04-09-2012', 'Jl Sumtar 57 Jember', 'Bayu Amanda', 'B1'),
('0047', 'Nensi Wulandari', 'P', 'Jember 07-02-2012', 'Jl Jawa 85 Jember', 'Bambang', 'B1'),
('0048', 'Linda Fiya', 'P', 'Jember 06-01-2012', 'Jl Sumatra 78 Jember', 'Budiawan', 'B1'),
('0049', 'Sri Handayano', 'P', 'Jember 17-07-2012', 'Jl Bangka 83 Jember', 'Nanang Purwanto', ''),
('0050', 'Cinta Tamara2', 'P', 'Jember 2-08-2012', 'Jl Hayamuruk 87 Jember', 'Wahyudin', 'B1'),
('049', 'rewer', 'P', 'sdffds', 'dfsdf', 'sffds', 'A1'),
('fgdg', 'dfgdfg', 'd', 'dfg', 'dgdg', 'dfgdg', 'A1'),
('kjfjd', 'jbjkbjkbj', 'k', 'llknknl', 'nlknklnl', 'lnlnll', 'A1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biodata`
--

CREATE TABLE IF NOT EXISTS `tbl_biodata` (
  `No_induk` char(5) NOT NULL,
  `Nama` varchar(19) NOT NULL,
  `Jkel` varchar(1) NOT NULL,
  `TTL` char(30) NOT NULL,
  `alamat` char(40) NOT NULL,
  `Nama_ortu` varchar(15) NOT NULL,
  `id_kelas` char(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `ukuran` int(12) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`No_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`No_induk`, `Nama`, `Jkel`, `TTL`, `alamat`, `Nama_ortu`, `id_kelas`, `photo`, `ukuran`, `type`) VALUES
('0002', 'Ridanti Permadi', 'P', 'Jember 15 Maret 2011', 'Jl Kenanga 102 Jember', 'Permadi', 'Nol kecil', '01.15.17-2.jpg', 106698, 'image/jpeg'),
('0003', 'Arif Habibi', 'L', 'Jember 10 November 2011', 'Jl Hayam Muruk', 'Mayongga', 'Nol kecil', '01.15.17-11.jpg', 105267, 'image/jpeg'),
('0004', 'Dewi Lestiari', 'P', 'Jember 08 Februari 2011', 'Jl Jawa 89 Jember', 'Hisyam ', 'Nol kecil', '01.15.17-3.jpg', 105489, 'image/jpeg'),
('0005', 'Rismia Sandi', 'P', 'Jember 09 Maret 2011', 'Jl Kalimantan 78 Jember', 'Samsul Arifin', 'Nol kecil', '01.15.17-5.jpg', 113308, 'image/jpeg'),
('0006', 'Zulia Imawati', 'P', 'Jember 12 Januari 2012', 'Jl Keramat 67 Jember', 'Saryo', 'Nol kecil', '01.15.17-7.jpg', 106333, 'image/jpeg'),
('0007', 'Lani Indah', 'P', 'Jember 08 Juli 2011', 'Jl Jawa 45 Jember', 'Miski', 'Nol kecil', '01.15.17-10.jpg', 108694, 'image/jpeg'),
('0008', 'Dita Ulfi', 'P', 'Jember 10 Mei 2011', 'Jl Kalimantan 18 Jember', 'Slamet', 'Nol kecil', '01.15.17-9.jpg', 110408, 'image/jpeg'),
('0009', 'Elma Maulani', 'P', 'Jember 19 Juli 2011', 'Jl Hayam Muruk 90 Jember', 'Samsul Muhammad', 'Nol kecil', '01.15.17-42.jpg', 107920, 'image/jpeg'),
('001', 'Fina Darius', 'P', 'Jember, 14 Mei 2011', 'Jl Panjaitan 102 Jember', 'Rizki Tinus', 'Nol kecil', '01.15.17-1.jpg', 118081, 'image/jpeg'),
('0010', 'Sisilia Utami', 'P', 'Jember 10 Juni 2011', 'Jl Panjaitan 17 Jember', 'Gunawan', 'Nol kecil', '01.15.17-45.jpg', 107751, 'image/jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'Sandi', 'sandi@gmail.com', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

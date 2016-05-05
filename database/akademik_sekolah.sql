-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Mei 2015 pada 14.38
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `akademik_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `isi_berita` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `klik` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `judul_seo`, `headline`, `aktif`, `isi_berita`, `hari`, `tanggal`, `jam`, `gambar`, `klik`) VALUES
(7, 1, 'admin', 'Hari Kartini', 'hari-kartini', 'Y', '', '<p>Peringatan Hari Kartini 2015, hari sabtu, 25 April 2015. Smk Adi Sanggoro merayakan peringatan hari kartini.</p>\r\n', 'Jumat', '2015-05-01', '14:44:25', '30CDZ7XQqVAAE3TJa.jpg large.jpg', 19),
(9, 1, 'admin', 'Pengambilan kartu pretest', 'pengambilan-kartu-pretest', 'Y', '', '<p>Kepada Wali Murid calon Siswa/i baru SMK Adi Sanggoro TA-2015/2016, diberitahukan bahwa pretest tahap1 akan di laksanakan pada hari Sabtu 30 mei 2015 pada pukul 09.00 - Selesai.</p>\r\n\r\n<p>Pengambilan kartu pretest dimulai tanggal 11 Mei 2015 di jam kerja dengan syarat : Pembayaraan administrasi sebesar 70%</p>\r\n', 'Jumat', '2015-05-15', '16:31:41', '7711232366_859450157448373_1425095209132068913_n.jpg', 6),
(10, 1, 'admin', 'Pendaftaran', 'pendaftaran', 'Y', '', '<p>SMK Adi Sanggoro sudah membuka pendaftaran untuk tahun ajaran 2015/2016.</p>\r\n\r\n<p>Pendaftaran Siswa/i Tahun Ajaran 2015/2016<br />\r\nHari Senin - Sabtu (Pkl. 08.00 - 16.00), Hari Minggu/Libur (Pkl. 09.00 - 15.00).</p>\r\n', 'Kamis', '2015-05-21', '14:05:42', '54B-gGFB6CcAAqq32.jpg large.jpg', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE IF NOT EXISTS `bukutamu` (
`id_bukutamu` int(5) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pesan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `bukutamu`
--

INSERT INTO `bukutamu` (`id_bukutamu`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(1, 'Ahmad sopian', 'sopianahmad120@gmail.com', 'test', '2015-05-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE IF NOT EXISTS `content` (
`id_content` int(5) NOT NULL,
  `nama_content` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `code` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `posisi` int(5) NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id_content`, `nama_content`, `code`, `posisi`, `aktif`) VALUES
(1, 'Berita', 'berita.php', 4, 'N'),
(2, 'Galeri', 'galeri.php', 2, 'Y'),
(3, 'Pengumuman', 'pengumuman.php', 3, 'Y'),
(4, 'slider', 'slider.php', 1, 'Y'),
(5, 'Artikel', 'artikel.php', 5, 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daya_tampung`
--

CREATE TABLE IF NOT EXISTS `daya_tampung` (
  `id_daya_tampung` int(1) NOT NULL,
  `kapasitas` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nilai_minimal` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daya_tampung`
--

INSERT INTO `daya_tampung` (`id_daya_tampung`, `kapasitas`, `nilai_minimal`) VALUES
(1, '100', '140');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`id_gallery` int(5) NOT NULL,
  `jdl_gallery` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `jdl_gallery`, `gbr_gallery`) VALUES
(5, '', '971.jpg'),
(6, '', '223.jpg'),
(7, '', '474.jpg'),
(8, '', '275.jpg'),
(9, '', '396.jpg'),
(10, '', '797.jpg'),
(11, '', '818.jpg'),
(12, '', '449.jpg'),
(13, '', '8410.jpg'),
(14, '', '7011.jpg'),
(15, '', '5512.jpg'),
(16, '', '6713.jpg'),
(17, '', '7415.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
`idg` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gelar` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`idg`, `nip`, `nama`, `jk`, `agama`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `gelar`, `pass`, `alamat`, `foto`) VALUES
(2, '1011', 'Akhmad Arifin Makhfud', 'L', 'Islam', 'Bogor', '1991-06-27', '085711111111', '-', 'c85b5738485dae80d7d85efe9b3f2efc', 'Bogor', ''),
(3, '1012', 'Wildan Ade Wijaya', 'L', '', 'Bogor', '1994-08-03', '089612121211', '-', 'af6b3aa8c3fcd651674359f500814679', 'Bogor', ''),
(4, '1013', 'Ade Reza Haryanto, S.T', 'L', '', 'Bogor', '1983-12-03', '087777777777', 'S.T', 'a562cfa07c2b1213b3a5c99b756fc206', 'Bogor', ''),
(5, '1015', 'Romi Zulkifli', 'L', 'Islam', 'Bogor', '1980-01-02', '085711111111', '', '77e69c137812518e359196bb2f5e9bb9', 'Bogor', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halamanstatis`
--

CREATE TABLE IF NOT EXISTS `halamanstatis` (
`id_halaman` int(5) NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isi_halaman` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(4, 'Visi Misi', 'visi-misi', '<p><strong>Visi</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Visi Pendidikan yang di selenggarakan SMK Adi Sanggoro adalah membentuk instan mandiri, cerdas, terampil, dan professional</strong></li>\r\n</ul>\r\n\r\n<p><strong>Misi</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Misi Pendidikan yang di selenggarakan SMK Adi Sanggoro adalah mencetak tenaga kerja tingkat menengah yang mampu bekerja mandiri, memiliki pengetahuan, menguasai keterampilan dan sikap professional dalam mengembangkan ilmu dan teknologi di bidang survey dan pemetaan, teknologi informatika, geologi pertambangan serta tata busana</strong></li>\r\n</ul>\r\n', '2015-05-01', '', '', 21, '11:25:00', 'Jumat'),
(5, 'sejarah', 'sejarah', '<p><strong>YAYASAN ADISANGGORO pada tahun 1996 mulai mendirikan SMK ADI SANGGORO</strong> program studi Survei dan pemetaan (sumberdaya alam dan lingkungan)</p>\r\n\r\n<p><strong>SMK ADI SANGGORO, </strong>tahun 1997 berdasarkan surat keputusan kepala kantor wilayah departement pendidikan dan kebudayaan provinsi jawa barat No. 678/I02.1/kep/OT/97.</p>\r\n\r\n<p>Pada tahun 2000, telah terakreditasi dengan jenjang &quot;diakui&quot; berdasarkan surat keputusan direktur jendral pendidikan dasar dan menengah, nomor 79/C.C7/Kep./PP/2000.</p>\r\n', '2015-05-01', '', '', 34, '11:34:47', 'Jumat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_tes`
--

CREATE TABLE IF NOT EXISTS `hasil_tes` (
`id_hasil` int(5) NOT NULL,
  `id_pendaftaran` int(10) NOT NULL,
  `skhun` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rata_raport` varchar(10) NOT NULL,
  `total` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `hasil_tes`
--

INSERT INTO `hasil_tes` (`id_hasil`, `id_pendaftaran`, `skhun`, `rata_raport`, `total`) VALUES
(1, 5, '60', '80', '140'),
(2, 10, '70', '89', '159'),
(3, 11, '90', '60', '150'),
(4, 12, '70', '69', '139');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
`id_hubungi` int(5) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pesan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`, `jam`, `dibaca`) VALUES
(1, 'Ahmad sopian', 'sopianahmad120@gmail.com', 'TEST', 'TEST', '2015-05-04', '00:00:00', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
`id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pembuka` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `pembuka`, `gambar`) VALUES
(1, 'Sistem Informasi Akademik Sekolah', 'Selamat Datang Di Website Smk Adi Sanggoro', 'logo2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE IF NOT EXISTS `info` (
`id_info` int(5) NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_tab` varchar(50) NOT NULL,
  `judul_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isi_info` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id_info`, `judul`, `nama_tab`, `judul_seo`, `isi_info`, `tgl_posting`, `gambar`, `username`, `jam`) VALUES
(2, 'Jadwal PSB', 'Jadwal PSB', 'jadwal-psb', '<p>Jadwal PSB</p>\r\n', '2015-05-01', '', '', '19:22:32'),
(3, 'Aturan PSB', 'Aturan PSB', 'aturan-psb', '<p>Aturan PSB</p>\r\n', '2015-05-01', '', '', '19:23:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_nilai`
--

CREATE TABLE IF NOT EXISTS `jenis_nilai` (
`id_jenis` int(10) NOT NULL,
  `jenis_nilai` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `jenis_nilai`
--

INSERT INTO `jenis_nilai` (`id_jenis`, `jenis_nilai`) VALUES
(3, 'Nilai Praktek'),
(4, 'Nilai Ulangan Harian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
`id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `id_tahun` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `id_tahun`) VALUES
(1, 'Survey Dan Pemetaan', 7),
(2, 'Teknik Komputer Dan Informatika', 7),
(3, 'Geologi Pertambangan', 7),
(4, 'Tata Busana', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `kategori_seo` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `diklik` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`, `aktif`, `diklik`) VALUES
(1, 'Berita', 'berita', 'Y', 96),
(2, 'Artikel', 'artikel', 'Y', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `idg` int(10) NOT NULL,
  `id_tahun` int(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_ruangan` int(10) NOT NULL,
  `id_tingkat` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `idg`, `id_tahun`, `id_jurusan`, `id_ruangan`, `id_tingkat`) VALUES
(1, 'XI RPL 3', 4, 7, 2, 1, 9),
(2, 'XI RPL 2', 3, 7, 2, 2, 9),
(6, 'XI RPL 1', 2, 7, 2, 4, 9),
(7, 'XI GEOMATIKA 2', 5, 7, 1, 4, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
`id_mapel` int(10) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_tingkat` int(10) NOT NULL,
  `idg` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `nama_mapel`, `id_jurusan`, `id_tingkat`, `idg`) VALUES
(1, 'Sistem Operasi', 2, 7, 2),
(3, 'Pengelolaan Informasi', 2, 7, 3),
(4, 'Perakitan Komputer', 2, 7, 2),
(5, 'Pemrograman Desktop', 2, 9, 4),
(6, 'Sistem Informasi Geografis', 1, 9, 5),
(7, 'Sistem Komputer', 2, 7, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu` int(5) NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `atribut` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `adminmenu` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jenis_menu` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `top` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `atribut`, `link`, `aktif`, `adminmenu`, `jenis_menu`, `top`) VALUES
(3, 'Profil', 'background:#264c84;', '#', 'Y', 'Y', 'Y', 'N'),
(4, 'PSB', 'background:#264c84;', '#', 'Y', 'Y', 'Y', 'N'),
(5, 'Informasi', 'background:#264c84;', '#', 'Y', 'Y', 'Y', 'N'),
(6, 'Galeri Foto', 'background:#264c84;', 'galeri-photo.html', 'Y', 'Y', 'N', 'N'),
(7, 'Hubungi Kami', 'background:#264c84;', '#', 'Y', 'Y', 'Y', 'N'),
(9, 'login', '', 'user/login1.php', 'Y', 'Y', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`id_nilai` int(10) NOT NULL,
  `idg` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `ids` int(10) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `id_tahun` int(10) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `idg`, `id_mapel`, `id_kelas`, `ids`, `id_jenis`, `id_tahun`, `nilai`) VALUES
(13, 4, 5, 6, 17, 3, 7, '80'),
(14, 2, 4, 2, 39, 3, 7, '67'),
(15, 4, 5, 1, 14, 4, 7, '90'),
(16, 0, 5, 1, 12, 4, 7, '85');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
`id_pendaftaran` int(10) NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8 DEFAULT NULL,
  `asal_sekolah` int(5) NOT NULL,
  `wali` varchar(25) CHARACTER SET utf8 NOT NULL,
  `telp` varchar(15) CHARACTER SET utf16 NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `status` enum('B','S') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nama`, `alamat`, `tgl_lahir`, `email`, `tempat`, `agama`, `jenis_kelamin`, `asal_sekolah`, `wali`, `telp`, `tgl_pendaftaran`, `status`) VALUES
(5, 'Dodit mulyanto', 'Banyuwangi', '1990-08-08', 'dodot@gmail.com', 'Banyuwangi', 'islam', 'L', 1, 'Didit mulyanta', '085712345678', '2015-05-01', 'S'),
(10, 'Ahmad sopian', 'BOGOR', '2015-01-01', 'sopianahmad120@gmail.com', 'Bogor', 'islam', 'L', 1, 'SOPIAN', '085718464192', '2015-05-06', 'S'),
(11, 'Anugrah ramadhan', 'bogor', '2015-01-01', 'anugrah@gmail.com', 'bogor', 'islam', 'L', 1, 'anugrah', '78709865739', '2015-05-15', 'S'),
(12, 'Deden M. rizki', 'leuwiliag', '1998-06-25', 'deden@gmail.com', 'Bogor', 'islam', 'L', 3, 'dadan', '085718571234', '2015-05-24', 'S');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
`id_pengumuman` int(5) NOT NULL,
  `tema` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `tema`, `tema_seo`, `isi_pengumuman`, `gambar`, `tgl_posting`, `dibaca`, `username`) VALUES
(6, 'Berkas Lampiran', 'berkas-lampiran', '<p>Assalamu&#39;alaikum wr wb. Mohon kepada lulusan surta yang sedang mencari kerja mengirimkan berkas lamaran (softfile : ijazah, SKHUN, Pas Foto, KTP, CV, kalau ada NPWP) ke email : neng.erlita@gmail.com. semakin cepat respon, insyaallah kami bantu jembatani kalian dengan rekan-rekan perusahaan. Terimakasih.</p>\r\n', '757507logo3.jpg', '2015-05-23', 1, 'admin'),
(7, 'Jurusan Baru', 'jurusan-baru', '<p>Pada tahun ajaran 2015/2016 SMK Adi Sanggoro mempunyai Jurusan baru yaitu Mekatronika/Robotik</p>\r\n', '147491logo3.jpg', '2015-05-23', 1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
`id_ruangan` int(10) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `kapasitas_belajar` varchar(5) NOT NULL,
  `kapasitas_ujian` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `kapasitas_belajar`, `kapasitas_ujian`) VALUES
(1, 'Ruang Kelas XI RPL 3', '35', '30'),
(2, 'Ruang Kelas XI RPL 2', '32', '30'),
(4, 'Ruang Kelas XI RPL 1', '34', '30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE IF NOT EXISTS `sekolah` (
`id_sekolah` int(5) NOT NULL,
  `nama_sekolah` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sekolah_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `sekolah_seo`, `aktif`) VALUES
(1, 'SMP PGRI 13 BOGOR', 'smp-pgri-13-bogor', 'Y'),
(2, 'MTS Al-Ghazaly', 'mts-alghazaly', 'Y'),
(3, 'SMP N 1LEUWILIANG', 'smp-n-1leuwiliang', 'Y'),
(4, 'SMP N 14 BOGOR', 'smp-n-14-bogor', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
`ids` int(10) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `id_tingkat` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`ids`, `nis`, `nama`, `jk`, `agama`, `email`, `foto`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `id_tingkat`, `id_kelas`, `id_jurusan`, `pass`) VALUES
(12, '21013005', 'Ahmad sopian', 'L', 'Islam', 'sopianahmad120@gmail.com', '', 'Bogor', 'Bogor', '1998-08-25', '085718464192', 9, 1, 2, '61243c7b9a4022cb3f8dc3106767ed12'),
(14, '21013006', 'Anugrah ramadhan', 'L', 'Katolik', 'anugrahsastrwidjoyo@gmail.com', '', 'Bogor', 'Bogor', '1997-01-01', '423424242432', 9, 1, 2, 'd3ccb844ac68bc324e6c95e94c05e477'),
(16, '21013018', 'Deden Muhammad Zikri', 'L', 'Islam', 'dedencoulibaly@gmail.com', '', 'Leuwiliang', 'Bogor', '1998-05-10', '089652482193', 9, 6, 2, 'd4e044830cfc2124c4c20a2d4e656bc2'),
(17, '21013080', 'Rizki ramadhan', 'L', 'Islam', 'rizki@gmail.com', '', 'Cilubang', 'Tangerang', '1997-12-31', '089611651523', 9, 1, 2, '3e089c076bf1ec3a8332280ee35c28d4'),
(38, '210130100', 'Zein Habsin Aziz', 'L', 'Islam', 'zeinhabsin1@gmail.com', '', 'Jl. kemang', 'Bogor', '1998-03-03', '089652482193', 9, 1, 2, '59b1db2dfbcb39cfd95701541a8385b6'),
(39, '21013105', 'Ilham Nasution', 'L', 'Islam', 'ilham@gmail.com', '', 'Bogor', 'Bogor', '1998-06-10', '08961746177', 9, 7, 1, 'bcd724d15cde8c47650fda962968f102');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
`id_sub` int(5) NOT NULL,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_menu` int(5) NOT NULL,
  `id_submenu` int(5) NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `link_sub`, `id_menu`, `id_submenu`, `aktif`) VALUES
(1, 'Form pendaftaran', 'form-pendaftaran.html', 4, 0, 'Y'),
(2, 'Visi Misi', 'hal-visi-misi.html', 3, 0, 'Y'),
(3, 'Sejarah', 'hal-sejarah.html', 3, 0, 'Y'),
(4, 'Berita', 'semua-berita.html', 5, 0, 'Y'),
(5, 'Artikel', 'semua-artikel.html', 5, 0, 'Y'),
(6, 'Info PSB', 'info-ppdb.html', 4, 0, 'Y'),
(7, 'Hasil Seleksi', 'hasil-seleksi.html', 4, 0, 'Y'),
(8, 'Pengumuman', 'semua-pengumuman.html', 5, 0, 'Y'),
(9, 'Kontak', 'hubungi-kami.html', 7, 0, 'Y'),
(10, 'Buku Tamu', 'bukutamu.html', 7, 0, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_pelajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_pelajaran` (
`id_tahun` int(10) NOT NULL,
  `nama_tahun` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id_tahun`, `nama_tahun`) VALUES
(6, '2013/2014'),
(7, '2014/2015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE IF NOT EXISTS `tingkat` (
`id_tingkat` int(10) NOT NULL,
  `nama_tingkat` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `nama_tingkat`) VALUES
(7, '10'),
(9, '11'),
(10, '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`idu` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idu`, `nama`, `pass`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin_guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
 ADD PRIMARY KEY (`id_bukutamu`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id_content`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`idg`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
 ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
 ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
 ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
 ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
 ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jenis_nilai`
--
ALTER TABLE `jenis_nilai`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
 ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
 ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
 ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
 ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
 ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
 ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
 ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
 ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
MODIFY `id_bukutamu` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `id_content` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
MODIFY `idg` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
MODIFY `id_hasil` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
MODIFY `id_info` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_nilai`
--
ALTER TABLE `jenis_nilai`
MODIFY `id_jenis` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
MODIFY `id_pendaftaran` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
MODIFY `id_ruangan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
MODIFY `id_sekolah` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
MODIFY `id_sub` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
MODIFY `id_tahun` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
MODIFY `id_tingkat` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `idu` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

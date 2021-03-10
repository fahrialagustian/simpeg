-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2021 pada 07.42
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `tgl_absen` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `id_ketengan_absen` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `nip`, `tgl_absen`, `jam_masuk`, `jam_pulang`, `id_ketengan_absen`, `keterangan`) VALUES
(7, '351651651616116161', '2021-02-01', '21:25:00', '22:26:00', 1, '-'),
(8, '123456789545453423', '2021-02-18', '01:32:00', '21:28:00', 1, '-'),
(9, '123456789545453423', '2021-02-20', '09:59:00', '11:01:00', 1, '-'),
(10, '351651651616116161', '2021-01-07', '10:16:00', '12:14:00', 1, '-'),
(11, '123456789545453423', '2021-02-01', '09:06:00', '09:06:00', 1, '-'),
(12, '123456789545453423', '2021-02-03', '09:06:00', '09:06:00', 1, '-'),
(13, '123456789545453423', '2021-02-02', '09:06:00', '09:06:00', 1, '-'),
(14, '123456789545453423', '2021-02-04', '09:06:00', '09:06:00', 1, '-'),
(15, '123456789545453423', '2021-02-05', '09:06:00', '09:06:00', 1, '-'),
(16, '123456789545453423', '2021-02-08', '09:06:00', '09:06:00', 1, '-'),
(17, '123456789545453423', '2021-02-09', '09:06:00', '09:06:00', 1, '-'),
(18, '123456789545453423', '2021-02-10', '09:06:00', '09:06:00', 1, '-'),
(19, '123456789545453423', '2021-02-11', '09:06:00', '09:06:00', 1, '-'),
(20, '123456789545453423', '2021-02-12', '09:06:00', '09:06:00', 1, '-'),
(21, '123456789545453423', '2021-02-15', '09:06:00', '09:06:00', 1, '-'),
(22, '123456789545453423', '2021-02-16', '09:06:00', '09:06:00', 1, '-'),
(23, '123456789545453423', '2021-02-17', '09:06:00', '09:06:00', 1, '-'),
(24, '123456789545453423', '2021-02-18', '09:06:00', '09:06:00', 1, '-'),
(25, '123456789545453423', '2021-02-19', '09:06:00', '09:06:00', 1, '-'),
(26, '123456789545453423', '2021-02-22', '09:06:00', '09:06:00', 1, '-'),
(27, '123456789545453423', '2021-02-23', '09:06:00', '09:06:00', 1, '-'),
(28, '123456789545453423', '2021-02-24', '09:06:00', '09:06:00', 1, '-'),
(29, '123456789545453423', '2021-02-25', '09:06:00', '09:06:00', 1, '-'),
(30, '123456789545453423', '2021-02-26', '09:06:00', '09:06:00', 1, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(4, 'Kritiani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Pegawai') NOT NULL,
  `status` enum('Aktif','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `level`, `status`) VALUES
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'Admin', 'Aktif'),
(3, '123456789545453423', '6e0c39b0243a0f4cf57e6565228fcf0a', 'Pegawai', 'Aktif'),
(4, '351651651616116161', 'c4ca4238a0b923820dcc509a6f75849b', 'Pegawai', 'Aktif'),
(5, '82686784638643688_', '918a882626fb0631c527be3922858354', 'Pegawai', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anak`
--

CREATE TABLE `anak` (
  `id_anak` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nik_anak` varchar(25) NOT NULL,
  `nama_anak` varchar(100) NOT NULL,
  `tmpt_lhr_anak` varchar(100) NOT NULL,
  `tgl_lhr_anak` date NOT NULL,
  `alamat_anak` varchar(255) NOT NULL,
  `pekerjaan_anak` varchar(255) NOT NULL,
  `status_hidup_anak` enum('Hidup','Meninggal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bapak_ibu`
--

CREATE TABLE `bapak_ibu` (
  `id_bi` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nik_bi` varchar(25) NOT NULL,
  `nama_bi` varchar(100) NOT NULL,
  `tmpt_lhr_bi` varchar(100) NOT NULL,
  `tgl_lhr_bi` date NOT NULL,
  `alamat_bi` varchar(255) NOT NULL,
  `pekerjaan_bi` varchar(255) NOT NULL,
  `status_hidup_bi` enum('Hidup','Meninggal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `pajak` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `golongan`, `uang_makan`, `pajak`) VALUES
(1, 'III A', 37000, '0.05'),
(3, 'IV A', 41000, '0.15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin`
--

CREATE TABLE `izin` (
  `id_izin` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('Proses','Acc','Tolak') NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Guru'),
(3, 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_absen`
--

CREATE TABLE `keterangan_absen` (
  `id_keterangan_absen` int(11) NOT NULL,
  `keterangan_absen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keterangan_absen`
--

INSERT INTO `keterangan_absen` (`id_keterangan_absen`, `keterangan_absen`) VALUES
(1, 'Hadir'),
(2, 'Tanpa Keterangan'),
(3, 'Izin'),
(4, 'Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(25) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tmpt_lhr` varchar(100) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `tmpt_lhr`, `tgl_lhr`, `alamat`, `no_telpon`, `email`, `foto`, `id_agama`, `id_golongan`, `id_jabatan`, `id_akun`) VALUES
('123456789545453423', 'BAMBANG, A.Md', 'Banjarmasin', '2020-12-12', 'Atu-atu', '09878688666564', 'chariabenefit_u99@yahoo.co.id', 'Kemenag-Logo.png', 1, 3, 1, 3),
('351651651616116161', 'Budi', 'Pelaihari', '2020-12-17', 'Kec. Tambang Ulang', '0821 5896 6021', 'ruangpesan.informatika@gmail.com', 'WhatsApp Image 2020-12-22 at 15.03.24.jpeg', 1, 3, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_pelatihan` varchar(255) NOT NULL,
  `tgl_mulai` decimal(10,0) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `no_sertifikat` varchar(100) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `file_sertifikat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `id_riwayat_pekerjaan` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `nomor_sk` varchar(100) NOT NULL,
  `tgl_sk` date NOT NULL,
  `file_sk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id_rp` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `akreditasi` varchar(255) NOT NULL,
  `nomor_ijazah` varchar(255) NOT NULL,
  `tgl_ijazah` date NOT NULL,
  `file_ijazah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`id_rp`, `nip`, `id_tingkat`, `nama_sekolah`, `jurusan`, `akreditasi`, `nomor_ijazah`, `tgl_ijazah`, `file_ijazah`) VALUES
(2, '351651651616116161', 2, 'SDN', '-', '-', '0989809', '2021-02-17', 'surat pns ptt.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suami_istri`
--

CREATE TABLE `suami_istri` (
  `id_si` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nik_si` varchar(25) NOT NULL,
  `nama_si` varchar(100) NOT NULL,
  `tmpt_lhr_si` varchar(100) NOT NULL,
  `tgl_lhr_si` date NOT NULL,
  `alamat_si` varchar(255) NOT NULL,
  `pekerjaan_si` varchar(255) NOT NULL,
  `status_hidup_si` enum('Hidup','Meninggal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE `tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `tingkat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `tingkat`) VALUES
(2, 'SD'),
(3, 'MI'),
(4, 'SMP'),
(5, 'MTs'),
(6, 'SMK'),
(7, 'SMA'),
(8, 'MA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_ketengan_absen` (`id_ketengan_absen`);

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `bapak_ibu`
--
ALTER TABLE `bapak_ibu`
  ADD PRIMARY KEY (`id_bi`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `keterangan_absen`
--
ALTER TABLE `keterangan_absen`
  ADD PRIMARY KEY (`id_keterangan_absen`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indeks untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`id_riwayat_pekerjaan`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`id_rp`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_tingkat` (`id_tingkat`);

--
-- Indeks untuk tabel `suami_istri`
--
ALTER TABLE `suami_istri`
  ADD PRIMARY KEY (`id_si`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bapak_ibu`
--
ALTER TABLE `bapak_ibu`
  MODIFY `id_bi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `izin`
--
ALTER TABLE `izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keterangan_absen`
--
ALTER TABLE `keterangan_absen`
  MODIFY `id_keterangan_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `id_riwayat_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `suami_istri`
--
ALTER TABLE `suami_istri`
  MODIFY `id_si` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_ketengan_absen`) REFERENCES `keterangan_absen` (`id_keterangan_absen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `anak`
--
ALTER TABLE `anak`
  ADD CONSTRAINT `anak_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bapak_ibu`
--
ALTER TABLE `bapak_ibu`
  ADD CONSTRAINT `bapak_ibu_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_4` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `riwayat_pendidikan_ibfk_1` FOREIGN KEY (`id_tingkat`) REFERENCES `tingkat` (`id_tingkat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_pendidikan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `suami_istri`
--
ALTER TABLE `suami_istri`
  ADD CONSTRAINT `suami_istri_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

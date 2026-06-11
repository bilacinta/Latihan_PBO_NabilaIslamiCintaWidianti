-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2026 at 07:08 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1d_nabilaislamicintaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(100) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Reguler','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` int DEFAULT NULL,
  `efek_gerak_fitur` varchar(50) DEFAULT NULL,
  `bantal_selimut_pack` tinyint(1) DEFAULT '0',
  `layanan_butler` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'The Avengers', '2026-06-12 13:00:00', 1, 45000.00, 'Reguler', 'Dolby Digital 5.1', 'A', NULL, NULL, 0, 0),
(2, 'Interstellar', '2026-06-12 15:30:00', 2, 45000.00, 'Reguler', 'Dolby Digital 5.1', 'B', NULL, NULL, 0, 0),
(3, 'Inception', '2026-06-12 18:45:00', 1, 50000.00, 'Reguler', 'Dolby Atmos', 'C', NULL, NULL, 0, 0),
(4, 'Spiderman: No Way Home', '2026-06-13 12:00:00', 4, 55000.00, 'Reguler', 'Dolby Atmos', 'D', NULL, NULL, 0, 0),
(5, 'Batman: The Dark Knight', '2026-06-13 15:00:00', 2, 55000.00, 'Reguler', 'Dolby Digital 5.1', 'E', NULL, NULL, 0, 0),
(6, 'Frozen II', '2026-06-13 17:15:00', 3, 55000.00, 'Reguler', 'Dolby Digital 5.1', 'F', NULL, NULL, 0, 0),
(7, 'Kajiman', '2026-06-13 20:00:00', 1, 55000.00, 'Reguler', 'Dolby Digital 5.1', 'G', NULL, NULL, 0, 0),
(8, 'Avatar: The Way of Water', '2026-06-12 14:00:00', 2, 75000.00, 'IMAX', 'IMAX 12-Channel', 'H', 101, 'D-BOX', 0, 0),
(9, 'Dune: Part Two', '2026-06-12 17:30:00', 1, 75000.00, 'IMAX', 'IMAX 12-Channel', 'I', NULL, '4DX', 0, 0),
(10, 'Oppenheimer', '2026-06-12 21:00:00', 2, 85000.00, 'IMAX', 'IMAX 6-Track', 'J', NULL, NULL, 0, 0),
(11, 'Top Gun: Maverick', '2026-06-13 13:30:00', 2, 95000.00, 'IMAX', 'IMAX 12-Channel', 'K', NULL, 'D-BOX', 0, 0),
(12, 'Doctor Strange 3D', '2026-06-13 16:45:00', 3, 95000.00, 'IMAX', 'IMAX 12-Channel', 'L', 102, NULL, 0, 0),
(13, 'Jurassic World', '2026-06-13 19:30:00', 1, 95000.00, 'IMAX', 'IMAX 6-Track', 'M', 103, '4DX', 0, 0),
(14, 'Godzilla x Kong', '2026-06-13 22:15:00', 2, 95000.00, 'IMAX', 'IMAX 12-Channel', 'N', NULL, 'D-BOX', 0, 0),
(15, 'Titanic', '2026-06-12 14:15:00', 2, 150000.00, 'Velvet', 'Dolby Atmos', 'VIP-1', NULL, NULL, 1, 1),
(16, 'The Matrix Resurrections', '2026-06-12 18:00:00', 2, 150000.00, 'Velvet', 'Dolby Atmos', 'VIP-2', NULL, NULL, 1, 1),
(17, 'La La Land', '2026-06-12 21:15:00', 2, 175000.00, 'Velvet', 'Dolby Digital 5.1', 'VIP-3', NULL, NULL, 1, 1),
(18, 'Gladiator II', '2026-06-13 13:00:00', 2, 200000.00, 'Velvet', 'Dolby Atmos', 'VIP-1', NULL, NULL, 1, 1),
(19, 'John Wick: Chapter 4', '2026-06-13 16:30:00', 2, 200000.00, 'Velvet', 'Dolby Atmos', 'VIP-2', NULL, NULL, 1, 1),
(20, 'Fast X', '2026-06-13 19:45:00', 2, 200000.00, 'Velvet', 'Dolby Atmos', 'VIP-3', NULL, NULL, 1, 1),
(21, 'The Conjuring', '2026-06-13 22:30:00', 2, 200000.00, 'Velvet', 'Dolby Digital 5.1', 'VIP-4', NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

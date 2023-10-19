-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sijukir.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sijukir.areas: ~6 rows (approximately)
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` (`id`, `kecamatan`, `kode`, `created_at`, `updated_at`) VALUES
	(1, 'Ampenan', 'AMP', NULL, NULL),
	(2, 'Mataram', 'MTR', NULL, NULL),
	(3, 'Cakranegara', 'CKR', NULL, NULL),
	(4, 'Sandubaya', 'SDB', NULL, NULL),
	(5, 'Selaparang', 'SLP', NULL, NULL),
	(6, 'Sekarbela', 'SKB', NULL, NULL);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;

-- Dumping structure for table sijukir.kelurahan
CREATE TABLE IF NOT EXISTS `kelurahans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sijukir.kelurahan: ~50 rows (approximately)
/*!40000 ALTER TABLE `kelurahan` DISABLE KEYS */;
INSERT INTO `kelurahans` (`id`, `kelurahan`, `area_id`, `created_at`, `updated_at`) VALUES
	(1, 'Ampenan Tengah', 1, NULL, NULL),
	(2, 'Ampenan Utara', 1, NULL, NULL),
	(3, 'Dayan Peken', 1, NULL, NULL),
	(4, 'Pejeruk', 1, NULL, NULL),
	(5, 'Banjar', 1, NULL, NULL),
	(6, 'Bintaro', 1, NULL, NULL),
	(7, 'Kebon Sari', 1, NULL, NULL),
	(8, 'Taman Sari', 1, NULL, NULL),
	(9, 'Pejarakan Karya', 1, NULL, NULL),
	(10, 'Ampenan Selatan', 1, NULL, NULL),
	(30, 'Mataram Timur', 2, NULL, NULL),
	(31, 'Pagesangan', 2, NULL, NULL),
	(32, 'Pagesangan Barat', 2, NULL, NULL),
	(33, 'Pagesangan Timur', 2, NULL, NULL),
	(34, 'Pagutan', 2, NULL, NULL),
	(35, 'Pagutan Barat', 2, NULL, NULL),
	(36, 'Pagutan TImur', 2, NULL, NULL),
	(37, 'Pejanggik', 2, NULL, NULL),
	(38, 'Punia', 2, NULL, NULL),
	(39, 'Cakranegara Barat', 3, NULL, NULL),
	(40, 'Cakranegara Selatan', 3, NULL, NULL),
	(41, 'Cakranegara Selatan Baru', 3, NULL, NULL),
	(42, 'Cakranegara Timur', 3, NULL, NULL),
	(43, 'Cakranegara Utara', 3, NULL, NULL),
	(44, 'Cilinaya', 3, NULL, NULL),
	(45, 'Karang Taliwang', 3, NULL, NULL),
	(46, 'Mayura', 3, NULL, NULL),
	(47, 'Sapta Marga', 3, NULL, NULL),
	(48, 'Sayang-Sayang', 3, NULL, NULL),
	(49, 'Abian Tubuh Baru', 4, NULL, NULL),
	(50, 'Babakan', 4, NULL, NULL),
	(51, 'Bertais', 4, NULL, NULL),
	(52, 'Dasan Cermen', 4, NULL, NULL),
	(53, 'Mandalika', 4, NULL, NULL),
	(54, 'Selagalas', 4, NULL, NULL),
	(55, 'Turida', 4, NULL, NULL),
	(56, 'Dasan Agung', 5, NULL, NULL),
	(57, 'Dasan Agung Baru', 5, NULL, NULL),
	(58, 'Gomong', 5, NULL, NULL),
	(59, 'Karang Baru', 5, NULL, NULL),
	(60, 'Mataram Barat', 5, NULL, NULL),
	(61, 'Monjok', 5, NULL, NULL),
	(62, 'Monjok Barat', 5, NULL, NULL),
	(63, 'Monjok Timur', 5, NULL, NULL),
	(64, 'Rembiga', 5, NULL, NULL),
	(65, 'Jempong Baru', 6, NULL, NULL),
	(66, 'Karang Pule', 6, NULL, NULL),
	(67, 'Kekalik Jaya', 6, NULL, NULL),
	(68, 'Tanjung Karang', 6, NULL, NULL),
	(69, 'Tanjung Karang Permai', 6, NULL, NULL);
/*!40000 ALTER TABLE `kelurahan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

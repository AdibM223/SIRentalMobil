/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - rental_mobil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_08_09_040825_create_tarif_table',1),
(6,'2023_08_09_041441_create_pelanggan_table',1),
(7,'2023_08_09_041453_create_mobil_table',1),
(8,'2023_08_09_041520_create_penyewaan_table',1),
(9,'2023_08_09_173040_create_pembayaran_table',1),
(10,'2023_08_09_173050_create_pengembalian_table',1);

/*Table structure for table `mobil` */

DROP TABLE IF EXISTS `mobil`;

CREATE TABLE `mobil` (
  `id_mobil` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_tarif` bigint(20) unsigned DEFAULT NULL,
  `nama_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_penumpang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_mesin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_mobil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_mobil`),
  KEY `mobil_id_tarif_foreign` (`id_tarif`),
  CONSTRAINT `mobil_id_tarif_foreign` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `mobil` */

insert  into `mobil`(`id_mobil`,`id_tarif`,`nama_mobil`,`warna`,`tahun_mobil`,`no_pol`,`kapasitas_penumpang`,`kapasitas_mesin`,`gambar_mobil`,`created_at`,`updated_at`) values 
(1,1,'Mitsubishi','Hitam','2016','AA 8712 VC','8','2000cc','1695563098.png',NULL,NULL),
(2,1,'Honda','Hitam','2016','AA 8712 VC','8','2000cc','1695652401.png',NULL,NULL),
(3,1,'Honda','Hitam','2016','AA 8712 VC','8','2000cc','1695654239.png',NULL,NULL);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nama`,`email`,`password`,`alamat`,`tgl_lahir`,`no_hp`,`created_at`,`updated_at`) values 
(1,'ren','ren@gmail.com','$2y$10$vVsBRABNv42k6ab4la8W9ON7dV5.QafAXjNTC1bDdythf7/gGPN5u','Bojong koneng','2023-09-26','08612361723',NULL,NULL),
(2,'Sugito','s@gmail.com','$2y$10$AhJEvBFeEVVHYIVWEg0rXenGR2VhQZynt6kBpp99VDKhmU0Y1C6WO','Banjarharjo','1998-10-13','08612376123',NULL,NULL),
(5,'susantoro','susan@gmail.com','$2y$10$pVLIHsRn2D1qHvW5uJYP2uoPe2BQ4RtH5oPSOYJNYCgEtFa1xBDuq','bojongsari','1998-11-18','08126131731',NULL,NULL);

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_sewa` bigint(20) unsigned DEFAULT NULL,
  `total` int(11) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `pembayaran_id_sewa_foreign` (`id_sewa`),
  CONSTRAINT `pembayaran_id_sewa_foreign` FOREIGN KEY (`id_sewa`) REFERENCES `penyewaan` (`id_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`id_sewa`,`total`,`tgl_pembayaran`,`status_pembayaran`,`created_at`,`updated_at`) values 
(1,5,400000,'2023-09-25','2',NULL,NULL),
(2,NULL,400000,NULL,'1',NULL,NULL),
(3,NULL,600000,NULL,'1',NULL,NULL),
(4,NULL,400000,NULL,'1',NULL,NULL);

/*Table structure for table `pengembalian` */

DROP TABLE IF EXISTS `pengembalian`;

CREATE TABLE `pengembalian` (
  `id_pengembalian` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_sewa` bigint(20) unsigned DEFAULT NULL,
  `total_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_ambil` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pengembalian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengembalian`),
  KEY `pengembalian_id_sewa_foreign` (`id_sewa`),
  CONSTRAINT `pengembalian_id_sewa_foreign` FOREIGN KEY (`id_sewa`) REFERENCES `penyewaan` (`id_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pengembalian` */

insert  into `pengembalian`(`id_pengembalian`,`id_sewa`,`total_bayar`,`tgl_ambil`,`tgl_kembali`,`denda`,`status_pengembalian`,`created_at`,`updated_at`) values 
(1,5,'400000','2023-09-25','2023-09-27',NULL,'2',NULL,NULL),
(2,NULL,'400000','2023-09-25','2023-09-27',NULL,'1',NULL,NULL),
(3,NULL,'400000','2023-09-26','2023-09-28',NULL,'1',NULL,NULL),
(4,NULL,'600000','2023-09-29','2023-10-02',NULL,'1',NULL,NULL),
(5,NULL,'400000','2023-09-28','2023-09-30',NULL,'1',NULL,NULL);

/*Table structure for table `penyewaan` */

DROP TABLE IF EXISTS `penyewaan`;

CREATE TABLE `penyewaan` (
  `id_sewa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_mobil` bigint(20) unsigned DEFAULT NULL,
  `id_pelanggan` bigint(20) unsigned DEFAULT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `total_sewa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denda/jam` int(11) DEFAULT NULL,
  `total_denda` int(11) DEFAULT NULL,
  `status_penyewaan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sewa`),
  KEY `penyewaan_id_pelanggan_foreign` (`id_pelanggan`),
  KEY `penyewaan_id_mobil_foreign` (`id_mobil`),
  CONSTRAINT `penyewaan_id_mobil_foreign` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`),
  CONSTRAINT `penyewaan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penyewaan` */

insert  into `penyewaan`(`id_sewa`,`id_mobil`,`id_pelanggan`,`tgl_ambil`,`tgl_kembali`,`total_sewa`,`denda/jam`,`total_denda`,`status_penyewaan`,`created_at`,`updated_at`) values 
(1,2,NULL,'2023-09-25','2023-09-27','400000',NULL,NULL,1,NULL,NULL),
(2,2,NULL,'2023-09-25','2023-09-27','400000',NULL,NULL,1,NULL,NULL),
(3,2,NULL,'2023-09-25','2023-09-27','400000',NULL,NULL,1,NULL,NULL),
(4,3,NULL,'2023-09-26','2023-09-28','400000',NULL,NULL,1,NULL,NULL),
(5,1,2,'2023-09-29','2023-10-02','600000',NULL,NULL,2,NULL,NULL),
(6,2,2,'2023-09-28','2023-09-30','400000',NULL,NULL,2,NULL,NULL);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tarif` */

DROP TABLE IF EXISTS `tarif`;

CREATE TABLE `tarif` (
  `id_tarif` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `waktu_sewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `jenis_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tarif` */

insert  into `tarif`(`id_tarif`,`waktu_sewa`,`harga_sewa`,`jenis_mobil`,`created_at`,`updated_at`) values 
(1,'1',200000,'Avanza',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Indah1','indah1@gmail.com',NULL,'$2y$10$IxEL0JKhyE9ao1Jh5esrWOvXef6Vn8rIlGQdGZ.WceM9y7lbW1h4.','Admin',NULL,NULL,NULL),
(2,'ren','ren@gmail.com',NULL,'$2y$10$gTAe95Lk8CIoyqv/nD.kBuA.WvuLr9R/JDznZ2nUHxBXkgQOD0YMi','Pelanggan',NULL,NULL,NULL),
(3,'indah','indah@gmail.com',NULL,'$2y$10$om63e6.QnjhAcw3aUEkC1ujCjvA/DZoTtZM9/SM77jfwW/i4JBFz.','Admin',NULL,NULL,NULL),
(4,'Sugito','s@gmail.com',NULL,'$2y$10$GxAoRXWU/LZ8WPyL2nZBlOkTbEw5B1colBa3RhTIIahVK0jjUV/w6','Pelanggan',NULL,NULL,NULL),
(5,'indah2','indah2@gmail.com',NULL,'$2y$10$UJW6xo5nOkB4xRC2tqkxfOC9Rxx.aEdVvgGdiVV/EuKmb1IeCBkPG','Admin',NULL,NULL,NULL),
(6,'supono','supono@gmail.com',NULL,'$2y$10$wGRu9yf7MLx.Ox5BfI9S3.BLARtLEOWnwJrj/LKTVTTKKM3IJn9d6','Pelanggan',NULL,NULL,NULL),
(8,'indah3','indah3@gmail.com',NULL,'$2y$10$AMNjYtDOXFCcr.IVGkkt6e/D0nziHxXkR3BcRb0S51oN/SvFxbb7e','Admin',NULL,NULL,NULL),
(9,'susant','susan@gmail.com',NULL,'$2y$10$5x2zCneIVcUEe5A.wG/lUuHWBHjsStewZN2LbUMaDFZhmKN1tzVFG','Pelanggan',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

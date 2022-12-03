/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - paginaads
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`paginaads` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `paginaads`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2019_12_14_000001_create_personal_access_tokens_table',1),
(4,'2022_02_24_230122_tb_tablas',1),
(6,'2022_03_13_204259_tb_ventas',2),
(8,'2022_02_24_031849_tb_productos',3),
(9,'2022_02_24_040711_usuarios',4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tb_productos` */

DROP TABLE IF EXISTS `tb_productos`;

CREATE TABLE `tb_productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tabla` int(11) DEFAULT NULL,
  `precio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_productos` */

insert  into `tb_productos`(`id`,`foto`,`foto2`,`foto3`,`foto4`,`nombre`,`descripcion`,`id_tabla`,`precio`,`created_at`,`updated_at`) values 
(2,'20220328_004516_lenovo 2.webp','20220328_004516_20220328_004516_lenovo 2.webp','20220328_004516_20220328_004516_20220328_004516_lenovo 2.webp','20220328_004516_20220328_004516_20220328_004516_20220328_004516_lenovo 2.webp','Lenovo Ideapad 330S-14ikB','8 GB de RAM, 1 TB Disco Duro',1,'12000','2022-03-28 00:45:44','2022-03-28 00:45:44');

/*Table structure for table `tb_tablas` */

DROP TABLE IF EXISTS `tb_tablas`;

CREATE TABLE `tb_tablas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_tablas` */

insert  into `tb_tablas`(`id`,`nombre`,`clave`,`created_at`,`updated_at`) values 
(1,'Productos','1',NULL,NULL),
(2,'Servicios','2',NULL,NULL);

/*Table structure for table `tb_usuarios` */

DROP TABLE IF EXISTS `tb_usuarios`;

CREATE TABLE `tb_usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fn` date DEFAULT NULL,
  `gen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `aviso_privacidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `encrypted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_usuarios` */

insert  into `tb_usuarios`(`id`,`nombre`,`app`,`email`,`fn`,`gen`,`tel`,`direccion`,`password`,`tipo`,`aviso_privacidad`,`created_at`,`updated_at`,`encrypted`) values 
(1,'Adair','Corona','123@gmail.com','2001-03-10','Masculino','7221309448','Zacamulpa Huitzizilapan','I23KZAhM61kzKcB3uQOB4Q==',1,'Aceptado','2022-03-19 07:01:42','2022-03-19 07:01:42',1),
(5,'Adair','Corona','adair@gmail.com','2001-03-10','Masculino','7221309448','Emiliano Zapata No.2','T/kB5WKXHsQlbhlo75qTOQ==',2,'Aceptado','2022-03-19 15:32:18','2022-03-19 15:32:18',1),
(17,'Adair','Corona','corona@gmail.com','2001-03-10','Masculino','7223115750','Calle Emiliano Zapata','/7WYZPmmnOjdiZSuUBuKFw==',2,'Aceptado','2022-03-28 01:39:37','2022-03-28 01:39:37',0);

/*Table structure for table `tb_ventas` */

DROP TABLE IF EXISTS `tb_ventas`;

CREATE TABLE `tb_ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_ventas` */

insert  into `tb_ventas`(`id`,`id_producto`,`id_usuario`,`cantidad`,`precio`,`created_at`,`updated_at`) values 
(1,'2','2','2','17000','2022-03-14 06:05:01','2022-03-14 06:05:01'),
(2,'2','2','3','25500','2022-03-14 06:11:10','2022-03-14 06:11:10'),
(3,'2','2','3','25500','2022-03-14 06:34:29','2022-03-14 06:34:29'),
(4,'1','3','1','7505','2022-03-14 06:41:59','2022-03-14 06:41:59'),
(5,'2','4','1','8500','2022-03-16 22:29:16','2022-03-16 22:29:16'),
(6,'1','5','2','4000','2022-03-26 05:46:11','2022-03-26 05:46:11'),
(7,'1','15','5','10000','2022-03-28 00:32:59','2022-03-28 00:32:59');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

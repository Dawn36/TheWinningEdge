/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.33 : Database - the_winning_edge
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`the_winning_edge` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `the_winning_edge`;

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `companies` */

/*Table structure for table `company_files` */

DROP TABLE IF EXISTS `company_files`;

CREATE TABLE `company_files` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `companies_id` bigint(20) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `ext` varchar(20) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `company_files` */

/*Table structure for table `company_notes` */

DROP TABLE IF EXISTS `company_notes`;

CREATE TABLE `company_notes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `companies_id` bigint(20) DEFAULT NULL,
  `note` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `company_notes` */

/*Table structure for table `contact_history` */

DROP TABLE IF EXISTS `contact_history`;

CREATE TABLE `contact_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `contacts_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `status` enum('phone_call','live_conversation','voice_mail','email','meeting') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contact_history` */

/*Table structure for table `contact_note` */

DROP TABLE IF EXISTS `contact_note`;

CREATE TABLE `contact_note` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `contact_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `note` text CHARACTER SET latin1,
  `status` enum('open','in process','complete') CHARACTER SET latin1 DEFAULT 'open',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `contact_note` */

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `status` enum('Current Client','Active Discussion','Not Interested','Unsubscribed','Prospect','aa','User') DEFAULT 'Prospect',
  `tags` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `companies_id` bigint(20) DEFAULT NULL,
  `linked_in_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contacts` */

/*Table structure for table `email_templates` */

DROP TABLE IF EXISTS `email_templates`;

CREATE TABLE `email_templates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `template_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `email_templates` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('login','register') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

/*Data for the table `logs` */

insert  into `logs`(`id`,`full_name`,`email`,`description`,`status`,`created_at`) values (1,'Dawn Gill','dawngill08@gmail.com',NULL,'login','2022-11-28 07:33:33'),(2,'Dawn Gill','dawngill08@gmail.com',NULL,'login','2022-11-28 01:21:58'),(3,'tony ','tony.giudice5@gmail.com',NULL,'login','2022-12-06 12:18:03'),(4,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-06 12:20:05'),(5,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-06 02:54:49'),(6,'tony ','tony.giudice5@gmail.com',NULL,'login','2022-12-06 03:02:14'),(7,'tony ','tony.giudice5@gmail.com',NULL,'login','2022-12-06 03:04:05'),(8,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-06 05:35:38'),(9,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-07 08:08:53'),(10,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'register','2022-12-07 11:24:03'),(11,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-07 01:33:31'),(12,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-07 08:45:31'),(13,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-08 08:29:53'),(14,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-08 10:48:13'),(15,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-08 10:52:47'),(16,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-08 01:54:50'),(17,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-08 07:12:56'),(18,'tony ','tony.giudice5@gmail.com',NULL,'login','2022-12-08 08:03:42'),(19,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-09 11:02:37'),(20,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-09 02:17:05'),(21,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-09 02:18:02'),(22,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-10 10:52:38'),(23,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-12 08:23:30'),(24,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-12 11:18:04'),(25,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-12 05:16:19'),(26,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-13 07:59:27'),(27,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-13 09:25:16'),(28,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-13 12:39:37'),(29,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-13 01:21:47'),(30,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-13 07:07:40'),(31,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-14 08:30:45'),(32,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-14 03:44:04'),(33,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-14 03:51:06'),(34,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-14 07:54:14'),(35,'tony ','tony.giudice5@gmail.com',NULL,'login','2022-12-15 08:22:09'),(36,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-15 08:22:32'),(37,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-15 09:18:58'),(38,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-15 11:53:59'),(39,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-15 02:52:55'),(40,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-15 05:39:17'),(41,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-15 06:35:20'),(42,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-16 08:03:53'),(43,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-16 12:10:54'),(44,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-16 02:42:09'),(45,'tony ','tony.giudice5@gmail.com',NULL,'login','2022-12-16 02:52:16'),(46,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-16 03:55:52'),(47,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-16 05:22:09'),(48,'tony ','tony.giudice5@gmail.com',NULL,'login','2022-12-16 05:25:36'),(49,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-16 05:27:49'),(50,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-18 10:31:22'),(51,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-18 04:48:35'),(52,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-19 08:03:57'),(53,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-19 12:51:23'),(54,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-19 02:25:06'),(55,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-19 03:18:07'),(56,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-19 05:26:55'),(57,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-19 05:42:45'),(58,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-20 07:52:51'),(59,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-20 02:28:27'),(60,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-20 03:06:54'),(61,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-21 08:28:50'),(62,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-21 12:45:40'),(63,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-21 01:35:53'),(64,'Omar Mason','dawngill08@gmail.com',NULL,'register','2022-12-21 01:41:41'),(65,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-21 02:00:32'),(66,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-21 02:00:58'),(67,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-21 03:02:44'),(68,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-21 05:29:15'),(69,'tony ','tony.giudice5@gmail.com',NULL,'login','2022-12-21 06:16:00'),(70,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-21 06:18:44'),(71,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-21 10:00:44'),(72,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-22 08:07:57'),(73,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-22 08:40:46'),(74,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-22 09:04:01'),(75,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-22 02:41:35'),(76,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-22 06:21:50'),(77,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-23 10:35:55'),(78,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-23 12:04:35'),(79,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-23 12:04:46'),(80,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-23 12:48:05'),(81,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-23 02:20:39'),(82,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-23 11:29:47'),(83,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-24 05:56:33'),(84,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-24 06:26:13'),(85,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-24 07:55:12'),(86,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-24 09:56:09'),(87,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-26 06:45:59'),(88,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-26 06:50:31'),(89,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-26 06:58:42'),(90,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-26 07:45:07'),(91,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-26 09:52:06'),(92,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-26 11:10:21'),(93,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-26 12:16:38'),(94,'Tony Giudice','tony.giudice5@gmail.com',NULL,'login','2022-12-26 12:21:16'),(95,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-26 12:41:37'),(96,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-27 07:50:53'),(97,'Omar Mason','dawngill08@gmail.com',NULL,'login','2022-12-27 09:18:55'),(98,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-27 01:18:37'),(99,'Anthony Giudice','anthony.giudice@thomsonreuters.com',NULL,'login','2022-12-27 01:22:45'),(100,'Tony Giudice','tony.giudice@thomsonreuters.com',NULL,'login','2022-12-27 03:26:27');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_09_30_174128_laratrust_setup_tables',2),(5,'2022_11_05_105631_create_jobs_table',3);

/*Table structure for table `opportunities` */

DROP TABLE IF EXISTS `opportunities`;

CREATE TABLE `opportunities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `contract_amount` varchar(255) DEFAULT '0',
  `duration` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `status` enum('open','pricing sent','contract sent','closed') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `opportunities` */

insert  into `opportunities`(`id`,`user_id`,`contact_id`,`company_id`,`contract_amount`,`duration`,`file_name`,`path`,`note`,`size`,`created_at`,`created_by`,`updated_at`,`updated_by`,`status`) values (1,2,1,1,NULL,NULL,'','',NULL,'','2022-12-03 19:07:47',2,'2022-12-18 00:00:00',NULL,'closed'),(3,2,3,3,'21000',NULL,'','',NULL,'','2022-12-04 11:22:41',2,'2022-12-04 22:38:01',NULL,'contract sent'),(4,2,7,4,'21000',NULL,'','',NULL,'','2022-12-04 11:37:26',2,'2022-12-04 22:37:57',NULL,'contract sent'),(5,2,8,5,'36000',NULL,'','',NULL,'','2022-12-04 22:10:13',2,'2022-12-04 00:00:00',NULL,'pricing sent'),(6,2,10,6,'36000',NULL,'','',NULL,'','2022-12-04 22:37:02',2,'2022-12-04 00:00:00',NULL,'pricing sent'),(7,2,12,7,'36000',NULL,'','',NULL,'','2022-12-04 22:43:34',2,'2022-12-04 22:43:34',NULL,'pricing sent'),(8,2,14,8,'0','just purchased ED&F Man who has CLEAR, said they will get access thru them','','',NULL,'','2022-12-04 22:58:23',2,'2022-12-08 00:00:00',NULL,'closed'),(9,2,18,9,'0',NULL,'','',NULL,'','2022-12-04 23:04:24',2,'2022-12-04 23:04:24',NULL,'open'),(10,2,21,10,'0','waiting on signed NDA','','',NULL,'','2022-12-04 23:15:28',2,'2022-12-08 00:00:00',NULL,'open'),(11,3,27,2,'10000','12','','',NULL,'','2022-12-05 12:43:46',3,'2022-12-05 12:43:46',NULL,'open'),(30,2,2188,94,'8112',NULL,'','',NULL,'','2022-12-07 14:53:00',2,'2022-12-07 14:53:00',NULL,'open'),(31,7,2191,77,'21996','36','','',NULL,'','2022-12-07 20:52:50',7,'2022-12-15 18:40:03',NULL,'closed'),(33,2,2154,76,'7500',NULL,'','',NULL,'','2022-12-08 10:54:00',2,'2022-12-20 00:00:00',NULL,'contract sent'),(40,2,2208,100,'50000',NULL,'','',NULL,'','2022-12-08 15:15:40',2,'2022-12-13 00:00:00',NULL,'open'),(47,2,2229,104,'0',NULL,'','',NULL,'','2022-12-09 16:30:32',2,'2022-12-09 16:30:32',NULL,'open'),(49,7,2171,84,'0',NULL,'','',NULL,'','2022-12-12 19:16:24',7,'2022-12-21 17:52:52',NULL,'open'),(50,2,2296,126,'17400',NULL,'','',NULL,'','2022-12-13 13:52:20',2,'2022-12-15 00:00:00',NULL,'closed'),(51,2,2500,135,'20988',NULL,'','',NULL,'','2022-12-19 15:21:55',2,'2022-12-19 15:21:55',NULL,'closed'),(52,7,2491,131,'48000','36','','',NULL,'','2022-12-20 15:08:53',7,'2022-12-20 15:08:53',NULL,'open'),(53,7,2179,89,NULL,NULL,'','',NULL,'','2022-12-20 16:46:54',7,'2022-12-20 16:46:54',NULL,'open'),(54,7,2493,132,NULL,NULL,'','',NULL,'','2022-12-23 12:08:03',7,'2022-12-23 12:08:03',NULL,'open');

/*Table structure for table `opportunities_target` */

DROP TABLE IF EXISTS `opportunities_target`;

CREATE TABLE `opportunities_target` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `opportunities_target` */

insert  into `opportunities_target`(`id`,`user_id`,`target`,`created_at`) values (1,2,'100000','2022-12-08 00:00:00'),(2,7,'100000','2022-12-14 00:00:00');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1);

/*Table structure for table `permission_user` */

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_user` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'users-create','Create Users','Create Users','2022-09-30 17:42:50','2022-09-30 17:42:50'),(2,'users-read','Read Users','Read Users','2022-09-30 17:42:50','2022-09-30 17:42:50'),(3,'users-update','Update Users','Update Users','2022-09-30 17:42:50','2022-09-30 17:42:50'),(4,'users-delete','Delete Users','Delete Users','2022-09-30 17:42:50','2022-09-30 17:42:50'),(5,'payments-create','Create Payments','Create Payments','2022-09-30 17:42:50','2022-09-30 17:42:50'),(6,'payments-read','Read Payments','Read Payments','2022-09-30 17:42:50','2022-09-30 17:42:50'),(7,'payments-update','Update Payments','Update Payments','2022-09-30 17:42:50','2022-09-30 17:42:50'),(8,'payments-delete','Delete Payments','Delete Payments','2022-09-30 17:42:50','2022-09-30 17:42:50'),(9,'profile-read','Read Profile','Read Profile','2022-09-30 17:42:50','2022-09-30 17:42:50'),(10,'profile-update','Update Profile','Update Profile','2022-09-30 17:42:50','2022-09-30 17:42:50');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(2,2,'App\\Models\\User'),(2,3,'App\\Models\\User'),(2,7,'App\\Models\\User'),(2,8,'App\\Models\\User');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'admin','Admin','Admin','2022-09-30 17:42:50','2022-09-30 17:42:50'),(2,'user','User','User','2022-11-06 03:42:14','2022-11-06 03:42:17');

/*Table structure for table `rpa_target` */

DROP TABLE IF EXISTS `rpa_target`;

CREATE TABLE `rpa_target` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `phone_call` bigint(20) DEFAULT NULL,
  `live_conversation` bigint(20) DEFAULT NULL,
  `voice_mail` bigint(20) DEFAULT NULL,
  `email` bigint(20) DEFAULT NULL,
  `meeting` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `rpa_target` */

insert  into `rpa_target`(`id`,`user_id`,`phone_call`,`live_conversation`,`voice_mail`,`email`,`meeting`,`created_at`) values (1,7,1000,120,0,0,20,'2022-12-13 00:00:00');

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tags` */

insert  into `tags`(`id`,`user_id`,`name`,`created_at`) values (1,8,'daw','2022-12-24 00:00:00'),(2,7,'12-27','2022-12-27 00:00:00'),(3,7,'december','2022-12-27 00:00:00'),(4,7,'12-19','2022-12-27 00:00:00');

/*Table structure for table `tags_contact` */

DROP TABLE IF EXISTS `tags_contact`;

CREATE TABLE `tags_contact` (
  `contact_id` bigint(20) DEFAULT NULL,
  `tags_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tags_contact` */

insert  into `tags_contact`(`contact_id`,`tags_id`) values (2801,1),(2805,2),(2805,3),(2806,2),(2806,3),(2807,2),(2807,3),(2808,2),(2808,3),(2809,2),(2809,3),(2810,2),(2810,3),(2811,2),(2811,3),(2812,2),(2812,3),(2813,2),(2813,3),(2814,2),(2814,3),(2815,2),(2815,3),(2816,2),(2816,3),(2817,2),(2817,3),(2818,2),(2818,3),(2819,2),(2819,3),(2820,2),(2820,3),(2821,2),(2821,3),(2823,2),(2823,3),(2824,2),(2824,3),(2825,2),(2825,3),(2826,2),(2826,3),(2827,2),(2827,3),(2828,2),(2828,3),(2829,2),(2829,3),(2830,2),(2830,3),(2831,2),(2831,3),(2832,2),(2832,3),(2833,2),(2833,3),(2834,2),(2834,3),(2835,2),(2835,3),(2836,2),(2836,3),(2837,2),(2837,3),(2838,2),(2838,3),(2839,2),(2839,3),(2840,2),(2840,3),(2841,2),(2841,3),(2842,2),(2842,3),(2843,2),(2843,3),(2844,2),(2844,3),(2845,2),(2845,3),(2846,2),(2846,3),(2848,2),(2848,3),(2849,2),(2849,3),(2850,2),(2850,3),(2851,2),(2851,3),(2852,2),(2852,3),(2853,2),(2853,3),(2854,2),(2854,3),(2847,2),(2847,3),(2855,4),(2855,3),(2856,4),(2856,3),(2857,4),(2857,3),(2858,4),(2858,3),(2859,4),(2859,3),(2860,4),(2860,3),(2861,4),(2861,3),(2862,4),(2862,3),(2863,4),(2863,3),(2864,4),(2864,3),(2865,4),(2865,3),(2866,4),(2866,3),(2867,4),(2867,3),(2868,4),(2868,3),(2869,4),(2869,3),(2870,4),(2870,3),(2871,4),(2871,3),(2872,4),(2872,3),(2873,4),(2873,3),(2874,4),(2874,3),(2875,4),(2875,3),(2876,4),(2876,3),(2877,4),(2877,3),(2878,4),(2878,3),(2879,4),(2879,3),(2880,4),(2880,3),(2881,4),(2881,3),(2882,4),(2882,3),(2883,4),(2883,3),(2884,4),(2884,3),(2885,4),(2885,3),(2886,4),(2886,3),(2887,4),(2887,3),(2888,4),(2888,3),(2889,4),(2889,3),(2890,4),(2890,3),(2891,4),(2891,3),(2892,4),(2892,3),(2893,4),(2893,3),(2894,4),(2894,3),(2895,4),(2895,3),(2896,4),(2896,3),(2897,4),(2897,3),(2898,4),(2898,3),(2899,4),(2899,3),(2900,4),(2900,3),(2901,4),(2901,3),(2902,4),(2902,3),(2903,4),(2903,3),(2904,4),(2904,3),(2905,4),(2905,3),(2906,4),(2906,3),(2907,4),(2907,3),(2908,4),(2908,3),(2909,4),(2909,3),(2910,4),(2910,3),(2911,4),(2911,3),(2912,4),(2912,3),(2913,4),(2913,3),(2914,4),(2914,3),(2915,4),(2915,3),(2916,4),(2916,3),(2917,4),(2917,3),(2918,4),(2918,3),(2919,4),(2919,3),(2920,4),(2920,3),(2921,4),(2921,3),(2922,4),(2922,3),(2923,4),(2923,3),(2924,4),(2924,3),(2925,4),(2925,3),(2926,4),(2926,3),(2927,4),(2927,3),(2928,4),(2928,3),(2929,4),(2929,3),(2930,4),(2930,3),(2931,4),(2931,3),(2932,4),(2932,3),(2933,4),(2933,3),(2934,4),(2934,3),(2935,4),(2935,3),(2936,4),(2936,3),(2937,4),(2937,3),(2938,4),(2938,3),(2939,4),(2939,3),(2940,4),(2940,3),(2941,4),(2941,3),(2942,4),(2942,3),(2943,4),(2943,3),(2944,4),(2944,3),(2945,4),(2945,3),(2946,4),(2946,3),(2947,4),(2947,3),(2948,4),(2948,3),(2949,4),(2949,3),(2950,4),(2950,3),(2951,4),(2951,3),(2952,4),(2952,3),(2953,4),(2953,3),(2954,4),(2954,3),(2955,4),(2955,3),(2956,4),(2956,3),(2957,4),(2957,3),(2958,4),(2958,3),(2959,4),(2959,3),(2960,4),(2960,3),(2961,4),(2961,3),(2962,4),(2962,3),(2963,4),(2963,3),(2964,4),(2964,3),(2965,4),(2965,3),(2966,4),(2966,3),(2967,4),(2967,3),(2968,4),(2968,3),(2969,4),(2969,3),(2970,4),(2970,3),(2971,4),(2971,3),(2972,4),(2972,3),(2973,4),(2973,3),(2974,4),(2974,3),(2975,4),(2975,3),(2976,4),(2976,3),(2977,4),(2977,3),(2978,4),(2978,3),(2979,4),(2979,3),(2980,4),(2980,3),(2981,4),(2981,3),(2982,4),(2982,3),(2983,4),(2983,3),(2984,4),(2984,3),(2985,4),(2985,3),(2986,4),(2986,3),(2987,4),(2987,3),(2988,4),(2988,3),(2989,4),(2989,3),(2990,4),(2990,3),(2991,4),(2991,3),(2992,4),(2992,3),(2993,4),(2993,3),(2994,4),(2994,3),(2995,4),(2995,3),(2996,4),(2996,3),(2997,4),(2997,3),(2998,4),(2998,3),(2999,4),(2999,3),(3000,4),(3000,3),(3001,4),(3001,3),(3002,4),(3002,3),(3003,4),(3003,3),(3004,4),(3004,3),(3005,4),(3005,3),(3006,4),(3006,3),(3007,4),(3007,3),(3008,4),(3008,3),(3009,4),(3009,3),(3010,4),(3010,3),(3011,4),(3011,3),(3012,4),(3012,3),(3013,4),(3013,3),(3014,4),(3014,3),(3015,4),(3015,3),(3016,4),(3016,3),(3017,4),(3017,3),(3018,4),(3018,3),(3019,4),(3019,3),(3020,4),(3020,3),(3021,4),(3021,3),(3022,4),(3022,3),(3023,4),(3023,3),(3024,4),(3024,3),(3025,4),(3025,3),(3026,4),(3026,3),(3027,4),(3027,3),(3028,4),(3028,3),(3029,4),(3029,3),(3030,4),(3030,3),(3031,4),(3031,3),(3032,4),(3032,3),(3033,4),(3033,3),(3034,4),(3034,3),(3035,4),(3035,3),(3036,4),(3036,3),(3037,4),(3037,3),(3038,4),(3038,3),(3039,4),(3039,3),(3040,4),(3040,3),(3041,4),(3041,3),(3042,4),(3042,3),(3043,4),(3043,3),(3044,4),(3044,3),(3045,4),(3045,3),(3046,4),(3046,3),(3047,4),(3047,3),(3048,4),(3048,3),(3049,4),(3049,3),(3050,4),(3050,3),(3051,4),(3051,3),(3052,4),(3052,3),(3053,4),(3053,3),(3054,4),(3054,3),(3055,4),(3055,3),(3056,4),(3056,3),(3057,4),(3057,3),(3058,4),(3058,3),(3059,4),(3059,3),(3060,4),(3060,3),(3061,4),(3061,3),(3062,4),(3062,3),(3063,4),(3063,3),(3064,4),(3064,3),(3065,4),(3065,3),(3066,4),(3066,3),(3067,4),(3067,3),(3068,4),(3068,3),(3069,4),(3069,3),(3070,4),(3070,3),(3071,4),(3071,3),(3072,4),(3072,3),(3073,4),(3073,3),(3074,4),(3074,3),(3075,4),(3075,3),(3076,4),(3076,3),(3077,4),(3077,3),(3078,4),(3078,3),(3079,4),(3079,3),(3080,4),(3080,3),(3081,4),(3081,3),(3082,4),(3082,3),(3083,4),(3083,3),(3084,4),(3084,3),(3085,4),(3085,3),(3086,4),(3086,3),(3087,4),(3087,3),(3088,4),(3088,3),(3089,4),(3089,3),(3092,4),(3092,3),(3093,4),(3093,3),(3094,4),(3094,3),(3095,4),(3095,3),(3096,4),(3096,3),(3097,4),(3097,3),(3098,4),(3098,3),(3100,4),(3100,3),(3101,4),(3101,3),(3102,4),(3102,3),(3104,4),(3104,3),(3105,4),(3105,3),(3106,4),(3106,3),(3107,4),(3107,3),(3108,4),(3108,3),(3109,4),(3109,3),(3110,4),(3110,3),(3113,4),(3113,3),(3115,4),(3115,3),(3116,4),(3116,3),(3117,4),(3117,3),(3118,4),(3118,3),(3119,4),(3119,3),(3120,4),(3120,3),(3121,4),(3121,3),(3122,4),(3122,3),(3123,4),(3123,3),(3124,4),(3124,3),(3125,4),(3125,3),(3114,4),(3114,3),(3112,4),(3112,3),(3111,4),(3111,3),(3103,4),(3103,3),(3099,4),(3099,3),(3126,4),(3126,3),(3091,4),(3091,3),(3090,4),(3090,3);

/*Table structure for table `talk_tracks` */

DROP TABLE IF EXISTS `talk_tracks`;

CREATE TABLE `talk_tracks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `talk_track_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `note` text CHARACTER SET latin1,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `talk_tracks` */

insert  into `talk_tracks`(`id`,`user_id`,`talk_track_name`,`note`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,7,'Month 1 Day 2 VM 1','<p>Hi - </p><p>This is Tony with Thomson Reuters CLEAR, i\'m following up on the email I sent you. Let me know if you\'d like to connect. </p><p>Thanks,</p>','2022-12-23 03:53:27',7,'2022-12-23 00:00:00',7),(2,7,'Month 1 Day 19 VM 2','<p>Hi this is Tony with Thomson Reuters CLEAR, i\'ll be sending over an email with some more insight shortly Let me know if you\'d like to connect</p>','2022-12-23 04:48:44',7,'2022-12-23 16:48:44',NULL),(3,2,'when they answer','<p>This is Anthony with TR CLEAR. Just need 12 seconds to tell you the reason for my call and if what I say is not relevant, you can end the call there, does that make sense? </p><p><br></p><p>We offer a resource to streamline you Due Diligence efforts to mitigate risk on people and businesses. We work with (banks, Asset Mgrs,) firms like yours in their compliance and aml dpets, commercial underwiring, Risk deparments. Was calling to shedule  over the next few days.</p>','2022-12-23 05:00:26',2,'2022-12-23 17:00:26',NULL),(4,7,'Talk Track 1','<p>Hi my names Tony im with Thomson Reuters - im just looking for about 8 seconds to explain the reason for my call - if what i say isnt relevant we can end there - does that sound fair?</p><p><br></p><p>We offer a resource to streamline due diligence efforts to mitigate risk on people &amp; businesses, looking for things like negative news, arrests, criminal &amp; court records, litigation and more to improve these workflows</p><p><br></p><p>Would you like to schedule a quick intro call over the next few days?</p><p><br></p><p><br></p>','2022-12-23 05:00:27',7,'2022-12-23 17:00:27',NULL),(5,7,'Objection - Not Interested/Good w what we have','<p>I get it, it sounds like you have a solution in place and im not looking to convince you to switch systems or for a financial commitment, rather just a 20 minute intro call to share some insights about how we support other (companies like yours)</p><p><br></p><p>too much to ask for 20 minutes to share these insights with you</p>','2022-12-23 05:02:43',7,'2022-12-23 17:02:43',NULL),(6,7,'Objection - Not Interested/Good w what we have 2','<p>It sounds like you have a program in place, which i understand - if we schedule 15-20 min you can assess what we offer to see if it would be helpful and if not, no harm no foul - worst case scenario we created a connection and im pretty well networked in the industry if theres anything i can do for you in the future let m know</p><p><br></p><p>how does next tuesday work?</p>','2022-12-23 05:07:40',7,'2022-12-23 00:00:00',7),(7,7,'Objection - send email first','<p>Yeah sure ill send over some information, how about if we pop down some time on the calendar to catch up about it afterwards - if the email &amp; data\'s irrelevant feel free to decline, no harm no foul - does that work w you?</p>','2022-12-23 05:10:07',7,'2022-12-23 17:10:07',NULL);

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `task_date` datetime DEFAULT NULL,
  `task_status` enum('open','in progress','completed') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `tasks` */

insert  into `tasks`(`id`,`user_id`,`contact_id`,`description`,`task_date`,`task_status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,2,14,'call','2022-12-05 00:00:00','completed','2022-12-04 10:52:50',2,'2022-12-07 13:56:53',NULL),(2,3,27,'Email','2022-12-16 00:00:00','open','2022-12-05 12:53:32',3,'2022-12-05 12:53:32',NULL),(4,2,2154,'send pricing for monitoring 150 subjects against AM and PUblic Records. Also do a batch of Risk Inform of 150','2022-12-08 00:00:00','completed','2022-12-07 01:44:39',2,'2022-12-08 14:02:59',NULL),(7,7,2163,'Call/Email - look at Follow Up','2023-01-03 00:00:00','open','2022-12-07 02:29:03',7,'2022-12-27 11:45:32',7),(10,2,3,'f/up 2nd week of december','2022-12-12 00:00:00','completed','2022-12-07 04:09:00',2,'2022-12-21 17:35:07',NULL),(13,7,2200,'Email - check long term follow up folder','2023-01-09 00:00:00','open','2022-12-08 12:00:39',7,'2022-12-08 12:00:39',NULL),(15,2,2205,'schedule meeting','2022-12-09 00:00:00','completed','2022-12-08 02:01:20',2,'2022-12-21 17:34:59',NULL),(17,7,2186,'Call - check notes','2023-01-10 00:00:00','open','2022-12-08 03:46:46',7,'2022-12-08 15:46:46',NULL),(23,7,2191,'Email follow up w info in notes - \r\nsee demo debrief','2022-12-12 00:00:00','completed','2022-12-09 12:03:08',7,'2022-12-20 14:29:42',NULL),(25,7,2162,'F/u w Patrick & Bryce - check notes','2023-03-20 00:00:00','open','2022-12-12 04:11:27',7,'2022-12-23 12:17:28',7),(26,7,2178,'f/u to schedule training - check notes','2022-12-27 00:00:00','open','2022-12-12 04:21:45',7,'2022-12-23 12:19:00',7),(27,7,2187,'f/u - see notes','2023-01-10 00:00:00','open','2022-12-12 04:50:28',7,'2022-12-12 06:33:00',7),(28,7,2174,'f/u to schedule a training','2023-01-02 00:00:00','open','2022-12-12 06:36:23',7,'2022-12-12 06:43:48',7),(29,7,2171,'f/u to schedule training - see notes','2022-12-16 00:00:00','completed','2022-12-12 07:17:52',7,'2022-12-20 04:51:52',7),(30,7,2294,'f/u - check clients 2023 foldr','2023-01-26 00:00:00','open','2022-12-13 08:02:54',7,'2022-12-13 08:02:54',NULL),(31,7,2272,'f/u - spoke 12-13, he said he would look at my email and get back to me','2022-12-15 00:00:00','completed','2022-12-13 10:39:37',7,'2022-12-27 11:54:04',NULL),(32,7,2231,'f/u - check notes','2023-03-13 00:00:00','open','2022-12-13 02:24:11',7,'2022-12-13 14:24:11',NULL),(34,7,2227,'f/u','2022-12-19 00:00:00','completed','2022-12-14 08:31:15',7,'2022-12-20 14:30:06',NULL),(35,7,2226,'f/u check notes','2023-01-04 00:00:00','completed','2022-12-15 12:03:27',7,'2022-12-27 11:53:55',NULL),(37,7,2201,'f/u to schedule training in new year','2023-01-04 00:00:00','open','2022-12-16 05:28:44',7,'2022-12-16 17:28:44',NULL),(38,2,21,'send due diligence response,','2022-12-19 00:00:00','completed','2022-12-18 11:14:58',2,'2022-12-21 17:34:44',NULL),(39,7,2179,'f/u to schedule a demo','2022-12-29 00:00:00','completed','2022-12-19 08:13:00',7,'2022-12-21 18:08:24',NULL),(40,7,2171,'f/u to schedule training - check notes','2023-01-02 00:00:00','open','2022-12-20 04:52:11',7,'2022-12-20 16:52:11',NULL),(42,7,2493,'f/u to schedule meeting','2023-01-09 00:00:00','completed','2022-12-21 12:46:31',7,'2022-12-21 17:53:02',NULL),(44,7,2493,'f/u - check notes','2023-01-16 00:00:00','open','2022-12-21 05:53:45',7,'2022-12-21 17:53:45',NULL),(45,7,2728,'f/u','1969-12-31 00:00:00','completed','2022-12-21 05:54:11',7,'2022-12-21 17:54:24',NULL),(50,7,NULL,'Call','2022-12-23 00:00:00','completed','2022-12-23 12:09:50',7,'2022-12-23 12:09:54',NULL),(57,7,NULL,'Call','2022-12-23 00:00:00','completed','2022-12-23 12:15:09',7,'2022-12-23 12:15:50',NULL),(64,7,2196,'F/u - check demo debrief','2023-01-10 00:00:00','open','2022-12-27 11:44:53',7,'2022-12-27 11:44:53',NULL),(65,7,NULL,'12-27 list - day 2 Call, VM, & Email 2','2022-12-28 00:00:00','open','2022-12-27 01:24:33',7,'2022-12-27 13:24:33',NULL);

/*Table structure for table `to_dos` */

DROP TABLE IF EXISTS `to_dos`;

CREATE TABLE `to_dos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('open','completed') DEFAULT 'open',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `to_dos` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`contact_no`,`company_name`,`email`,`user_type`,`email_verified_at`,`password`,`password_show`,`profile_picture`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`updated_by`,`created_by`,`note`) values (1,'Tony','Giudice',NULL,NULL,'tony.giudice5@gmail.com',1,NULL,'$2y$10$.o8YXhFiVpG9vM8yb0XvHeu4tHbkI4y7IPZD9P9qCOyWbG5hqhIBy','aaa','blank.png',NULL,NULL,'2022-12-26 12:21:34',NULL,NULL,NULL,'<p><br></p><ul><li>Send questions to Simon &amp; Paul Schwendel</li><li>Get Youtube stuff together</li><li>Create LLC with Kashir Khan as partner</li><li>TOAOS LLC Name based out of Florida</li></ul>'),(2,'Anthony','Giudice',NULL,NULL,'anthony.giudice@thomsonreuters.com',2,NULL,'$2y$10$Q3N0XxfZ6vGyTKVKLxL.UereGNUREf99mHLPOI0LBQEMeieWifHo6','Back@TR22!','blank.png',NULL,'2022-12-03 19:00:28','2022-12-24 00:59:20',NULL,NULL,NULL,'<p><strong><u>December Add</u></strong>: Traverse Partners, Pfingsten Partners, Right Lane, Akoya, Civic Partners, Industrial Opportunity Partners</p><p><br></p><p><br></p><p>Prospecting Plan -</p><ul><li>Day 1 –</li><li class=\"ql-indent-1\">Email 1 &amp; LI Profile Look</li><li>Day 2 –</li><li class=\"ql-indent-1\">Call, VM, &amp; Email 2</li><li>Day 5 –</li><li class=\"ql-indent-1\">Email 3 &amp; LinkedIn Connection</li><li>Day 10 –</li><li class=\"ql-indent-1\">Call No VM, Email 4</li><li>Day 13 –</li><li class=\"ql-indent-1\">Email 5</li><li>Day 19 –</li><li class=\"ql-indent-1\">Call, VM 2, Email 6</li><li>Day 25 –</li><li class=\"ql-indent-1\">Email 7, LI Msg</li></ul><p><br></p><ul><li>50 new contacts loaded each day</li><li>Bulk file end of month to Zach-</li><li>onboarding or risk or compliance or fraud or corporate security or operations or mergers and acquisitions or CFO or COO or CRO or CTO or KYC or investigations or due diligence or AML/BSA or CDD or EDD or risk operations or governance or technology or CIO or CTO or CEO or CCO or CCO or research or chief credit officer or lending or underwriting or internal audit officer or chief credit risk officer or credit risk officer or senior associate or managing director or vice president or financial crimes or digital banking or fiu or biu or middle market or ggl or government guaranteed lending or business intelligence unit</li></ul>'),(7,'Tony','Giudice',NULL,NULL,'tony.giudice@thomsonreuters.com',2,NULL,'$2y$10$FV5SQ3oR81Oz95kInIUo8uKiUXLKI2FCWACZzjfRFOFy5Zip.9jAS','Mynewhomeapt3!','blank.png',NULL,'2022-12-07 11:24:03','2022-12-27 08:20:58',NULL,NULL,NULL,'<ul><li>12-19 called &amp; email 12-12-2022 list</li><li>Call 12-13-2022 list on 12-20 - emailed 12-19</li></ul><p><br></p><ul><li>Prospecting Plan -</li><li class=\"ql-indent-1\"><span style=\"color: rgb(51, 51, 51); background-color: transparent;\"> </span><span style=\"color: rgb(51, 51, 51);\">Day 1 –</span></li><li class=\"ql-indent-2\"><span style=\"color: rgb(51, 51, 51);\">Email 1 &amp; LI Profile Look</span></li><li class=\"ql-indent-1\"><span style=\"color: rgb(51, 51, 51);\">Day 2 –</span></li><li class=\"ql-indent-2\"><span style=\"color: rgb(51, 51, 51);\">Call, VM, &amp; Email 2</span></li><li class=\"ql-indent-1\"><span style=\"color: rgb(51, 51, 51);\">Day 5 –</span></li><li class=\"ql-indent-2\"><span style=\"color: rgb(51, 51, 51);\">Email 3 &amp; LinkedIn Connection</span></li><li class=\"ql-indent-1\"><span style=\"color: rgb(51, 51, 51);\">Day 10 –</span></li><li class=\"ql-indent-2\"><span style=\"color: rgb(51, 51, 51);\">Call No VM, Email 4</span></li><li class=\"ql-indent-1\"><span style=\"color: rgb(51, 51, 51);\">Day 13 –</span></li><li class=\"ql-indent-2\"><span style=\"color: rgb(51, 51, 51);\">Email 5</span></li><li class=\"ql-indent-1\"><span style=\"color: rgb(51, 51, 51);\">Day 19 –</span></li><li class=\"ql-indent-2\"><span style=\"color: rgb(51, 51, 51);\">Call, VM 2, Email 6</span></li><li class=\"ql-indent-1\"><span style=\"color: rgb(51, 51, 51);\">Day 25 –</span></li><li class=\"ql-indent-2\"><span style=\"color: rgb(51, 51, 51);\">Email 7, LI Msg</span></li></ul><p><br></p><ul><li>50 new contacts loaded each day</li><li>Bulk file end of month to zac -</li><li class=\"ql-indent-1\"><span style=\"color: rgb(51, 51, 51);\">onboarding or risk or compliance or fraud or corporate security or operations or mergers and acquisitions or CFO or COO or CRO or CTO or KYC or investigations or due diligence or AML/BSA or CDD or EDD or risk operations or governance or technology or CIO or CTO or CEO or CCO or CCO or research or chief credit officer or lending or underwriting or internal audit officer or chief credit risk officer or credit risk officer or senior associate or managing director or vice president or financial crimes or digital banking or fiu or biu or middle market or ggl or government guaranteed lending or business intelligence unit</span></li></ul><p><br></p>'),(8,'Omar','Mason',NULL,NULL,'dawngill08@gmail.com',2,NULL,'$2y$10$Qk/raCIUINiu897XlOhQa.MH8XSDSDb451aTQZ.yfrkNTe1b.pXEy','aa','blank.png',NULL,'2022-12-21 13:41:41','2022-12-26 11:10:31',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

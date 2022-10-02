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
  `user_name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` enum('open','in process','complete') DEFAULT 'open',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` enum('current_client','active_discussion','not_interested','unsubscribed','prospect','user') DEFAULT 'current_client',
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `linked_in_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`user_id`,`first_name`,`last_name`,`profile_img`,`job`,`status`,`phone_number`,`email`,`mobile_phone`,`company_name`,`linked_in_url`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,1,'sd','sad',NULL,'sad','current_client','sd','sd','asd','adsd','ada','2022-10-02 00:42:01',NULL,'2022-10-02 00:42:01',NULL),(2,1,'dawn','gill',NULL,'asdsadsad','current_client','231522315','da@gmail.com','2032032','asdsa','asd','2022-10-02 00:42:01',NULL,'2022-10-02 00:42:01',NULL);

/*Table structure for table `email_templates` */

DROP TABLE IF EXISTS `email_templates`;

CREATE TABLE `email_templates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `email_templates` */

insert  into `email_templates`(`id`,`user_id`,`template_name`,`subject`,`body`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,1,'asd','dawm','<p>zc asdsasadsad sd ask dkn <strong>askdsa</strong></p>','2022-09-30 07:29:31',1,'2022-09-30 00:00:00',1);

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

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_09_30_174128_laratrust_setup_tables',2);

/*Table structure for table `opportunities` */

DROP TABLE IF EXISTS `opportunities`;

CREATE TABLE `opportunities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contract_amount` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `opportunities` */

insert  into `opportunities`(`id`,`user_id`,`name`,`company_name`,`contract_amount`,`duration`,`file_name`,`path`,`size`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (3,1,'Ignatius Craft','Rios Guthrie LLC','1000','Ea eligendi aliquam','preview-8.jpg','uploads/opportunity/1/202210011208preview-8.jpg','14451','2022-10-01 12:08:52',1,'2022-10-01 12:08:52',NULL);

/*Table structure for table `opportunities_target` */

DROP TABLE IF EXISTS `opportunities_target`;

CREATE TABLE `opportunities_target` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `opportunities_target` */

insert  into `opportunities_target`(`id`,`user_id`,`target`,`created_at`) values (1,1,'10000','2022-10-01 00:00:00');

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

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(1,3,'App\\Models\\User');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'admin','Admin','Admin','2022-09-30 17:42:50','2022-09-30 17:42:50');

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

insert  into `rpa_target`(`id`,`user_id`,`phone_call`,`live_conversation`,`voice_mail`,`email`,`meeting`,`created_at`) values (1,1,5,5,5,5,5,'2022-10-01 00:00:00');

/*Table structure for table `talk_tracks` */

DROP TABLE IF EXISTS `talk_tracks`;

CREATE TABLE `talk_tracks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `talk_track_name` varchar(255) DEFAULT NULL,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `talk_tracks` */

insert  into `talk_tracks`(`id`,`user_id`,`talk_track_name`,`note`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,1,'aaaaaaa','<p>aaaaaaaaanbbbbbbbbbb</p>','2022-09-30 08:12:51',1,'2022-09-30 00:00:00',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`contact_no`,`company_name`,`email`,`email_verified_at`,`password`,`password_show`,`profile_picture`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`updated_by`,`created_by`,`note`) values (1,'Dawn','Gill','020230300203','asdasd','dawngill08@gmail.com',NULL,'$2y$10$.o8YXhFiVpG9vM8yb0XvHeu4tHbkI4y7IPZD9P9qCOyWbG5hqhIBy','aaa','1/202209301840food-beverage-16.jpg',NULL,NULL,'2022-10-01 21:26:59',NULL,1,NULL,'<p>sdda </p><p>sdas<strong> das dxa sads sadas a</strong></p><p><br></p>'),(3,'Colleen','Maldonado','09451531651','Colon and Hale Inc','dulib@mailinator.com',NULL,'$2y$10$.o8YXhFiVpG9vM8yb0XvHeu4tHbkI4y7IPZD9P9qCOyWbG5hqhIBy','aaa','blank.png',NULL,'2022-09-30 21:40:05','2022-10-02 10:48:42',NULL,NULL,1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

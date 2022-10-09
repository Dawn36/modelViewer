/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.33 : Database - model_viewer
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;



/*Table structure for table `design_views` */

DROP TABLE IF EXISTS `design_views`;

CREATE TABLE `design_views` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `the_models_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `design_views` */

insert  into `design_views`(`id`,`user_id`,`the_models_id`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,1,2,'2022-10-04 21:19:39',1,NULL,NULL),(2,1,1,'2022-10-04 21:19:57',1,NULL,NULL),(3,2,1,'2022-10-04 21:19:57',1,NULL,NULL),(4,3,1,'2022-10-04 21:19:57',1,NULL,NULL),(5,4,1,'2022-10-04 21:19:57',1,NULL,NULL),(6,4,1,'2022-09-28 21:19:57',1,NULL,NULL),(7,4,2,'2022-10-05 19:03:33',4,NULL,NULL),(8,4,3,'2022-10-05 19:21:28',4,NULL,NULL),(9,0,1,'2022-10-08 22:08:39',0,NULL,NULL);

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

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_10_03_082529_laratrust_setup_tables',2);

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

insert  into `permission_role`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(1,2),(2,2),(3,2),(4,2),(9,2),(10,2);

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

insert  into `permissions`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'users-create','Create Users','Create Users','2022-10-03 08:28:08','2022-10-03 08:28:08'),(2,'users-read','Read Users','Read Users','2022-10-03 08:28:08','2022-10-03 08:28:08'),(3,'users-update','Update Users','Update Users','2022-10-03 08:28:08','2022-10-03 08:28:08'),(4,'users-delete','Delete Users','Delete Users','2022-10-03 08:28:08','2022-10-03 08:28:08'),(5,'payments-create','Create Payments','Create Payments','2022-10-03 08:28:08','2022-10-03 08:28:08'),(6,'payments-read','Read Payments','Read Payments','2022-10-03 08:28:08','2022-10-03 08:28:08'),(7,'payments-update','Update Payments','Update Payments','2022-10-03 08:28:08','2022-10-03 08:28:08'),(8,'payments-delete','Delete Payments','Delete Payments','2022-10-03 08:28:08','2022-10-03 08:28:08'),(9,'profile-read','Read Profile','Read Profile','2022-10-03 08:28:08','2022-10-03 08:28:08'),(10,'profile-update','Update Profile','Update Profile','2022-10-03 08:28:08','2022-10-03 08:28:08');

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

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(1,4,'App\\Models\\User'),(1,13,'App\\Models\\User'),(1,14,'App\\Models\\User'),(2,11,'App\\Models\\User'),(2,12,'App\\Models\\User'),(2,15,'App\\Models\\User');

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

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'admin','Admin','Admin','2022-10-03 08:28:08','2022-10-03 08:28:08'),(2,'user','User','User','2022-10-03 08:28:08','2022-10-03 08:28:08');

/*Table structure for table `the_models` */

DROP TABLE IF EXISTS `the_models`;

CREATE TABLE `the_models` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `model_img` varchar(255) DEFAULT NULL,
  `model_3d_img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `the_models` */

insert  into `the_models`(`id`,`user_id`,`name`,`description`,`model_img`,`model_3d_img`,`created_at`,`created_by`,`updated_at`) values (1,1,'hourseda',NULL,'uploads/the_model/1/202210031224logo-dark.png','uploads/the_model/1/202210052258rug-barbaroi.glb','2022-10-03 11:38:55',1,'2022-10-08 22:18:24'),(2,2,'h','<p>asdasd asd asd aa</p>','uploads/the_model/1/202210042049CAPFhI.png','uploads/the_model/1/202210042049Ankit.glb','2022-10-04 08:49:15',1,'2022-10-05 20:54:50'),(4,1,'Wilma Fischer',NULL,'uploads/the_model/1/202210052302logo-dark (1).png','uploads/the_model/1/202210052302rug-amazigh.glb','2022-10-05 11:02:41',1,'2022-10-05 23:02:41'),(5,1,'Rosalyn Duncan',NULL,'uploads/the_model/1/202210052310logo-dark (1).png','uploads/the_model/1/202210052310rug-amazigh.glb','2022-10-05 11:10:18',1,'2022-10-05 23:10:18'),(6,1,'Clarke Everett',NULL,'uploads/the_model/1/202210052310logo-dark (1).png','uploads/the_model/1/202210052310202210031138Horse.glb','2022-10-05 11:10:38',1,'2022-10-05 23:10:38'),(7,9,'dawngill',NULL,'uploads/the_model/9/202210061210docker-container-status-tag-7.png','uploads/the_model/9/202210061210rug-barbaroi.glb','2022-10-06 12:10:17',9,'2022-10-06 12:10:17'),(8,11,'dawn',NULL,'uploads/the_model/11/202210081201docker-container-status-tag-7.png','uploads/the_model/11/202210081201Ankit.glb','2022-10-08 12:01:30',11,'2022-10-08 12:01:30'),(9,1,'Cherokee Conway',NULL,'uploads/the_model/1/202210082213logo-dark (1) - Copy.png','uploads/the_model/1/202210082213rug-amazigh.glb','2022-10-08 10:13:43',1,'2022-10-08 22:13:43'),(10,1,'Christine Knapp',NULL,'uploads/the_model/1/202210082217logo-dark.png','uploads/the_model/1/202210082217202210031138Horse.glb','2022-10-08 10:17:07',1,'2022-10-08 22:17:07');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` bigint(20) DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`contact_no`,`profile_picture`,`email`,`user_type`,`company_name`,`email_verified_at`,`password`,`password_show`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (1,'Dawn','Aa','0332','blank.png','dawngill08@gmail.com',1,'asd',NULL,'$2y$10$kyCo9t.rHh4e3ULfS0tYT.PbLUayloRar13W1SI.z1RhTAZ8DHuxm','aa',NULL,'2022-10-03 13:41:06','2022-10-03 10:13:48',NULL),(11,'Austin','Eaton','95','11/202210081202docker-container-status-tag-7.png','fizasaxy@mailinator.com',2,'Gibbs Donovan Inc',NULL,'$2y$10$U8QFvMGl09Lqq9PyLAXnoOxeAdwkncETsz3NLyvMEFhmt.P8WBcGi','aa',NULL,'2022-10-08 12:01:14','2022-10-08 12:02:47',NULL),(12,'Bertha','Case','98','blank.png','siwufij@mailinator.com',2,'Schmidt and Reese LLC',NULL,'$2y$10$fDQCJA43IiWjibPOaarYFOFfybbcxY6Zy/WwNcgxtyc9Ev7Ms0y1.','aa',NULL,'2022-10-08 12:02:59','2022-10-08 12:02:59',NULL),(13,'Troy','Crane',NULL,'blank.png','diwi@mailinator.com',1,'Paul Wilson Trading',NULL,'$2y$10$9WCIJWCerlVBPZXzZQ.6leXEgbQ0jdm0tpflYD089gyKiWaeOyx.u','aa',NULL,'2022-10-08 12:44:47','2022-10-08 12:44:47',NULL),(14,'Ulric','Rivas','5','14/202210081245docker-container-status-tag-7.png','kashir@gmail.com',1,'Mason Dawson Associates',NULL,'$2y$10$Z9MwtJei0iG6qHFiPpeP9edHM0aSE1mh5UYCkGzCKOrTvGSUp7eea','aa',NULL,'2022-10-08 12:45:20','2022-10-08 12:45:20',NULL),(15,'Ashton','Moss','43','15/202210081258logo-dark (1).png','leqam@mailinator.com',2,'Weaver Pearson Trading',NULL,'$2y$10$VXlmXMlnud3o4nzWK3kxyuViAV0zdUwAPGzzwAChcj2PQR.bwn.ne','aa',NULL,'2022-10-08 12:58:34','2022-10-08 12:58:45',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

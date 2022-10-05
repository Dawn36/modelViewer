

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `design_views` */

insert  into `design_views`(`id`,`user_id`,`the_models_id`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,1,2,'2022-10-04 21:19:39',1,NULL,NULL),(2,1,1,'2022-10-04 21:19:57',1,NULL,NULL),(3,2,1,'2022-10-04 21:19:57',1,NULL,NULL),(4,3,1,'2022-10-04 21:19:57',1,NULL,NULL),(5,4,1,'2022-10-04 21:19:57',1,NULL,NULL),(6,4,1,'2022-09-28 21:19:57',1,NULL,NULL),(7,4,2,'2022-10-05 19:03:33',4,NULL,NULL),(8,4,3,'2022-10-05 19:21:28',4,NULL,NULL);

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

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(2,4,'App\\Models\\User');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `the_models` */

insert  into `the_models`(`id`,`user_id`,`name`,`description`,`model_img`,`model_3d_img`,`created_at`,`created_by`,`updated_at`) values (1,1,'hoursed','<p>hi dajsdjas djaskjd askjd a</p>','uploads/the_model/1/202210031224logo-dark.png','uploads/the_model/1/202210031138Horse.glb','2022-10-03 11:38:55',1,'2022-10-03 12:37:20'),(2,2,'h','<p>asdasd asd asd a</p>','uploads/the_model/1/202210042049CAPFhI.png','uploads/the_model/1/202210042049Ankit.glb','2022-10-04 08:49:15',1,'2022-10-04 20:58:16');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`contact_no`,`profile_picture`,`email`,`company_name`,`email_verified_at`,`password`,`password_show`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (1,'Dawn','Aa','0332','blank.png','dawngill08@gmail.com','asd',NULL,'$2y$10$kyCo9t.rHh4e3ULfS0tYT.PbLUayloRar13W1SI.z1RhTAZ8DHuxm','aa',NULL,'2022-10-03 13:41:06','2022-10-03 10:13:48',NULL),(2,'Amber','Perkins','82','blank.png','tadid@mailinator.com',NULL,NULL,'$2y$10$l2PVr9HcXbsTuHVD2nAi9uBPYp2uOa1y8rnBQYcjjr.4ZoakYvdcu','aa',NULL,'2022-10-03 09:48:04','2022-10-03 09:48:04',NULL),(3,'Keith','Vargas','85','blank.png','hiwatede@mailinator.com',NULL,NULL,'$2y$10$fti8LDBZGo1A7d6oOXmBlOn4GnLIwdsuN8anhLFeh4p2kDCn0Memq','aa',NULL,'2022-10-03 09:49:31','2022-10-03 09:49:31',NULL),(4,'Zelda','Prince','02303','blank.png','gamyxemipa@mailinator.com','aa',NULL,'$2y$10$kyCo9t.rHh4e3ULfS0tYT.PbLUayloRar13W1SI.z1RhTAZ8DHuxm','aa',NULL,'2022-10-03 09:49:45','2022-10-03 10:54:10',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

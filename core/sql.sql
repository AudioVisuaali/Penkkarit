CREATE TABLE IF NOT EXISTS `users` (
          `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
          `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
          `firstname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
          `lastname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
          `pwd_salt` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
          `pwd_hash` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
          `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `verified` tinyint(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `type` tinyint(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `deleted` tinyint(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `first_contact` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
          `update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

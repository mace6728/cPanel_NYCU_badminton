-- Target schema for a fresh database. Existing databases: see database/migrations/.
-- Requires MySQL 5.7+ / MariaDB 10.2+.

CREATE TABLE `category` (
  `id`   TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NOT NULL,
  `slug` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_category_name` (`name`),
  UNIQUE KEY `uq_category_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- `slug` doubles as the CSS class suffix on the public pages (category_<slug>).
INSERT INTO `category` (`id`, `name`, `slug`) VALUES
  (1, '一般消息', 'newest'),
  (2, '比賽成果', 'gameResult'),
  (3, '競賽資訊', 'competition'),
  (4, '球隊活動', 'activity');

CREATE TABLE `article` (
  `id`          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` TINYINT UNSIGNED NOT NULL,
  `heading`     VARCHAR(255) NOT NULL,
  `content`     MEDIUMTEXT NOT NULL,
  `date`        DATE NOT NULL,
  `status`      ENUM('draft','published') NOT NULL DEFAULT 'published',
  `created_at`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_article_cat_date` (`category_id`, `date`),
  KEY `idx_article_date` (`date`),
  CONSTRAINT `fk_article_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

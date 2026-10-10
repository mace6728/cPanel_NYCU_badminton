-- Migrate the legacy `article` table (category CHAR(4), timer BIGINT, utf8) to
-- the schema in database/schema.sql. Existing article IDs are preserved:
-- `timer` is renamed to `id`, so every old value (e.g. 20260410203015) stays.
--
-- BEFORE RUNNING: export a full backup of the database in phpMyAdmin.
-- DEPLOY ORDER: run this, then deploy the new PHP code straight away. The old
-- code breaks as soon as step 3 runs and the new code breaks without it, so
-- expect the public news list to error for the minute in between.
--
-- Run each step in phpMyAdmin's SQL tab; the verification SELECTs must return
-- 0 rows / 0 before you continue past them. MySQL DDL isn't transactional,
-- so a failed step must be fixed and re-run by hand, not rolled back.

-- 1. utf8 (3-byte) -> utf8mb4, so emoji etc. can be stored.
ALTER TABLE `article` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- 2. Category lookup table.
CREATE TABLE `category` (
  `id`   TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NOT NULL,
  `slug` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_category_name` (`name`),
  UNIQUE KEY `uq_category_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
  (1, '一般消息', 'newest'),
  (2, '比賽成果', 'gameResult'),
  (3, '競賽資訊', 'competition'),
  (4, '球隊活動', 'activity');

-- 3. Link articles to categories.
ALTER TABLE `article` ADD COLUMN `category_id` TINYINT UNSIGNED NULL AFTER `category`;
UPDATE `article` a JOIN `category` c ON c.`name` = a.`category` SET a.`category_id` = c.`id`;

-- VERIFY: must return 0. Anything else is an article whose category name
-- matched none of the four above (typo, trailing space...). Fix those rows
-- (UPDATE article SET category = '一般消息' WHERE ...; then re-run the UPDATE above).
SELECT COUNT(*) AS unmatched FROM `article` WHERE `category_id` IS NULL;

-- 4. Tighten and rename columns.
UPDATE `article` SET `date` = CURDATE() WHERE `date` IS NULL;

ALTER TABLE `article`
  DROP COLUMN `category`,
  MODIFY `category_id` TINYINT UNSIGNED NOT NULL,
  CHANGE `timer` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  MODIFY `heading` VARCHAR(255) NOT NULL,
  MODIFY `content` MEDIUMTEXT NOT NULL,
  MODIFY `date` DATE NOT NULL,
  ADD COLUMN `status` ENUM('draft','published') NOT NULL DEFAULT 'published',
  ADD COLUMN `created_at` DATETIME NULL,
  ADD COLUMN `updated_at` DATETIME NULL;

-- Backfill timestamps from the article date, then give them their defaults.
UPDATE `article` SET `created_at` = `date`, `updated_at` = `date`;

ALTER TABLE `article`
  MODIFY `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  MODIFY `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  ADD KEY `idx_article_cat_date` (`category_id`, `date`),
  ADD KEY `idx_article_date` (`date`),
  ADD CONSTRAINT `fk_article_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

-- VERIFY: row count should equal what you had before, and no NULLs remain.
SELECT COUNT(*) AS total, SUM(`category_id` IS NULL) AS bad FROM `article`;

-- One-off: replace the legacy timestamp ids (e.g. 20260919120611, kept by the
-- schema migration) with small sequential ones, and make the next new
-- article get id 112.
--
-- Safe to renumber: nothing links to articles by id (the public pages render
-- inline, and api/event.php?id= is unused by the site).
-- BEFORE RUNNING: export a backup in phpMyAdmin. Run the steps in order.

-- 1. CHECK FIRST. `n` must be <= 111, otherwise 112 would collide with
--    existing rows; stop and pick a higher start instead.
SELECT COUNT(*) AS n, MIN(`id`) AS min_id, MAX(`id`) AS max_id FROM `article`;

-- 2. Renumber 1..N in the original creation order (old id = creation time).
--    The new values are far below every old one, so no key collisions occur.
SET @n := 0;
UPDATE `article` SET `id` = (@n := @n + 1) ORDER BY `id`;

-- 3. Next new article gets 112.
ALTER TABLE `article` AUTO_INCREMENT = 112;

-- 4. VERIFY: max_id should equal the n from step 1, and next_id should be 112.
SELECT COUNT(*) AS n, MAX(`id`) AS max_id FROM `article`;
SELECT AUTO_INCREMENT AS next_id FROM information_schema.TABLES
 WHERE TABLE_SCHEMA = 'badadmin_users' AND TABLE_NAME = 'article';

-- Note: MySQL 5.7 and older forget a raised AUTO_INCREMENT when the server
-- restarts (it falls back to MAX(id)+1). MySQL 8+ and MariaDB 10.2.4+ keep it.
-- If next_id later reverts, re-run step 3.

-- Remove the draft/published feature. Every article is shown on the public
-- pages, as it was before `status` was added. Back up first.
-- Deploy order: deploy the new code first (it no longer reads `status`), then
-- run this; the old code would break once the column is gone.

-- Optional check: any 'draft' rows would become public once the column is gone.
SELECT `id`, `heading` FROM `article` WHERE `status` = 'draft';

ALTER TABLE `article` DROP COLUMN `status`;

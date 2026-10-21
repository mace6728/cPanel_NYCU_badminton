-- Articles written before the move still link to the retired host
-- badminton.nctu.edu.tw, which no longer exists in DNS. The security scan flags
-- every such link as a high-severity "link to a nonexistent domain". One of them
-- also points at an old static page (…/2017HKcityu.html) that is now a .php page.
-- Back up the `article` table first. Safe to run more than once.
-- No code deploy is needed first; this only rewrites stored article HTML.

-- 1. Review what will change (run these alone first).
SELECT `id`, `heading` FROM `article` WHERE `content` LIKE '%nctu.edu.tw%';
-- Other links to old static pages. Not changed below; fix any that show up by
-- hand in the admin (or add another REPLACE like step 2).
SELECT `id`, `heading` FROM `article` WHERE `content` LIKE '%.html%';

-- 2. The known link: new host and the page's current .php name.
UPDATE `article`
SET `content` = REPLACE(`content`,
        'badminton.nctu.edu.tw/gallery/friendly/2017HKcityu.html',
        'badminton.club.nycu.edu.tw/gallery/friendly/2017HKcityu.php')
WHERE `content` LIKE '%badminton.nctu.edu.tw/gallery/friendly/2017HKcityu.html%';

-- 3. Any other link to the old host (www. variant first, then the bare host),
--    and make sure they use https.
UPDATE `article`
SET `content` = REPLACE(`content`, 'www.badminton.nctu.edu.tw', 'badminton.club.nycu.edu.tw')
WHERE `content` LIKE '%www.badminton.nctu.edu.tw%';

UPDATE `article`
SET `content` = REPLACE(`content`, 'badminton.nctu.edu.tw', 'badminton.club.nycu.edu.tw')
WHERE `content` LIKE '%badminton.nctu.edu.tw%';

UPDATE `article`
SET `content` = REPLACE(`content`, 'http://badminton.club.nycu.edu.tw', 'https://badminton.club.nycu.edu.tw')
WHERE `content` LIKE '%http://badminton.club.nycu.edu.tw%';

-- 4. Verify: both should return no rows.
SELECT `id`, `heading` FROM `article` WHERE `content` LIKE '%nctu.edu.tw%';
SELECT `id`, `heading` FROM `article` WHERE `content` LIKE '%2017HKcityu.html%';

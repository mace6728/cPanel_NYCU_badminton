<?php
/**
 * One collapsible news item. Set $row (an ArticleService row) before requiring.
 * `content` is trusted HTML written by the admin, so it is echoed as-is.
 */
?>
<div class="link">
    <div class="click">
        <div class="first"><span class="category_<?= htmlspecialchars($row['category_slug'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8') ?></span><span class="date"><?= htmlspecialchars(substr((string) $row['date'], 0, 10), ENT_QUOTES, 'UTF-8') ?></span></div><?= htmlspecialchars($row['heading'], ENT_QUOTES, 'UTF-8') ?><i class="fa fa-chevron-down"></i>
    </div>
    <div class="menu"><?= $row['content'] ?></div>
</div>

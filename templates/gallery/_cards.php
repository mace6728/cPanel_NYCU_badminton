<?php
/**
 * Grid of cover cards. Expects $cards: list of ['cover', 'title', 'href'] where
 * `cover` is relative to the web root and `href` is relative to the current page.
 */
?>
    <ul class="grid cs-style-3" oncontextmenu="return false;">
<?php foreach ($cards as $card): ?>
        <li>
          <figure>
            <img src="<?= $e($basePath . GalleryService::urlPath($card['cover'])) ?>" alt="<?= $e($card['title']) ?>">
            <figcaption>
              <h3><?= $e($card['title']) ?></h3>
              <a href="<?= $e($card['href']) ?>">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
<?php endforeach; ?>
    </ul>

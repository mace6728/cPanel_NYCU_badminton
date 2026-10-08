<?php
require_once __DIR__ . '/../../src/Helpers/sanitize.php';
require_once __DIR__ . '/../../src/Helpers/response.php';

send_html_header();
$select_op = post_nonempty_string('select_op');

if ($select_op !== null) {
    require_once __DIR__ . '/../../config/db.php';
    require_once __DIR__ . '/../../src/Services/ArticleService.php';
    $articleService = new ArticleService($db);

    $row_result = $articleService->getByTimer($select_op);

    echo $row_result ? $row_result['date'] : '';
}

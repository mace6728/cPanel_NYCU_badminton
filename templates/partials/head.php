<?php
/**
 * Shared <head> + <body> opener. Set these variables before requiring this file:
 *   $pageTitle       - <title> text (required)
 *   $pageDescription - meta description (required)
 *   $pageCss         - page-specific stylesheet filename under css/, e.g. 'index.min.css' (required)
 *   $pageKeywords    - meta keywords content; omit/null to skip the tag (optional, index.php only historically)
 *   $extraHead       - raw HTML to inject just before </head> for page-specific <style>/<script> (optional)
 *   $bootstrapCss    - bootstrap stylesheet filename under css/; defaults to 'bootstrap.min.css'
 *                      (intro_member.php historically uses 'bootstrap4.min.css')
 */
$pageKeywords = $pageKeywords ?? null;
$extraHead = $extraHead ?? '';
$bootstrapCss = $bootstrapCss ?? 'bootstrap.min.css';
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $pageDescription ?>">
<?php if ($pageKeywords !== null): ?>
    <meta name="keywords" content="<?= $pageKeywords ?>">
<?php endif; ?>
    <meta name="author" content="國立交通大學羽球隊 交大羽球隊 NCTU Badminton">

    <title><?= $pageTitle ?></title>

    <link rel="stylesheet" href="css/<?= $bootstrapCss ?>">
    <link rel="stylesheet" href="css/<?= $pageCss ?>">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<?= $extraHead ?>
</head>

<body>

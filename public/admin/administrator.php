<?php
/**
 * Admin console: article list + editor in one page.
 * Access is restricted by HTTP Basic Auth (see .htaccess in this directory).
 *
 *   administrator.php            list of articles
 *   administrator.php?new=1      editor, blank
 *   administrator.php?edit=ID    editor for an existing article
 *   POST action=save|delete      write handlers; redirect back with a flash message
 */
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../src/Services/ArticleService.php';
require_once __DIR__ . '/../../src/Helpers/admin.php';

ini_set('display_errors', '0');
header('Cache-Control: no-store');

$articles = new ArticleService($db);
$categories = array_column($articles->getCategories(), null, 'id'); // id => [id, name, slug]

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $back = 'administrator.php';

    try {
        if (!csrf_valid($_POST['csrf'] ?? null)) {
            throw new RuntimeException('頁面已過期，請重新整理後再試一次');
        }

        $action = $_POST['action'] ?? '';
        $id = (int) ($_POST['id'] ?? 0);

        if ($action === 'delete') {
            if ($id < 1 || $articles->getById($id) === null) {
                throw new RuntimeException('找不到要刪除的文章');
            }
            $articles->delete($id);
            flash_set('success', '文章已刪除');
        } elseif ($action === 'save') {
            $categoryId = (int) ($_POST['category_id'] ?? 0);
            $status = $_POST['status'] ?? '';
            $heading = trim($_POST['heading'] ?? '');
            $content = $_POST['content'] ?? '';
            $date = trim($_POST['date'] ?? '') ?: date('Y-m-d');
            $back = $id > 0 ? 'administrator.php?edit=' . $id : 'administrator.php?new=1';

            if (!isset($categories[$categoryId])) {
                throw new RuntimeException('請選擇有效的類別');
            }
            if (!in_array($status, ArticleService::STATUSES, true)) {
                throw new RuntimeException('請選擇有效的狀態');
            }
            if ($heading === '') {
                throw new RuntimeException('標題不能為空');
            }
            if (mb_strlen($heading) > 255) {
                throw new RuntimeException('標題不能超過 255 個字');
            }
            // Allow media-only posts, reject genuinely empty bodies.
            if (trim(strip_tags($content, '<img><iframe><video>')) === '') {
                throw new RuntimeException('內文不能為空');
            }
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date) || !checkdate((int) substr($date, 5, 2), (int) substr($date, 8, 2), (int) substr($date, 0, 4))) {
                throw new RuntimeException('日期格式需為 yyyy-mm-dd');
            }

            if ($id === 0) {
                $articles->create($categoryId, $heading, $content, $date, $status);
                flash_set('success', $status === 'draft' ? '草稿已儲存' : '文章已發表');
            } else {
                if ($articles->getById($id) === null) {
                    throw new RuntimeException('找不到要修改的文章');
                }
                $articles->update($id, $categoryId, $heading, $content, $date, $status);
                flash_set('success', '文章已更新');
            }
            $back = 'administrator.php';
        } else {
            throw new RuntimeException('未知的操作');
        }
    } catch (RuntimeException $e) {
        flash_set('error', $e->getMessage());
        if (($_POST['action'] ?? '') === 'save') {
            $_SESSION['draft'] = $_POST;
        }
    } catch (PDOException $e) {
        error_log('admin DB error: ' . $e->getMessage());
        flash_set('error', '資料庫錯誤，請稍後再試');
        if (($_POST['action'] ?? '') === 'save') {
            $_SESSION['draft'] = $_POST;
        }
    }

    header('Location: ' . $back, true, 303);
    exit;
}

$flash = flash_take();
$csrf = csrf_token();
$editing = isset($_GET['new']) || isset($_GET['edit']);
$article = ['id' => 0, 'category_id' => array_key_first($categories), 'heading' => '', 'content' => '', 'date' => date('Y-m-d'), 'status' => 'published'];

if ($editing) {
    if (isset($_GET['edit'])) {
        $found = $articles->getById((int) $_GET['edit']);
        if ($found === null) {
            flash_set('error', '找不到這篇文章');
            header('Location: administrator.php', true, 303);
            exit;
        }
        $article = array_merge($article, $found);
        $article['id'] = (int) $article['id'];
        $article['date'] = substr((string) $article['date'], 0, 10);
    }
    // After a failed save, restore what the user typed instead of losing it.
    if (!empty($_SESSION['draft'])) {
        $draft = $_SESSION['draft'];
        $article = array_merge($article, array_intersect_key($draft, $article));
        unset($_SESSION['draft']);
    }
} else {
    unset($_SESSION['draft']);
    $rows = $articles->getAll(false);
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>交大羽球隊後台管理</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<header class="topbar">
    <a class="brand" href="administrator.php">交大羽球隊 <span>後台管理</span></a>
    <a class="topbar-link" href="../index.php" target="_blank" rel="noopener">檢視網站 ↗</a>
</header>

<main class="wrap">
    <?php if ($flash): ?>
        <div class="flash flash-<?= h($flash['type']) ?>" role="status"><?= h($flash['message']) ?></div>
    <?php endif; ?>

    <?php if (!$editing): ?>
        <div class="page-head">
            <h1>文章管理 <small><?= count($rows) ?> 篇</small></h1>
            <a class="btn btn-primary" href="administrator.php?new=1">＋ 發表新文章</a>
        </div>

        <div class="toolbar">
            <input type="search" id="search" placeholder="搜尋標題…" aria-label="搜尋標題">
            <div class="chips" id="chips">
                <button type="button" class="chip is-active" data-cat="">全部</button>
                <?php foreach ($categories as $cat): ?>
                    <button type="button" class="chip" data-cat="<?= h($cat['name']) ?>"><?= h($cat['name']) ?></button>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if (!$rows): ?>
            <p class="empty">還沒有任何文章<a href="administrator.php?new=1">發表第一篇</a></p>
        <?php else: ?>
            <div class="table-wrap">
                <table class="list">
                    <thead><tr><th>日期</th><th>類別</th><th>標題</th><th class="col-actions">操作</th></tr></thead>
                    <tbody id="rows">
                    <?php foreach ($rows as $row): ?>
                        <tr data-cat="<?= h($row['category']) ?>" data-title="<?= h(mb_strtolower($row['heading'])) ?>">
                            <td class="nowrap"><?= h(substr((string) $row['date'], 0, 10)) ?></td>
                            <td><span class="badge badge-<?= h($row['category_slug']) ?>"><?= h($row['category']) ?></span></td>
                            <td><a href="administrator.php?edit=<?= (int) $row['id'] ?>"><?= h($row['heading']) ?></a><?= $row['status'] === 'draft' ? ' <span class="tag-draft">草稿</span>' : '' ?></td>
                            <td class="col-actions">
                                <a class="btn btn-small" href="administrator.php?edit=<?= (int) $row['id'] ?>">編輯</a>
                                <form method="post" class="inline" data-confirm="確定要刪除「<?= h($row['heading']) ?>」嗎？此操作無法復原">
                                    <input type="hidden" name="csrf" value="<?= h($csrf) ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                                    <button class="btn btn-small btn-danger">刪除</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p class="empty" id="no-match" hidden>沒有符合的文章</p>
        <?php endif; ?>

    <?php else: ?>
        <div class="page-head">
            <h1><?= $article['id'] === 0 ? '發表新文章' : '編輯文章' ?></h1>
            <a class="btn" href="administrator.php">← 返回列表</a>
        </div>

        <form method="post" class="card editor" id="editor-form">
            <input type="hidden" name="csrf" value="<?= h($csrf) ?>">
            <input type="hidden" name="action" value="save">
            <input type="hidden" name="id" value="<?= (int) $article['id'] ?>">

            <fieldset class="field">
                <legend>類別</legend>
                <div class="segmented">
                    <?php foreach ($categories as $cat): ?>
                        <label>
                            <input type="radio" name="category_id" value="<?= (int) $cat['id'] ?>" <?= (int) $article['category_id'] === (int) $cat['id'] ? 'checked' : '' ?>>
                            <span><?= h($cat['name']) ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </fieldset>

            <div class="row">
                <div class="field grow">
                    <label for="heading">標題</label>
                    <input type="text" id="heading" name="heading" value="<?= h($article['heading']) ?>" maxlength="255" required autofocus>
                </div>
                <div class="field">
                    <label for="date">日期</label>
                    <input type="date" id="date" name="date" value="<?= h($article['date']) ?>" required>
                </div>
                <div class="field">
                    <label for="status">狀態</label>
                    <select id="status" name="status">
                        <option value="published" <?= $article['status'] === 'published' ? 'selected' : '' ?>>公開</option>
                        <option value="draft" <?= $article['status'] === 'draft' ? 'selected' : '' ?>>草稿（不公開）</option>
                    </select>
                </div>
            </div>

            <div class="field">
                <label for="content">內文</label>
                <textarea id="content" name="content" rows="16"><?= h($article['content']) ?></textarea>
            </div>

            <div class="actions">
                <button class="btn btn-primary" type="submit">儲存</button>
                <a class="btn" href="administrator.php">取消</a>
            </div>
        </form>

        <?php if ($article['id'] !== 0): ?>
            <form method="post" class="danger-zone" data-confirm="確定要刪除這篇文章嗎？此操作無法復原">
                <input type="hidden" name="csrf" value="<?= h($csrf) ?>">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= (int) $article['id'] ?>">
                <span>刪除這篇文章</span>
                <button class="btn btn-danger">刪除</button>
            </form>
        <?php endif; ?>

        <script src="../tinymce/js/tinymce/tinymce.min.js"></script>
    <?php endif; ?>
</main>

<script src="admin.js"></script>
</body>
</html>

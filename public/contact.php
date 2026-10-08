<?php
$pageTitle = '聯絡資訊 | 國立陽明交通大學羽球隊 NYCU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 聯絡資訊';
$pageCss = 'reg.min.css';
require __DIR__ . '/../templates/partials/head.php';
$activePage = 'contact';
require __DIR__ . '/../templates/partials/navbar.php';
?>

    <header class="intro-header" style="background-image: url('img/index.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>聯絡我們</h1>
                        <hr class="small">
                        <span class="subheading">有問題想問嗎?</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>如有任何問題，歡迎直接聯繫我們：<a href="mailto:nctubadadm@gmail.com">nctubadadm@gmail.com</a></p>
            </div>
        </div>
    </div>
<?php require __DIR__ . '/../templates/partials/footer.php'; ?>

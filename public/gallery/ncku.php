<?php
$pageTitle = '成大公開賽照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 成大公開賽照片';
$pageCss = 'sortGallery.min.css';
$basePath = '../';
require __DIR__ . '/../../templates/partials/head.php';
$activePage = 'gallery';
require __DIR__ . '/../../templates/partials/navbar.php';
?>

<header class="intro-header" style="background-image: url('../img/competiotion_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>成大公開賽照片</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <ul class="grid cs-style-3" oncontextmenu="return false;">
        <li>
          <figure>
            <img src="../img/ncku/2013/20130712_0001-min.jpg" alt="2013成大公開賽">
            <figcaption>
              <h3>2013成大公開賽</h3>
              <a href="ncku/2013ncku.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
    </ul>

<?php
$extraScripts = '    <script src="../js/blog.js"></script>
';
require __DIR__ . '/../../templates/partials/footer.php';
?>

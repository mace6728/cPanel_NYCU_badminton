<?php
$pageTitle = '特殊活動照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 特殊活動照片';
$pageCss = 'friendly.min.css';
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
                        <h1>特殊活動照片</h1>
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
            <img src="../img/special/107_goodbye/107_goodbye (1).jpg" alt="2018送舊">
            <figcaption>
              <h3>2018送舊</h3>
              <a href="special/107_goodbye.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/special/107_summer/big/107_summer (3).jpg" alt="2018移地訓練">
            <figcaption>
              <h3>2018移地訓練</h3>
              <a href="special/107_summer.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
    </ul>

<?php
$extraScripts = '    <script src="../js/blog.js"></script>
';
require __DIR__ . '/../../templates/partials/footer.php';
?>

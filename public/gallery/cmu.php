<?php
$pageTitle = '中國醫大盃照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 中國醫大盃照片';
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
                        <h1>中國醫大盃照片</h1>
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
            <img src="../img/cmu/2014/20141220_0006-min.jpg" alt="2014中國醫大盃">
            <figcaption>
              <h3>2014中國醫大盃</h3>
              <a href="cmu/2014cmu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/cmu/2013/20131214_0036-min.jpg" alt="2014中國醫大盃">
            <figcaption>
              <h3>2013中國醫大盃</h3>
              <a href="cmu/2013cmu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
    </ul>

<?php
$extraScripts = '    <script src="../js/blog.js"></script>
';
require __DIR__ . '/../../templates/partials/footer.php';
?>

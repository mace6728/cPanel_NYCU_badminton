<?php
$pageTitle = '風城盃照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 風城盃照片';
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
                        <h1>風城盃照片</h1>
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
            <img src="../img/wind/2018/2018w1.jpg" alt="2018風城盃">
            <figcaption>
              <h3>2018風城盃</h3>
              <a href="wind/2018wind.php">點擊看更多</a>
            </figcaption>
          </figure>
          </li>
          <li>
          <figure>
            <img src="../img/wind/2016/2016w1.jpg" alt="2016風城盃">
            <figcaption>
              <h3>2016風城盃</h3>
              <a href="wind/2016wind.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/wind/2015/20150913_0042-min.jpg" alt="2015風城盃">
            <figcaption>
              <h3>2015風城盃</h3>
              <a href="wind/2015wind.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/wind/2014/20140531_0001-min.jpg" alt="2014風城盃">
            <figcaption>
              <h3>2014風城盃</h3>
              <a href="wind/2014wind.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/wind/2013/20130609_0007-min.jpg" alt="2013風城盃">
            <figcaption>
              <h3>2013風城盃</h3>
              <a href="wind/2013wind.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
    </ul>

<?php
$extraScripts = '    <script src="../js/blog.js"></script>
';
require __DIR__ . '/../../templates/partials/footer.php';
?>

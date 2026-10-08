<?php
$pageTitle = '友誼賽照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 友誼賽照片';
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
                        <h1>友誼賽照片</h1>
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
            <img src="../img/friendship/2023DaTong/IMG_3041.jpg" alt="2023大同高中友誼賽">
            <figcaption>
              <h3>2023大同高中友誼賽</h3>
              <a href="friendly/2023DaTong.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        
        <li>
          <figure>
            <img src="../img/friendship/2017HKcityu/42.jpg" alt="2017香港城市大學友誼賽">
            <figcaption>
              <h3>2017香港城市大學友誼賽</h3>
              <a href="friendly/2017HKcityu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/friendship/2016CTUs/2016CTUs28.jpg" alt="2016兩岸五校交大交流賽">
            <figcaption>
              <h3>2016兩岸五校交大交流賽</h3>
              <a href="friendly/2016CTUs.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/friendship/2016JapanShio/shi4.jpg" alt="2016日本尚志高校友誼賽">
            <figcaption>
              <h3>2016日本尚志高校友誼賽</h3>
              <a href="friendly/2016JapanShio.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/friendship/2015JapanSeniorGirls/20150731_0003-min.jpg" alt="2015日本高中女生友誼賽">
            <figcaption>
              <h3>2015日本高中女生友誼賽</h3>
              <a href="friendly/2015JapanSeniorGirls.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/friendship/2015HKpolyu/20150107_0004-min.jpg" alt="2015香港理工大學友誼賽">
            <figcaption>
              <h3>2015香港理工大學友誼賽</h3>
              <a href="friendly/2015HKpolyu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/friendship/2015NCTUalumni/20150104_0006-min.jpg" alt="2015交大校友友誼賽">
            <figcaption>
              <h3>2015交大校友友誼賽</h3>
              <a href="friendly/2015NCTUalumni.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/friendship/2014HKcityu/20140108_0002-min.jpg" alt="2014香港城市大學友誼賽">
            <figcaption>
              <h3>2014香港城市大學友誼賽</h3>
              <a href="friendly/2014HKcityu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
    </ul>

<?php
$extraScripts = '    <script src="../js/blog.js"></script>
';
require __DIR__ . '/../../templates/partials/footer.php';
?>

<?php
$pageTitle = '勁竹盃照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 勁竹盃照片';
$pageCss = 'sortGallery.min.css';
$basePath = '../';
require __DIR__ . '/../templates/partials/head.php';
$activePage = 'gallery';
require __DIR__ . '/../templates/partials/navbar.php';
?>

<header class="intro-header" style="background-image: url('../img/competiotion_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>勁竹盃照片</h1>
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
            <img src="../img/jinzhu/2018/2018-13.jpg" alt="2018勁竹盃">
            <figcaption>
              <h3>2023勁竹盃</h3>
              <a href="jinzhu/2023jinzhu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/jinzhu/2018/2018-13.jpg" alt="2018勁竹盃">
            <figcaption>
              <h3>2018勁竹盃</h3>
              <a href="jinzhu/2018jinzhu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/jinzhu/2017/2017 (69).JPG" alt="2017勁竹盃">
            <figcaption>
              <h3>2017勁竹盃</h3>
              <a href="jinzhu/2017jinzhu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/jinzhu/2016/2016 (74).JPG" alt="2016勁竹盃">
            <figcaption>
              <h3>2016勁竹盃</h3>
              <a href="jinzhu/2016jinzhu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/jinzhu/2015/2015 (152).jpg" alt="2015勁竹盃">
            <figcaption>
              <h3>2015勁竹盃</h3>
              <a href="jinzhu/2015jinzhu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/jinzhu/2014/20141018_0006-min.jpg" alt="2014勁竹盃">
            <figcaption>
              <h3>2014勁竹盃</h3>
              <a href="jinzhu/2014jinzhu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/jinzhu/2012/20121124_0010-min.jpg" alt="2012勁竹盃">
            <figcaption>
              <h3>2012勁竹盃</h3>
              <a href="jinzhu/2012jinzhu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
    </ul>

<?php
$extraScripts = '    <script src="../js/blog.js"></script>
';
require __DIR__ . '/../templates/partials/footer.php';
?>

<?php
$pageTitle = '大運會照片 | 國立交通大學羽球隊 NYCU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 大運會圖片';
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
                        <h1>大運會照片</h1>
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
            <img src="../img/university_cup/2018/2.jpg" alt="2018大運會">
            <figcaption>
              <h3>2018大運會</h3>
              <a href="university/2018.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/university_cup/2017/2017_university (156).jpg" alt="2017大運會">
            <figcaption>
              <h3>2017大運會</h3>
              <a href="university/2017.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/university_cup/2016final/105all.jpg" alt="2016大運會決賽">
            <figcaption>
              <h3>2016 決賽</h3>
              <a href="university/2016final.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/university_cup/2016preliminary/mid4.jpg" alt="2016大運會預賽">
            <figcaption>
              <h3>2016 中區預賽</h3>
              <a href="university/2016preliminary.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/university_cup/2015final/20150506_0284-min.jpg" alt="2015大運會決賽">
            <figcaption>
              <h3>2015 決賽</h3>
              <a href="university/2015final.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/university_cup/2015preliminary1/20150317_0001-min.jpg" alt="2015 中區預賽 第一天">
            <figcaption>
              <h3>2015 中區預賽1</h3>
              <a href="university/2015preliminary1.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/university_cup/2015preliminary2/20150318_0001-min.jpg" alt="2015 中區預賽 第一天">
            <figcaption>
              <h3>2015 中區預賽2</h3>
              <a href="university/2015preliminary2.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/university_cup/2015preliminary3/20150319_0001-min.jpg" alt="2015 中區預賽 第一天">
            <figcaption>
              <h3>2015 中區預賽3</h3>
              <a href="university/2015preliminary3.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/university_cup/2014preliminary/20140319_0001-min.jpg" alt="2015 中區預賽 第一天">
            <figcaption>
              <h3>2014 中區預賽</h3>
              <a href="university/2014preliminary.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
    </ul>

<?php
$extraScripts = '    <script src="../js/blog.js"></script>
';
require __DIR__ . '/../../templates/partials/footer.php';
?>

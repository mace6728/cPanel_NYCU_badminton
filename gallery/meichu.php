<?php
$pageTitle = '梅竹賽照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 梅竹賽照片';
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
                        <h1>梅竹賽照片</h1>
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
            <img src="../img/meichu/2018/2018 (3).jpg" alt="2018梅竹">
            <figcaption>
              <h3>2018梅竹</h3>
              <a href="meichu/2018.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/meichu/2017boy/2017_meichu_boy (10).jpg" alt="2017梅竹男羽">
            <figcaption>
              <h3>2017梅竹男羽</h3>
              <a href="meichu/2017boy.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/meichu/2017girl/2017_meichu_girl (10).JPG" alt="2017梅竹女羽">
            <figcaption>
              <h3>2017梅竹女羽</h3>
              <a href="meichu/2017girl.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="../img/meichu/105_6.jpg" alt="2016丙申梅竹">
            <figcaption>
              <h3>2016丙申梅竹</h3>
              <a href="2016meichu.php">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
    </ul>

<?php
$extraScripts = '    <script src="../js/blog.js"></script>
';
require __DIR__ . '/../templates/partials/footer.php';
?>

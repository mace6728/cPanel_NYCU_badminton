<?php
$pageTitle = '活動照片 | 國立陽明交通大學羽球隊 NYCU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 活動照片/活動集錦';
$pageCss = 'sortGallery.min.css';
require __DIR__ . '/templates/partials/head.php';
$activePage = 'gallery';
require __DIR__ . '/templates/partials/navbar.php';
?>
    <header class="intro-header" style="background-image: url('img/competiotion_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>活動照片</h1>
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
            <img src="img/team.jpg" alt="大運會">
            <figcaption>
              <h3>大運會</h3>
              <a href="gallery/university_cup.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/jinzhu/2014/20141018_0006-min.jpg" alt="jinzhu">
            <figcaption>
              <h3>勁竹盃</h3>
              <a href="gallery/jinzhu.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/wind/2015/20150913_0042-min.jpg" alt="wind">
            <figcaption>
              <h3>風城盃</h3>
              <a href="gallery/wind.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/chintsao/2014/20140827_0001-min.jpg" alt="chintsao">
            <figcaption>
              <h3>勁草盃</h3>
              <a href="gallery/chintsao.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/meichu/105_6.jpg" alt="meichu">
            <figcaption>
              <h3>梅竹賽</h3>
              <a href="gallery/meichu.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/cmu/2014/20141220_0022-min.jpg" alt="cmu">
            <figcaption>
              <h3>中國醫大盃</h3>
              <a href="gallery/cmu.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/DrPro/20140216_0055-min.jpg" alt="DrPro">
            <figcaption>
              <h3>風崗盃</h3>
              <a href="gallery/DrPro.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/fengyuan/2013/20131208_0005-min.jpg" alt="fengyuan">
            <figcaption>
              <h3>豐原主委盃</h3>
              <a href="gallery/fengyuan.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/ncku/2013/20130712_0001-min.jpg" alt="ncku">
            <figcaption>
              <h3>成大公開賽</h3>
              <a href="gallery/ncku.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/ncue/2014/20140222_0001-min.jpg" alt="ncue">
            <figcaption>
              <h3>彰師大盃</h3>
              <a href="gallery/ncue.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/friendship/2014HKcityu/20140108_0002-min.jpg" alt="friendly">
            <figcaption>
              <h3>友誼賽</h3>
              <a href="gallery/friendly.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/special/107_goodbye/107_goodbye (1).jpg" alt="special">
            <figcaption>
              <h3>特殊活動</h3>
              <a href="gallery/special.html">點擊看更多</a>
            </figcaption>
          </figure>
        </li>
    </ul>
<?php
$extraScripts = '    <script src="js/blog.min.js"></script>' . "\n";
require __DIR__ . '/templates/partials/footer.php';
?>

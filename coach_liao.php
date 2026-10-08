<?php
$pageTitle = '廖威彰教練 | 國立陽明交通大學羽球隊 NYCU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 廖威彰教練';
$pageCss = 'coach.min.css';
require __DIR__ . '/templates/partials/head.php';
$activePage = 'coach_liao';
require __DIR__ . '/templates/partials/navbar.php';
?>

    <header class="intro-header" style="background-image: url('img/team.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>教練介紹</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1 class="heading">廖威彰教練</h1>
                <div id="coach">
                    <img src="img/liao2.jpg" alt="廖威彰教練"/>
                </div>
                <div id="intro">
                    <ul style="list-style-type:none;padding: 10px;">
                      <li>運動成績表現建置中</li>
                    </ul>
                </div>
                <div id="content">
                  <h2>教練的話</h2>
                  <p id="slogen">座右銘建置中</p>
                  <p class="detail">教練的話建置中</p>
                </div>
            </div>
        </div>
    </div>
<?php
$extraScripts = '    <script src="js/blog.js"></script>' . "\n";
require __DIR__ . '/templates/partials/footer.php';
?>

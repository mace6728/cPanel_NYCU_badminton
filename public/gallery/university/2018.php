<?php
$pageTitle = '2018大運會照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 2018大運會照片';
$pageCss = 'galDetail.min.css';
$basePath = '../../';
$extraHead = '    <link rel="stylesheet" href="../../css/baguetteBox.min.css">
';
require __DIR__ . '/../../../templates/partials/head.php';
$activePage = 'gallery';
require __DIR__ . '/../../../templates/partials/navbar.php';
?>

<header class="intro-header" style="background-image: url('../../img/competiotion_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>2018大專盃</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content" oncontextmenu="return false;">
        <div class="baguetteBoxOne gallery">
            <a href="../../img/university_cup/2018/1.jpg"><img src="../../img/university_cup/2018/thumbnails/1.jpg"></a>
            <a href="../../img/university_cup/2018/2.jpg"><img src="../../img/university_cup/2018/thumbnails/2.jpg"></a>

        </div>
    </div>

<?php
$extraScripts = '    <script src="../../js/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run(\'.gallery\');
    </script>
';
require __DIR__ . '/../../../templates/partials/footer.php';
?>

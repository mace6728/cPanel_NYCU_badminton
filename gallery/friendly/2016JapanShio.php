<?php
$pageTitle = '2016日本尚志高校友誼賽 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 2016日本尚志高校友誼賽照片';
$pageCss = 'galDetail.min.css';
$basePath = '../../';
$extraHead = '    <link rel="stylesheet" href="../../css/baguetteBox.min.css">
';
require __DIR__ . '/../../templates/partials/head.php';
$activePage = 'gallery';
require __DIR__ . '/../../templates/partials/navbar.php';
?>

<header class="intro-header" style="background-image: url('../../img/competiotion_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>2016日本尚志高校友誼賽</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content" oncontextmenu="return false;">
        <div class="baguetteBoxOne gallery">
            <a href="../../img/friendship/2016JapanShio/shi1.jpg"><img src="../../img/friendship/2016JapanShio/thumbnails/tn_shi1.jpg"></a>
            <a href="../../img/friendship/2016JapanShio/shi2.jpg"><img src="../../img/friendship/2016JapanShio/thumbnails/tn_shi2.jpg"></a>
            <a href="../../img/friendship/2016JapanShio/shi3.jpg"><img src="../../img/friendship/2016JapanShio/thumbnails/tn_shi3.jpg"></a>
            <a href="../../img/friendship/2016JapanShio/shi4.jpg"><img src="../../img/friendship/2016JapanShio/thumbnails/tn_shi4.jpg"></a>
            <a href="../../img/friendship/2016JapanShio/shi5.jpg"><img src="../../img/friendship/2016JapanShio/thumbnails/tn_shi5.jpg"></a>
        </div>
    </div>

<?php
$extraScripts = '    <script src="../../js/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run(\'.gallery\');
    </script>
';
require __DIR__ . '/../../templates/partials/footer.php';
?>

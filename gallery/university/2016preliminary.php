<?php
$pageTitle = '2016大運會預賽照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 2016大運會照片';
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
                        <h1>2016大專盃預賽</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content" oncontextmenu="return false;">
        <div class="baguetteBoxOne gallery">
            <a href="../../img/university_cup/2016preliminary/mid2.jpg"><img src="../../img/university_cup/2016preliminary/thumbnails/tn_mid2.jpg"></a>
            <a href="../../img/university_cup/2016preliminary/mid3.jpg"><img src="../../img/university_cup/2016preliminary/thumbnails/tn_mid3.jpg"></a>
            <a href="../../img/university_cup/2016preliminary/mid4.jpg"><img src="../../img/university_cup/2016preliminary/thumbnails/tn_mid4.jpg"></a>
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

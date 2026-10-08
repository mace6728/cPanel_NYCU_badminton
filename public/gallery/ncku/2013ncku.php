<?php
$pageTitle = '2013成大公開賽照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 2013成大公開賽盃照片';
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
                        <h1>2013成大公開賽</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content" oncontextmenu="return false;">
        <div class="baguetteBoxOne gallery">
            <a href="../../img/ncku/2013/20130712_0001-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0001-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0002-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0002-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0003-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0003-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0004-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0004-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0005-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0005-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0006-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0006-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0007-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0007-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0008-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0008-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0009-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0009-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0010-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0010-min.jpg"></a>
            <a href="../../img/ncku/2013/20130712_0011-min.jpg"><img src="../../img/ncku/2013/thumbnails/tn_20130712_0011-min.jpg"></a>
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

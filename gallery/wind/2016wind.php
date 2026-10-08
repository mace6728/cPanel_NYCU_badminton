<?php
$pageTitle = '2016風城盃照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 2016風城盃照片';
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
                        <h1>2016風城盃</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content" oncontextmenu="return false;">
        <div class="baguetteBoxOne gallery">
            <a href="../../img/wind/2016/2016w1.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w1.jpg"></a>
            <a href="../../img/wind/2016/2016w2.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w2.jpg"></a>
            <a href="../../img/wind/2016/2016w3.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w3.jpg"></a>
            <a href="../../img/wind/2016/2016w4.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w4.jpg"></a>
            <a href="../../img/wind/2016/2016w5.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w5.jpg"></a>
            <a href="../../img/wind/2016/2016w6.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w6.jpg"></a>
            <a href="../../img/wind/2016/2016w7.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w7.jpg"></a>
            <a href="../../img/wind/2016/2016w8.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w8.jpg"></a>
            <a href="../../img/wind/2016/2016w9.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w9.jpg"></a>
            <a href="../../img/wind/2016/2016w10.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w10.jpg"></a>
            <a href="../../img/wind/2016/2016w11.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w11.jpg"></a>
            <a href="../../img/wind/2016/2016w12.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w12.jpg"></a>
            <a href="../../img/wind/2016/2016w13.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w13.jpg"></a>
            <a href="../../img/wind/2016/2016w14.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w14.jpg"></a>
            <a href="../../img/wind/2016/2016w15.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w15.jpg"></a>
            <a href="../../img/wind/2016/2016w16.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w16.jpg"></a>
            <a href="../../img/wind/2016/2016w17.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w17.jpg"></a>
            <a href="../../img/wind/2016/2016w18.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w18.jpg"></a>
            <a href="../../img/wind/2016/2016w19.jpg"><img src="../../img/wind/2016/thumbnails/tn_2016w19.jpg"></a>
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

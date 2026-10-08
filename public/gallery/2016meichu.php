<?php
$pageTitle = '2016丙申梅竹照片 | 國立交通大學羽球隊 NCTU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 2016丙申梅竹照片';
$pageCss = 'galDetail.min.css';
$basePath = '../';
$extraHead = '    <link rel="stylesheet" href="../css/baguetteBox.min.css">
';
require __DIR__ . '/../../templates/partials/head.php';
$activePage = 'gallery';
require __DIR__ . '/../../templates/partials/navbar.php';
?>

<header class="intro-header" style="background-image: url('../img/competiotion_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>丙申梅竹</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content" oncontextmenu="return false;">
        <div class="baguetteBoxOne gallery">
            <a href="../img/meichu/105_1.jpg"><img src="../img/meichu/thumbnails/tn_105_1.jpg"></a>
            <a href="../img/meichu/105_2.jpg"><img src="../img/meichu/thumbnails/tn_105_2.jpg"></a>
            <a href="../img/meichu/105_3.jpg"><img src="../img/meichu/thumbnails/tn_105_3.jpg"></a>
            <a href="../img/meichu/105_4.jpg"><img src="../img/meichu/thumbnails/tn_105_4.jpg"></a>
            <a href="../img/meichu/105_5.jpg"><img src="../img/meichu/thumbnails/tn_105_5.jpg"></a>
            <a href="../img/meichu/105_6.jpg"><img src="../img/meichu/thumbnails/tn_105_6.jpg"></a>
            <a href="../img/meichu/105_7.jpg"><img src="../img/meichu/thumbnails/tn_105_7.jpg"></a>
        </div>
    </div>

<?php
$extraScripts = '    <script src="../js/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run(\'.gallery\');
    </script>
';
require __DIR__ . '/../../templates/partials/footer.php';
?>

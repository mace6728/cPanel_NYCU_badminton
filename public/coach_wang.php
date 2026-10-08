<?php
$pageTitle = '王志全教練 | 國立陽明交通大學羽球隊 NYCU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 王志全教練';
$pageCss = 'coach.min.css';
require __DIR__ . '/../templates/partials/head.php';
$activePage = 'coach_wang';
require __DIR__ . '/../templates/partials/navbar.php';
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
                <h1 class="heading">王志全教練</h1>
                <div id="coach">
                    <img src="img/cc.jpg" alt="王志全教練"/>
                </div>
                <div id="intro">
                    <ul style="list-style-type:none;padding: 10px;">
                      <li>運動成績表現：</li>
                      <li>2000年亞洲青少年羽球錦標賽男子團體第五名</li>
                      <li>2000年世界青少年羽球錦標賽男子團體第四名</li>
                      <li>2001年亞洲青少年羽球錦標賽男子團體第二名</li>
                      <li>2002年全國中等學校運動會男子單打第一名</li>
                      <li>2003年全國運動會男子羽球單打第三名</li>
                      <li>2003年男子單打年終總排名第七名</li>
                      <li>2004年全國羽球團體錦標賽男子團體第一名</li>
                      <li>2005年全國第二次羽球排名賽甲組混合雙打第二名</li>
                      <li>2002-2005年國家羽球代表隊選手</li>
                    </ul>
                </div>
                <div id="content">
                  <h2>教練的話</h2>
                  <p id="slogen">成功要努力，也要有智慧</p>
                  <p class="detail">許多成功企業家及投資學家曾說，世界上最好的投資就是投資自己，而風險最大的投資就是選擇當職業運動選手，沒錯，以帳面價值來看的確如此，投資自己是別人偷不走，更可鞏固自身之實力，創造出自身價值，但投入運動卻不一定能成為世界第一，選手除要面對世界上最慘酷的運動競賽勝負之局面外，有時為了一個簡單動作，甚至為了追求0.01秒的進步，卻得花了好幾年時間與心力練習，而到最後還不一定能如願成功。但從另一面向來看，參與運動組訓也是一種自我投資，其藉由運動組訓學習團體生活、自我要求、服從、克服壓力、面對挫折逆境等，以及更重要的是自我認識與改變自己，所學獲得的是人格品德的養成與心靈層次的提升，更棒的是這樣的陶冶，伴隨影響接下來的生命歷程，影響深邃。</p>
                  <p class="detail">交大羽球隊成立至今是靠許多人的付出、犧牲與貢獻而促成，而交大羽球隊這招牌歷經十多年的努力以及無數人的奉獻下，已在全國打響名號，創出口碑；於期共勉在學及未來交羽之學子，凡事盡心盡力，投入並享受所堅持之事務，秉持努力於當下、堅持於目標、追求最高榮譽及抱持感恩之心，虛心學習而成就自己，並期望畢業校友，持續將交大羽球隊之努力、堅持、榮譽及感恩四大精神，持續發揚，讓交羽精神自強不息。</p>
                </div>
            </div>
        </div>
    </div>

<?php
$extraScripts = '    <script src="js/blog.js"></script>' . "\n";
require __DIR__ . '/../templates/partials/footer.php';
?>

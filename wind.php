<?php
$pageTitle = '風城盃簡介 | 國立陽明交通大學羽球隊 NYCU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 風城盃羽球賽';
$pageCss = 'wind.min.css';
require __DIR__ . '/templates/partials/head.php';
$activePage = 'wind';
require __DIR__ . '/templates/partials/navbar.php';
?>

    <header class="intro-header" style="background-image: url('img/index.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>風城盃</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2 class="section-heading">簡介</h2>
                    <p>為增進交大教職員生身心健康、推廣羽球運動、提升羽球技術水準並與校友、球友進行交流聯絡。另外更邀請全國菁英一同競技，特舉辦此比賽。</p>
                    <h1>參賽資格與分組</h1>
                    <h3>(一) 競技組</h3>
                    <ul>
                      <li class="item">凡交通大學在校教職員生、校友及受邀之外校學生，均可報名此組。</li>
                      <li class="item">本校球隊二年級(含)以上之一般生限報此組。</li>
                      <li class="item">體資生僅能報名雙打，且需搭配未登錄大專盃團體賽名單之一般生或畢業滿五年之一般生校友。</li>
                      <li class="item">對外受邀之優秀選手(不在學仍可報名)。</li>
                    </ul>
                    <h3>(二) 進階組</h3>
                    <ul>
                      <li class="item">凡交通大學在校學生、教職員及其眷屬，均可報名此組。</li>
                      <li class="item">修過羽球課程排名賽前 8 名及歷屆風城盃初學組前 3 名者限報此組。</li>
                      <li class="item">加入校隊未滿一年且未登錄大專盃團體賽名單者可報名此組。</li>
                    </ul>
                    <h3>(三) 初學組</h3>
                    <ul>
                      <li class="item">交通大學在學學生皆可報名參加 (上述競技組和進階組之學生請勿報名此組)。</li>
                    </ul>
                    <blockquote>每人最多報名兩個項目，可越級挑戰。<br>必要情況下，如非初學組報名初學組，主辦單位有權調整報名組別。</blockquote>
                    <h1>賽制</h1>
                    <ul>
                        <li class="item">視參賽人數採循環制或淘汰賽制，皆採用羽球新制一局 31 分(16分換邊，30分平不加分)。</li>
                        <li class="item">循環賽計分方式:
                            <ul>
                                <li class="item">先比積分(勝者得 2 分、敗者得 1 分、棄權者得 0 分)</li>
                                <li class="item">積分相等時，以該兩組比賽之勝方獲勝。<br>兩組以上積分相同時，以相關比賽結果總得分和總失分之商數判定。如再相同，則由大會抽籤決定。</li>
                            </ul>
                        </li>  
                    </ul>
                    <h1>選手須知</h1>
                    <ul>
                      <li class="item">學生參賽者須攜帶有當期註冊章之學生證，已畢業之學長姐須攜帶身分證明，以便查驗。</li>
                      <li class="item">除所報兩組賽程時間衝突外，以大會時間為準，未能於唱名時間5分鐘內出賽者，視同棄權。</li>
                      <li class="item">中途無故棄權者，即取消該球員比賽資格，已賽部份均屬無效，亦不列入名次。</li>
                      <li class="item">比賽場次經大會排定後不得要求變更。<br>如有特殊情形或未盡事宜，大會有權修正、公佈實施，全部賽程將公佈於活動官網及臉書，選手不得異議。</li>
                      <li class="item">賽程公佈後不可換人、頂替或更改場次時間。</li>
                      <li class="item">報名截止後會公佈成功報名名單，如有誤請於賽程公布前聯絡大會，賽程抽籤後恕無法增加或更改組別。</li>
                    </ul>
                </div>
            </div>
        </div>
    </article>

<?php
$extraScripts = '    <script src="js/blog.js"></script>' . "\n";
require __DIR__ . '/templates/partials/footer.php';
?>

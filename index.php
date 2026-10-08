<?php
$pageTitle = '國立陽明交通大學羽球隊官方網站';
$pageDescription = '國立交通大學羽球隊官方網站 · 交大羽球隊 · NCTU Badminton · 最新消息';
$pageKeywords = '國立陽明交通大學羽球隊 NYCU';
$pageCss = 'index.min.css';
require __DIR__ . '/templates/partials/head.php';
$activePage = 'index';
require __DIR__ . '/templates/partials/navbar.php';
?>

    <header class="intro-header" style="background-image: url('img/index.jpg');margin-bottom: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>陽明交通大學羽球隊</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-offset-1 col-xs-10">
                <h3><i class="fa fa-bell fa-1x"></i>  徵求校友會會員消息</h3>
                <h3 id="goRegister"><a href="al_announcement.php" style="color:#FBC02D">點選瀏覽細節</a></h3>
                <div class="links">
                    <?php
                        require_once __DIR__ . '/config/db.php';
                        require_once __DIR__ . '/src/Services/ArticleService.php';
                        $articleService = new ArticleService($db);
                        foreach ($articleService->getLatest(5) as $row) {
                            if ($row['category']=="一般消息"){
                                echo '<div class="link">
                                        <div class="click">
                                            <div class="first"><span class="category_newest">'.$row['category'].'</span><span class="date">'.$row['date'].'</span></div>'.$row['heading'].'<i class="fa fa-chevron-down"></i>
                                        </div>
                                        <div class="menu">'.$row['content'].'</div>
                                      </div>';
                            }else if($row['category']=="比賽成果"){
                                echo '<div class="link">
                                        <div class="click">
                                            <div class="first"><span class="category_gameResult">'.$row['category'].'</span><span class="date">'.$row['date'].'</span></div>'.$row['heading'].'<i class="fa fa-chevron-down"></i>
                                        </div>
                                        <div class="menu">'.$row['content'].'</div>
                                      </div>';
                            }else if($row['category']=="競賽資訊"){
                                echo '<div class="link">
                                        <div class="click">
                                            <div class="first"><span class="category_competition">'.$row['category'].'</span><span class="date">'.$row['date'].'</span></div>'.$row['heading'].'<i class="fa fa-chevron-down"></i>
                                        </div>
                                        <div class="menu">'.$row['content'].'</div>
                                      </div>';
                            }else{//team activity
                                echo '<div class="link">
                                        <div class="click">
                                            <div class="first"><span class="category_activity">'.$row['category'].'</span><span class="date">'.$row['date'].'</span></div>'.$row['heading'].'<i class="fa fa-chevron-down"></i>
                                        </div>
                                        <div class="menu">'.$row['content'].'</div>
                                      </div>';
                            }
                        }
                    ?>
                </div>
                <ul class="pager">
                    <li class="next">
                        <a href="allposts.php">更多消息 &rarr;</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-11">
                <div class="form-box">
                    <div class="logo">
                        <img src="img/nctu.png">
                    </div>
                    <hr>
                    <div class="alert alert-warning" style="margin: 0;">
                        <strong>登入功能已停用</strong>
                        <p class="mb-0">為了網站安全，暫不提供帳號登入與註冊。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

<?php
ob_start();
?>
    <script>
    $(document).ready(function(){
        $(".click").click(function(){
           //#b63b4d red  #0085a1;
            //$(this).find("div").toggle("fast",function(){$(this).css({"color": "rgb(64, 64, 64)"});$(this).parent().toggleClass("open");});
            // $(this).find("div").toggle(1000,function(){
            //     $(this).css({"color": "rgb(64, 64, 64)"});
                $(this).parent().toggleClass("open");
            // });
            $(this).next().toggleClass("menu")
        });
        $("p img").addClass("img-responsive");
    });
    </script>
<?php
$extraScripts = ob_get_clean();
require __DIR__ . '/templates/partials/footer.php';
?>

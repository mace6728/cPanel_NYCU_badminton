<!DOCTYPE html>
<html lang="zh-tw">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="國立交通大學羽球隊官方網站 · 交大羽球隊 · NCTU Badminton · 最新消息">
    <meta name="keywords" content="國立陽明交通大學羽球隊 NYCU"
    <meta name="author" content="國立交通大學羽球隊 交大羽球隊 NCTU Badminton">

    <title>國立陽明交通大學羽球隊官方網站</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
</head>

<body>

    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">陽明交大羽球隊</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">最新消息</a>
                    </li>
                    <!--.nav>li-->
                    <li>
                        <a role="button">關於球隊<span class="caret"></span></a>
                        <!--.nav>li>ul-->
                        <ul>
                            <li><a href="intro_team.html">球隊簡介<span class="upCaret"></span></a></li>
                            <li><a href="coach_liao.html" class="coach">廖威彰教練<span class="upCaret"></span></a></li>
                            <li><a href="coach_wang.html" class="coach">王志全教練<span class="upCaret"></span></a></li>
                            <!--.nav>li>ul>li-->
                            <li>
                              <a role="button">隊長介紹<span class="rightCaret"></span></a>
                              <!--.nav>li>ul>li>ul-->
                              <ul class="nav collapse">
                                <!--.nav>li>ul>li>ul>li-->
                                <li><a href="maleLeader.html">男隊長<span class="leftCaret"></span></a></li>
                                <li><a href="femaleLeader.html">女隊長<span class="leftCaret"></span></a></li>
                              </ul>
                            </li>
                            <li><a href="intro_member.html">球員介紹<span class="upCaret"></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a role="button">比賽戰績<span class="caret"></span></a>
                        <ul>
                            <li><a href="competition.html">公開組<span class="upCaret"></span></a></li>
                            <li><a href="normalCompetition.html">一般組<span class="upCaret"></span></a></li>
                        </ul>
                    </li>
                    <li>
                      <a role="button">勁竹盃<span class="caret"></span></a>
                      <ul>
                        <li><a href="JinZhu.html">簡介<span class="upCaret"></span></a></li>
                        <li><a href="JinZhuRecord.html">歷年成績<span class="upCaret"></span></a></li>
                      </ul>
                    </li>
                    <li>
                      <a role="button">風城盃<span class="caret"></span></a>
                      <ul>
                        <li><a href="wind.html">簡介<span class="upCaret"></span></a></li>
                        <li><a href="windRecord.html">歷年成績<span class="upCaret"></span></a></li>
                      </ul>
                    </li>
                    <li>
                        <a href="extraordinary.html">名人堂</a>
                    </li>
                    <li>
                        <a role="button">校友會<span class="caret"></span></a>
                        <ul>
                            <li><a href="al_announcement.html">公告<span class="upCaret"></span></a></li>
                            <li><a href="al_architecture.html">組織架構<span class="upCaret"></span></a></li>
                            <li><a href="al_President.html">歷屆會長<span class="upCaret"></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="gallery.html">活動照片</a>
                    </li>
                    <li>
                        <a href="contact.html">聯絡資訊</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                <h3 id="goRegister"><a href="al_announcement.html" style="color:#FBC02D">點選瀏覽細節</a></h3>
                <div class="links">
                    <?php
                        require_once __DIR__ . '/config/db.php';
                        $sql = "SELECT * FROM `article` ORDER BY `date` DESC LIMIT 5";
                        $sth = $db->prepare($sql);
                        $sth->execute();
                        while($row = $sth->fetch()){
                            if ($row[0]=="一般消息"){
                                echo '<div class="link">
                                        <div class="click">
                                            <div class="first"><span class="category_newest">'.$row[0].'</span><span class="date">'.$row[3].'</span></div>'.$row[1].'<i class="fa fa-chevron-down"></i>
                                        </div>
                                        <div class="menu">'.$row[2].'</div>
                                      </div>';
                            }else if($row[0]=="比賽成果"){
                                echo '<div class="link">
                                        <div class="click">
                                            <div class="first"><span class="category_gameResult">'.$row[0].'</span><span class="date">'.$row[3].'</span></div>'.$row[1].'<i class="fa fa-chevron-down"></i>
                                        </div>
                                        <div class="menu">'.$row[2].'</div>
                                      </div>';
                            }else if($row[0]=="競賽資訊"){
                                echo '<div class="link">
                                        <div class="click">
                                            <div class="first"><span class="category_competition">'.$row[0].'</span><span class="date">'.$row[3].'</span></div>'.$row[1].'<i class="fa fa-chevron-down"></i>
                                        </div>
                                        <div class="menu">'.$row[2].'</div>
                                      </div>';
                            }else{//team activity
                                echo '<div class="link">
                                        <div class="click">
                                            <div class="first"><span class="category_activity">'.$row[0].'</span><span class="date">'.$row[3].'</span></div>'.$row[1].'<i class="fa fa-chevron-down"></i>
                                        </div>
                                        <div class="menu">'.$row[2].'</div>
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

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="https://zh-tw.facebook.com/%E4%BA%A4%E9%80%9A%E5%A4%A7%E5%AD%B8%E7%BE%BD%E7%90%83%E9%9A%8A-NCTU_Badminton-332857332803/timeline/">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">NYCU Badminton 2022</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
</body>

</html>

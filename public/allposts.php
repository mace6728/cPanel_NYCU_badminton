<?php
$pageTitle = '所有消息 | 國立陽明交通大學羽球隊 NYCU Badminton';
$pageDescription = '國立交通大學羽球隊官方網站 · 交大羽球隊 · NYCU Badminton · 所有消息';
$pageCss = 'index.min.css';
ob_start();
?>
    <script>
        function nwt(){
            document.getElementById("link").style.display="none";
            document.getElementById("news").style.display="block";
            document.getElementById("end").style.display="none";
            document.getElementById("competition").style.display="none";
            document.getElementById("activity").style.display="none";

        }
        function end(){
            document.getElementById("link").style.display="none";
            document.getElementById("news").style.display="none";
            document.getElementById("end").style.display="block";
            document.getElementById("competition").style.display="none";
            document.getElementById("activity").style.display="none";

        }
        function com(){
            document.getElementById("link").style.display="none";
            document.getElementById("news").style.display="none";
            document.getElementById("end").style.display="none";
            document.getElementById("competition").style.display="block";
            document.getElementById("activity").style.display="none";

        }
        function act(){
            document.getElementById("link").style.display="none";
            document.getElementById("news").style.display="none";
            document.getElementById("end").style.display="none";
            document.getElementById("competition").style.display="none";
            document.getElementById("activity").style.display="block";

        }
    </script>
<?php
$extraHead = ob_get_clean();
require __DIR__ . '/../templates/partials/head.php';
$activePage = '';
require __DIR__ . '/../templates/partials/navbar.php';
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
            <div class="col-xs-offset-1"><div class="row">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="#news" onclick="nwt();">一般消息 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#end" onclick="end();">比賽成果</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#competition" onclick="com()";>競賽資訊</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link " href="#activity" onclick="act();">球隊活動</a>
                    </li>
                </ul>
            </div>
            </div></div>
        </div>
    </div>
    
    
    <div class="container">
        <div class="row">
            <div class="col-xs-offset-1"><div class="row">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <div  class="links">
                  <div  id="link">
                    <?php
                        require_once __DIR__ . '/../config/db.php';
                        require_once __DIR__ . '/../src/Services/ArticleService.php';
                        $articleService = new ArticleService($db);
                        foreach ($articleService->getAll() as $row) {
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
                  <div id="news" >
                    <?php
                        foreach ($articleService->getByCategory('一般消息') as $row) {
                            echo '<div class="link">
                                    <div class="click">
                                        <div class="first"><span class="category_newest">'.$row['category'].'</span><span class="date">'.$row['date'].'</span></div>'.$row['heading'].'<i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="menu">'.$row['content'].'</div>
                                  </div>';
                        }
                    ?>
                  </div>
                  <div id="end">
                    <?php
                        foreach ($articleService->getByCategory('比賽成果') as $row) {
                            echo '<div class="link">
                                    <div class="click">
                                        <div class="first"><span class="category_gameResult">'.$row['category'].'</span><span class="date">'.$row['date'].'</span></div>'.$row['heading'].'<i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="menu">'.$row['content'].'</div>
                                  </div>';
                        }
                    ?>
                  </div>
                  <div id="competition">
                    <?php
                        foreach ($articleService->getByCategory('競賽資訊') as $row) {
                            echo '<div class="link">
                                    <div class="click">
                                        <div class="first"><span class="category_competition">'.$row['category'].'</span><span class="date">'.$row['date'].'</span></div>'.$row['heading'].'<i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="menu">'.$row['content'].'</div>
                                  </div>';
                        }
                    ?>
                  </div>
                  <div id="activity">
                    <?php
                        foreach ($articleService->getByCategory('球隊活動') as $row) {
                            echo '<div class="link">
                                    <div class="click">
                                        <div class="first"><span class="category_activity">'.$row['category'].'</span><span class="date">'.$row['date'].'</span></div>'.$row['heading'].'<i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="menu">'.$row['content'].'</div>
                                  </div>';
                        }
                    ?>
                  </div>
                </div>
                
                
            </div>
            </div></div>
        </div>
    </div>
<?php
ob_start();
?>
    <script src="js/blog.js"></script>
    <script>
    function ff(item){
    	console.log(item.replace(/(<([^>]+)>)/ig,""));
    }
    $(document).ready(function(){
        $(".click").click(function(){
           //#b63b4d red  #0085a1;
            //$(this).find("div").toggle("fast",function(){$(this).css({"color": "rgb(64, 64, 64)"});$(this).parent().toggleClass("open");});
            // console.info($(this))
            // console.info($(this).next())
            // $(this).next().toggle(1000,function(){
            //     //$(this).css({"color": "rgb(64, 64, 64)"});
            //     //$(this).parent().toggleClass("open");
            //      console.info($(this))
                // $(this).next().toggleClass("menu")
            // });
            // console.info($(this).find(".menu"))
            // console.info($(this).next())
            $(this).next().toggleClass("menu")
            $(this).parent().toggleClass("open");
	        //$(this).find("div").html().split('<').forEach(ff);
        });
        $("p img").addClass("img-responsive");
    });
    $("#link").css('display','block');
    $("#news").css('display','none');
    $("#end").css('display','none');
    $("#competition").css('display','none');
    $("#activity").css('display','none');
    </script>
<?php
$extraScripts = ob_get_clean();
require __DIR__ . '/../templates/partials/footer.php';
?>
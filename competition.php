<?php
$pageTitle = '公開組比賽戰績 | 國立陽明交通大學羽球隊 NYCU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 公開組比賽戰績 · competition achievements of nctu badminton';
$pageCss = 'competition.min.css';
ob_start();
?>
    <style>
      .normal-card{
        box-shadow: 0 2px 4px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19)!important;
        margin-bottom:30px;
      }
      .achieve-heading{
        background-color: #81d4fa;/*rgba(129, 212, 250, 1);*/
        text-align:center;
        padding:20px 0;
        margin:0;
      }
      .achieve-heading.female{
      	background-color: #ef9a9a;
      }
      .achieve-heading.open{
        background-color: #FFEB3B;
        transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
      }
      .seeWhole{
        cursor: pointer;
        text-align:center;
        padding:10px;
      }
      .seeWhole i{
        padding:0 5px;
        transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
      }
      .seeWhole.open{
        transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
      }
      .seeWhole.open i{
        transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transform:rotate(180deg);
      }
      .wholeList.open{
        display: block;
        visibility:visible;
        opacity: 1;
        /*height: 100%;*/
        transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
      }
      .wholeList{
        display:none;
        visibility:hidden;
        opacity: 0;
        text-align:center;
        /*height: 0%;*/
        transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
      }
      .wholeList div div{
        padding:5px 0;
        line-height:28px;
      }
      .singleDouble p,.singleSingle p,.team p{
        background-color: #FFEB3B;
        margin:0;
        padding:5px 0;
      }
    </style>
<?php
$extraHead = ob_get_clean();
require __DIR__ . '/templates/partials/head.php';
$activePage = 'competition';
require __DIR__ . '/templates/partials/navbar.php';
?>

    <header class="intro-header" style="background-image: url('img/competiotion_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>公開組比賽戰績</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
          <div class="col-lg-offset-0 col-lg-12 col-md-offset-2 col-md-10 col-sm-offset-1 col-sm-11 col-xs-offset-2 col-xs-8">
            <h2 class="section-heading">團體賽</h2>
          </div>
          
           <div class="col-lg-4 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">108年大運會公開男子團體組 第五名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      鍾松翰、郭彧辰、孫晨淯<br>
                      許皓程、林錡楓、林乙宙<br>
                      陳均佳
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
        <div class="clearfix hidden-lg"></div>
          <div class="col-lg-offset-0 col-lg-12 col-md-offset-2 col-md-10 col-sm-offset-1 col-sm-11 col-xs-offset-2 col-xs-8">
            <h2 class="section-heading">男生組</h2>
          </div>
          <div class = "row">
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-2 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-2 col-xs-8">
            <div class="card">
                 <div class="card-block">
                  <h4 class="card-title">陳宗翰</h4>
                  <h6 class="card-subtitle text-muted">118級 工業工程與管理學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/people.png" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">110年全國乙組排名賽男單第五名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8" >
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">蘇致豪</h4>
                  <h6 class="card-subtitle text-muted">99級 機械工程系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/99蘇致豪.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">96年第1次全國乙組排名賽男單第四名</p>
                            <p class="card-text">97年全大運公開組男單第六名</p>
                            <p class="card-text">98年第1次全國乙組排名賽男單第二名</p>
                            <p class="card-text">101年全大運公開組男單第四名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8" >
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">廖鍵文</h4>
                  <h6 class="card-subtitle text-muted">100級 工業工程與管理學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/98廖鍵文.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">100年第2次全國乙組排名賽男雙第五名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-2 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-2 col-xs-8">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">陳立遠</h4>
                  <h6 class="card-subtitle text-muted">103級 電機工程學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/101陳立遠.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">100年第二次全國乙組排名賽男雙第五名</p>
                            <p class="card-text">101年第一次全國乙組排名賽男雙前16</p>
                            <p class="card-text">101年第二次全國乙組排名賽男雙前16</p>
                            <p class="card-text">105年第一次全國乙組排名賽男雙第五名</p>
                            <p class="card-text">101年全大運公開組混雙第四名</p>
                            <p class="card-text">102年全大運公開組男雙第四名</p>
                            <p class="card-text">104年全大運公開組男雙第八名</p>
                            <p class="card-text">108年第二次全國乙組排名賽男雙第五名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          </div>
          <div class = "row">
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8" >
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">林韋宇</h4>
                  <h6 class="card-subtitle text-muted">103級 生物科技學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/people.png" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">101年第二次全國乙組排名賽男雙前十六</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-2 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-2 col-xs-8">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">高源懋</h4>
                  <h6 class="card-subtitle text-muted">104級 工業工程與管理學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/102高源懋.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">105年全大運公開組男雙第五</p>
                            <p class="card-text">105年全大運公開組混雙第八</p>
                            <p class="card-text">104年第一次全國乙組排名賽男雙第五</p>
                            <p class="card-text">104年第二次全國乙組排名賽男雙第三</p>
                            <p class="card-text">101年第二次全國乙組排名賽男雙前十六</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8" >
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">鐘松翰</h4>
                  <h6 class="card-subtitle text-muted">105級 工業工程與管理學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/103鐘松翰.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">102年全大運公開組男雙第四</p>
                            <p class="card-text">103年全大運公開組男單第五</p>
                            <p class="card-text">105年全大運公開組男雙第五</p>
                            <p class="card-text">105年全大運公開組混雙第三</p>
                            <p class="card-text">104年第一次全國乙組排名賽男雙第五</p>
                            <p class="card-text">104年第二次全國乙組排名賽男雙第三</p>
                            <p class="card-text">106年全大運公開組男單第五名</p>
                            <p class="card-text">108年第二次全國乙組排名賽男雙第五名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          </div>
          <div class = "row">
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">郭彧辰</h4>
                  <h6 class="card-subtitle text-muted">106級 機械工程學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/104郭彧辰.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">103年全大運公開組男單第四</p>
                            <p class="card-text">105年全大運公開組男單第四</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-2 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-2 col-xs-8">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">孫晨淯</h4>
                  <h6 class="card-subtitle text-muted">111級 資訊管理與財務金融學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/109孫晨淯.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">108年第二次全國乙組排名賽男單第六名</p>
                            <p class="card-text">109年第一次全國乙組排名賽男單第五名</p>
                            <p class="card-text">109年全大運公開組男單第三名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-2 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-2 col-xs-8">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">陳均佳</h4>
                  <h6 class="card-subtitle text-muted">111級 光電工程學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/109陳均佳.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">成績here</p>
                            <p class="card-text">成績here</p>
                            <p class="card-text">成績here</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          
          </div>
          <div class = "row">
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">高忻緯</h4>
                  <h6 class="card-subtitle text-muted">112級 應用數學學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/110高忻緯.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">成績here</p>
                            <p class="card-text">成績here</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          
          <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">張軒齊</h4>
                  <h6 class="card-subtitle text-muted">115級 工業工程與管理學系</h6>
                </div>
                <img src="img/男羽歷屆隊長照片/112張軒齊.jpg" alt="Card image" style="height: auto; width: 100%; display: block;">
                <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">成績here</p>
                            <p class="card-text">成績here</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
            </div>
          </div>
          
          </div>
        <div class="clearfix hidden-lg"></div>
        <div class="col-lg-offset-0 col-lg-12 col-md-offset-2 col-md-10 col-sm-offset-1 col-sm-11 col-xs-offset-1 col-xs-10">
          <h2 class="section-heading">女生組</h2>
        </div>
        <div class = "row">
        <div class="col-lg-offset-0 col-lg-4 col-md-offset-2 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-2 col-xs-8">
          <div class="card">
              <div class="card-block">
                <h4 class="card-title">彭婉婷</h4>
                <h6 class="card-subtitle text-muted">101級 傳播與科技學系</h6>
              </div>
              <img src="img/女體資照片/彭婉婷.jpg" alt="彭婉婷image" style="height: auto; width: 100%; display: block;">
              <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">101年大專盃公開組混雙第四名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
          </div>
        </div>
        <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8" >
          <div class="card">
              <div class="card-block">
                <h4 class="card-title">江美儀</h4>
                <h6 class="card-subtitle text-muted">100級 管理科學系/管理科學研究所</h6>
              </div>
              <img src="img/女體資照片/江美儀.jpg" alt="江美儀image" style="height: auto; width: 100%; display: block;">
              <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">103年大專盃公開組女雙第四名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
          </div>
        </div>
        <div class="clearfix hidden-lg"></div>
        <div class="col-lg-offset-0 col-lg-4 col-md-offset-2 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-2 col-xs-8">
          <div class="card">
              <div class="card-block">
                <h4 class="card-title">蘇致萱</h4>
                <h6 class="card-subtitle text-muted">103級 工業工程與管理學系/工業工程與管理研究所</h6>
              </div>
              <img src="img/女體資照片/蘇致萱.jpg" alt="蘇致萱image" style="height: auto; width: 100%; display: block;">
              <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">104年大專盃公開組女雙第五名</p>
                            <p class="card-text">104年第一次羽球排名賽甲組女單十二名</p>
                            <p class="card-text">102年大專盃公開組女單第七名</p>
                            <p class="card-text">101年大專盃公開組女單第五名</p>
                            <p class="card-text">101年大專盃公開組混雙第七名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
          </div>
        </div>
        </div>
        <div class = "row">
        <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8" >
          <div class="card">
              <div class="card-block">
                <h4 class="card-title">陳祐如</h4>
                <h6 class="card-subtitle text-muted">105級 人文社會學系</h6>
              </div>
              <img src="img/女體資照片/陳祐如.jpg" alt="陳祐如image" style="height: auto; width: 100%; display: block;">
              <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">105年大專盃公開組混雙第八名</p>
                            <p class="card-text">104年大專盃公開組女雙第五名</p>
                            <p class="card-text">106年全大運公開組女雙第六名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
          </div>
        </div>
        <div class="clearfix hidden-lg"></div>
        <div class="col-lg-offset-0 col-lg-4 col-md-offset-2 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-2 col-xs-8" >
          <div class="card">
              <div class="card-block">
                <h4 class="card-title">劉黛蓉</h4>
                <h6 class="card-subtitle text-muted">106級 電機工程學系</h6>
              </div>
              <img src="img/女體資照片/劉黛蓉.jpg" alt="劉黛蓉image" style="height: auto; width: 100%; display: block;">
              <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">105年大專盃公開組混雙第三名</p>
                            <p class="card-text">104年大專盃公開組女單第六名</p>
                            <p class="card-text">103年大專盃公開組女雙第四名</p>
                            <p class="card-text">106年全大運公開組女雙第六名</p>
                            <p class="card-text">106年全大運公開組女單第六名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
          </div>
        </div>
        <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-5 col-xs-offset-2 col-xs-8" >
          <div class="card">
              <div class="card-block">
                <h4 class="card-title">許玟琪</h4>
                <h6 class="card-subtitle text-muted">109級 工業工程與管理學系</h6>
              </div>
              <img src="img/女體資照片/許玟琪.jpg" alt="許玟琪image" style="height: auto; width: 100%; display: block;">
              <div>
                    <div class="wholeList">
                      <div class="team">
                        <div>
                            <p class="card-text">105年第二次羽球排名賽甲組女單第八名</p>
                            <p class="card-text">106年全大運公開組女單第一名</p>
                            <p class="card-text">107年全大運公開組女單第三名</p>
                            <p class="card-text">108年第一次羽球排名賽甲組女單第四名</p>
                            <p class="card-text">108年全大運公開組女單第一名</p>
                            <p class="card-text">108年第二次全國甲組排名賽女單第七名</p>
                        </div>
                      </div>
                    </div>
                    <div class="seeWhole">完整獎項<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div>
          </div>
        </div>
        </div>
    </div>
<?php
ob_start();
?>
    <script src="js/blog.min.js"></script>

    <script>
    //   $(".seeWhole").click(function(){
    //     $(this).toggleClass("open");
    //     $(this).prev().toggle(500);
    //     $(this).prev().parent().prev().toggleClass("open");
    //   });
    $(".seeWhole").click(function(){
        // $(this).parent().toggleClass("open");
        $(this).toggleClass("open");
        // $(this).prev().toggle(500);
        $(this).prev().toggleClass("open", 0.5);
        // $(this).prev().toggle('slow', function() {
        //     console.log($(this))
        //     $(this).toggleClass('open');
        // });
        // $(this).prev().parent().prev().toggleClass("open");
    });
    </script>
<?php
$extraScripts = ob_get_clean();
require __DIR__ . '/templates/partials/footer.php';
?>

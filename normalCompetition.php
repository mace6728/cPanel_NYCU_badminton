<?php
$pageTitle = '一般組比賽戰績 | 國立陽明交通大學羽球隊 NYCU Badminton';
$pageDescription = '國立交通大學羽球隊 · 交大羽球隊 · NCTU Badminton · 一般組比賽戰績 · competition achievements of nctu badminton';
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
        background-color:rgba(244, 67, 54, 0.9);
        color:white;
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
$activePage = 'normalCompetition';
require __DIR__ . '/templates/partials/navbar.php';
?>

    <header class="intro-header" style="background-image: url('img/competiotion_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>一般組比賽戰績</h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
          <div class="col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-11 col-xs-offset-1">
          <h2 class="section-heading">大專盃/大運會/全大運戰績</h2>
          </div>
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">115年全大運男子組 第五名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                        陳昀澔、劉易洲、黃宜澤<br>
                        林彥均、蔡玨凱、林稟儒<br>
                        張傑淇、吳承祐、黃子昕<br>
                        林昊錡、郭綽軒、張紘誌<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
                      <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">115年全大運女子組 第三名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                       紀儷智、邱翊榛、黃于真<br>
                       林昀安、賴佳莘、黃安安<br>
                       楊昀容、郭映妤、黃仲璿<br>
                       林佳汶、王均琦、郭庭榛<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">114年全大運男子組 第五名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                        吳承祐、林昊錡、林稟儒<br>
                        張紘誌、黃子昕、黃宜澤<br>
                        黃承勛、黃彥涵、廖帷丞<br>
                        劉易洲、蔡絜明、賴睿宬<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
                      <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">114年全大運女子組 第五名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                       陳瑱、周佳艷、張琴侑<br>
                       呂俐萱、鄭天愛、鄭子彤<br>
                       呂靜瑤、劉元芳<br>
                       蘇欣美、黃于瑄<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">113年全大運男子組 第九名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                        黃承勛、梁又壬、黃冠勳<br>
                        吳昱橋、蔡秉融、黃宜澤<br>
                        蔡絜明、廖帷丞、賴睿宬<br>
                        林昊錡、蔡玨凱、林子捷<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
                    
          
            <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">113年全大運女子組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                       陳瑱、周佳艷、張琴侑<br>
                       呂俐萱、鄭天愛、鄭子彤<br>
                       呂靜瑤、劉元芳<br>
                       蘇欣美、黃于瑄<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">112年全大運男子組 第五名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      梁又壬、林昊錡、黃冠勳<br>
                      蔡絜明、賴睿宬、張禾昕<br>
                      吳昱橋、鄭智元、黃宜澤<br>
                      黃彥涵、郭柏延、黃泓叡<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">112年全大運女子組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                       呂俐萱、鄭子彤、蘇欣美<br>
                       許曈、周佳艷、邱翊榛<br>
                       黃雅珮、呂靜瑤、張琴侑<br>
                       劉佩佳、陳　瑱、王綰晴<br>	
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">111年全大運男子組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      蔡秉融、林昊錡、黃冠勳<br>
                      蔡絜明、賴睿宬、張禾昕<br>
                      林昱凱、鄭智元、黃宜澤<br>
                      陳暐昇、傅宥東、黃泓叡<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">111年全大運女子組 第三名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                       蔡宜樺、鄭子彤、蘇欣美<br>
                       宋瑾瑜、周佳艷、蔡彣昕<br>
                       黃雅珮、王亭尹、黃于瑄<br>
                       劉佩佳、陳　瑱、周翊雯<br>	
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">110年全大運男子組 第六名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      王靖庭、林昱凱、徐嘉鴻<br>
                      梁又壬、曾昱瑋、曾啟鈞<br>
                      黃宜澤、黃泓叡、楊鎮嘉<br>
                      劉易洲、蔡絜明、黃冠勳<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">110年全大運女子組 第四名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                       吳禹欣、呂佳芳、呂靜瑤<br>
                       陳  瑱、黃思曼、黃桂如<br>
                       蔡彣昕、蔡宜樺、鄭子彤<br>
                       賴玉珊<br>	
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">109年全大運男子組 第四名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      孫新磊、黃彥涵、梁又壬<br>
                      戴國倫、吳竹銘、陳興宇<br>
                      劉易洲、黃泓叡、鐘聖涵<br>
                      曾昱瑋、洪凱恩、黃冠勳<br>
                      黃上豪
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">109年全大運女子組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                        呂佳芳、鄭子彤、邱思寧<br>
                        黃思曼、黃桂如、呂靜瑤<br>
                        陳  瑱、賴玉珊、陳幽秀<br>
                        許幸羽、吳禹欣、蔡彣昕	
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">108年全大運男子組</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      李紹成、梁又壬、辛諾鵬<br>
                      黃冠勳、黃上豪、戴國倫<br>
                      吳竹銘、林詮東、吳東祐<br>
                      徐翊珉
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">108年全大運女子組 第四名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                        呂佳芳、李哲君、王姿雯<br>
                        曾莉晴、黃思曼、許瑋婷<br>
                        陳幽秀、佘巧妤、蔡彣昕<br>
                        陳俞文、吳禹欣
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">107年全大運男子組 第五名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                        林詮東、林　又、李紹成<br>	
                        賴春匠、黃上豪、温唯辰<br>	
                        戴國倫、吳竹銘、丁冠中<br>
                        黃昱翔、鐘聖涵、林智隆
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">107年全大運女子組 第三名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                        丁宣勻、李哲君、王姿雯<br>
                        林詩雯、何家沂、林軒筠<br>
                        陳幽秀、佘巧妤、林家瑄<br>
                        陳俞文、吳禹欣、蔡彣昕
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">106年全大運男子組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      李紹成、羅　傑、林　又<br>
                      陳昀澔、李　煥、戴國倫<br>
                      吳竹銘、陳興宇、葉承宗<br>
                      温唯辰、陳政柏、林智隆
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">106年全大運女子組</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                        李哲君、何家沂、林軒筠<br>
                        陳幽秀、林家瑄、吳禹欣<br>
                        蔡彣昕、張嘉凌、姚芸蓁<br>
                        蕭心妤、曹郡欣、林枋萭
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--1-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">105年大專盃男子組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      黃昱翔、葉承宗、林　又<br>
                      陳昀浩、戴國倫、林智隆<br>
                      高銘遠、羅　傑、吳竹銘<br>
                      董育呈、沈權暉、陳政柏
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!-- -2-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">105年大專盃女子組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      黃嘉寶、林軒筠、何家沂<br>
                      葉伊蕙、李哲君、吳禹欣<br>
                      黃　暄、余芊樺、林家瑄<br>
                      吳佳杬、張嘉凌、林季晴
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <!--3-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading male">104年大運會男子組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      武伯原、高銘遠、陳冠廷<br>
                      羅　傑、林　又、丁冠中<br>
                      陳昀澔、戴國倫、陳政柏<br>
                      董育呈、黃佳雄、沈權暉
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--4-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">104年大運會女子組 第三名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      李明璇、許瑋婷、黃嘉寶<br>
                      余芊樺、胡庭禎、陳怡璇<br>
                      姜藍茵、吳佳杬、黃小紅<br>
                      楊乃蓁、陳琪惠、郭育甄
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--5-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">103年大運會男子組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      武伯原、高銘遠、陳冠廷<br>
                      羅　傑、林　又、沈桓丞<br>
                      謝一弘、楊子逸、陳昀澔<br>
                      張宇鎮、戴國倫、陳儀澧
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <!--6-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">103年大運會女子組</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      李明璇、陳儀儒、黃　暄<br>
                      余芊樺、黃韵如、胡庭禎<br>
                      陳萱芸、陳怡璇、姜藍茵<br>
                      吳佳杬、黃小紅、郭育甄<br>
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--7-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">102年大運會男子組 第三名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      高銘遠、羅　傑、沈桓丞<br>
                      謝一弘、楊子逸、陳宏富<br>
                      黃彥超、陳德煊、陳昀澔<br>
                      張宇鎮、陳儀澧、顏佳新
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--8-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">102年大運會女子組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      陳儀儒、黃　暄、余芊樺<br>
                      黃韵如、吳清榕、陳萱芸<br>
                      蔡　婷、鄧筱涵、陳怡璇<br>
                      姜藍茵、黃小紅、李明璇
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <!--9-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">101年大運會男子組 第五名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      沈桓丞、謝一弘、丁冠中<br>
                      翁瑞辰、李東璋、陳昀澔<br>
                      盧泓佑、魏鉦銓、陳儀澧<br>
                      楊高竹、黃佳雄、顏佳新
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--10-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">101年大運會女子組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      楊麗寰、張綺文、黃　暄<br>
                      余芊樺、林詩雯、鄭巧翎<br>
                      蔡　婷、鄧筱涵、陳怡璇<br>
                      姜藍茵、黃小紅、林怡萱
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--11-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">100年大運會男子組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      彭霖祥、葉騉豪、李東璋<br>
                      方奎輯、李建翰、謝一弘<br>
                      羅　傑、徐綱駿、盧泓佑<br>
                      范仕坤、吳昀霖、丁冠中
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <!--12-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">100年大運會女子組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      張綺文、池冠儀、林玉婷<br>
                      黃郁淳、林詩雯、鄭巧翎<br>
                      何佩瑾、陳怡璇、黃小紅<br>
                      林怡萱
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
		  <div class="clearfix hidden-lg hidden-xs"></div>
          <!--13-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">99年大運會男子組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      謝一弘、羅　傑、李建翰<br>
                      馮世綸、彭其捷、徐綱駿<br>
                      王智洋、盧泓佑、范仕坤<br>
                      謝其晟
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--14-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">99年大運會女子組 第三名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      黃小紅、林詩雯、林玉婷<br>
                      李妍儀、林巾鈴、鄧筱涵<br>
                      盧沛樺、黃郁淳、楊惠筑<br>
                      鄭巧翎
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          
		　<div class="clearfix hidden-lg hidden-xs"></div>
          <!--15-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">98年大運會男乙組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
	                    羅　傑、謝一弘、馮世倫<br>
	                    簡維志、徐綱駿、盧泓佑<br>
	                    黃勁霖、謝其晟、蔡松育<br>
	                    朱政威
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--16-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">98年大運會女乙組 第三名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
	                    李妍儀、池冠儀、盧沛樺<br>
	                    林玉婷、林巾鈴、黃郁淳<br>
	                    楊惠筑、朱馨吟、鄧筱涵<br>
	                    陳筱芸
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--17-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">97年大運會男乙組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
	                    馮世倫、謝其晟、韓子祥<br>
	                    劉君彥、盧泓佑、吳政哲<br>
	                    簡維志、李柏毅、黃為崧<br>
	                    蔡松育、謝一弘、羅　傑<br>
	                    吳振揚、徐綱駿、蘇致豪<br>
	                    葉哲維
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <!--18-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">97年大運會女乙組 第二名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
	                    李妍儀、洪菽鴻、呂伯芬<br>
	                    陳怡君、陳筱芸、李幸穎<br>
	                    蔡紓婷、朱馨吟、林玉婷<br>
	                    鄭意玲、童思頻、楊惠筑<br>
	                    黃郁淳、盧沛樺
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--19-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">96年大專盃男乙組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
	                    謝一弘、陳奕全、黃為崧<br>
	                    甘　杰、李柏毅、陳威碩<br>
	                    黃勁霖、韓子祥、徐綱駿<br>
	                    馮世倫、陳志遠、蔡松育<br>
	                    羅　傑、呂聯德、韓建智<br>
	                    彭霖祥
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--20-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">96年大專盃女乙組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
	                    唐健芳、楊惠筑、陳育新<br>
	                    高湘婷、洪菽鴻、吳盈潔<br>
	                    盧沛樺、陳筱芸、林佳叡<br>
	                    陳貞妤、鄭意玲、林佳蓉<br>
	                    滕薇鈞、林玉婷、栗嘉徽<br>
	                    李妍儀
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          
          <!--21-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">95年大專盃男乙組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
	                    黃為崧、甘　杰、謝一弘<br>
	                    馮世倫、許裕彬、陳威碩<br>
	                    陳奕全、黃勁霖、何克彬<br>
	                    吳弘麒、游嘉智、陳志遠<br>
	                    張智雄、韓建智、許智揚<br>
	                    王晨屹、蔡松育
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--22-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading female">95年大專盃女乙組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
	                    吳盈潔、高湘婷、陳貞妤<br>
	                    林佳叡、蘇郁文、陳育新<br>
	                    張瑋玲、滕薇鈞、李幸穎<br>
	                    葉純如、鄭意玲、朱馨吟<br>
	                    陳筱芸、蔡淑羚、陳怡靜<br>
	                    唐健芳、洪菽鴻、林佳蓉
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-lg hidden-xs"></div>
          <!--23-->
          <div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="normal-card">
              <h2 class="achieve-heading">94年大專盃男乙組 第一名</h2>
              <div>
                <div class="wholeList">
                  <div class="team">
                    <div>
                      甘　杰、黃勁霖、謝一弘<br>
                      何克彬、許裕彬、陳志遠<br>
                      陳威碩、許智揚、黃為崧<br>
                      蔡松育
                    </div>
                  </div>
                </div>
                <div class="seeWhole">完整參賽名單<i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div>
            </div>
          </div><!--end of grid-->
          <div class="clearfix hidden-md hidden-sm hidden-xs"></div>
        </div>
    </div>
<?php
ob_start();
?>
    <script src="js/blog.min.js"></script>
    <script>
      $(".seeWhole").click(function () {
        var $toggle = $(this);
        $toggle.toggleClass("open");
        $toggle.prev(".wholeList").toggleClass("open");
      });
    </script>
<?php
$extraScripts = ob_get_clean();
require __DIR__ . '/templates/partials/footer.php';
?>

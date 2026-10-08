<?php
/**
 * Shared site navbar. Set $activePage to the current page's key before requiring
 * this file, so that page's own nav link renders as "#" instead of a live link
 * (matching the site's pre-existing behavior of disabling the self-link).
 *
 * Keys: index, intro_team, coach_liao, coach_wang, maleLeader, femaleLeader,
 * intro_member, competition, normalCompetition, JinZhu, JinZhuRecord, wind,
 * windRecord, extraordinary, al_announcement, al_architecture, al_President,
 * gallery, contact
 */
$activePage = $activePage ?? '';

function nav_href(string $page, string $target, string $active): string
{
    return $page === $active ? '#' : $target;
}
?>
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= nav_href('index', 'https://badminton.club.nycu.edu.tw', $activePage) ?>">陽明交大羽球隊</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?= nav_href('index', 'https://badminton.club.nycu.edu.tw', $activePage) ?>">最新消息</a>
                    </li>
                    <!--.nav>li-->
                    <li>
                        <a role="button">關於球隊<span class="caret"></span></a>
                        <!--.nav>li>ul-->
                        <ul>
                            <li><a href="<?= nav_href('intro_team', 'intro_team.php', $activePage) ?>">球隊簡介<span class="upCaret"></span></a></li>
                            <li><a href="<?= nav_href('coach_liao', 'coach_liao.php', $activePage) ?>" class="coach">廖威彰教練<span class="upCaret"></span></a></li>
                            <li><a href="<?= nav_href('coach_wang', 'coach_wang.php', $activePage) ?>" class="coach">王志全教練<span class="upCaret"></span></a></li>
                            <!--.nav>li>ul>li-->
                            <li>
                              <a role="button">隊長介紹<span class="rightCaret"></span></a>
                              <!--.nav>li>ul>li>ul-->
                              <ul class="nav collapse">
                                <!--.nav>li>ul>li>ul>li-->
                                <li><a href="<?= nav_href('maleLeader', 'maleLeader.php', $activePage) ?>">男隊長<span class="leftCaret"></span></a></li>
                                <li><a href="<?= nav_href('femaleLeader', 'femaleLeader.php', $activePage) ?>">女隊長<span class="leftCaret"></span></a></li>
                              </ul>
                            </li>
                            <li><a href="<?= nav_href('intro_member', 'intro_member.php', $activePage) ?>">球員介紹<span class="upCaret"></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a role="button">比賽戰績<span class="caret"></span></a>
                        <ul>
                            <li><a href="<?= nav_href('competition', 'competition.php', $activePage) ?>">公開組<span class="upCaret"></span></a></li>
                            <li><a href="<?= nav_href('normalCompetition', 'normalCompetition.php', $activePage) ?>">一般組<span class="upCaret"></span></a></li>
                        </ul>
                    </li>
                    <li>
                      <a role="button">勁竹盃<span class="caret"></span></a>
                      <ul>
                        <li><a href="<?= nav_href('JinZhu', 'JinZhu.php', $activePage) ?>">簡介<span class="upCaret"></span></a></li>
                        <li><a href="<?= nav_href('JinZhuRecord', 'JinZhuRecord.php', $activePage) ?>">歷年成績<span class="upCaret"></span></a></li>
                      </ul>
                    </li>
                    <li>
                      <a role="button">風城盃<span class="caret"></span></a>
                      <ul>
                        <li><a href="<?= nav_href('wind', 'wind.php', $activePage) ?>">簡介<span class="upCaret"></span></a></li>
                        <li><a href="<?= nav_href('windRecord', 'windRecord.php', $activePage) ?>">歷年成績<span class="upCaret"></span></a></li>
                      </ul>
                    </li>
                    <li>
                        <a href="<?= nav_href('extraordinary', 'extraordinary.php', $activePage) ?>">名人堂</a>
                    </li>
                    <li>
                        <a role="button">校友會<span class="caret"></span></a>
                        <ul>
                            <li><a href="<?= nav_href('al_announcement', 'al_announcement.php', $activePage) ?>">公告<span class="upCaret"></span></a></li>
                            <li><a href="<?= nav_href('al_architecture', 'al_architecture.php', $activePage) ?>">組織架構<span class="upCaret"></span></a></li>
                            <li><a href="<?= nav_href('al_President', 'al_President.php', $activePage) ?>">歷屆會長<span class="upCaret"></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= nav_href('gallery', 'gallery.php', $activePage) ?>">活動照片</a>
                    </li>
                    <li>
                        <a href="<?= nav_href('contact', 'contact.php', $activePage) ?>">聯絡資訊</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

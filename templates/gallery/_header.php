<?php
/** Hero banner shared by the three gallery page types. Expects $heading, $basePath, $e; $heroColumns is optional. */
?>
    <header class="intro-header" style="background-image: url('<?= $e($basePath) ?>img/competiotion_bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="<?= $heroColumns ?? 'col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1' ?>">
                    <div class="site-heading">
                        <h1><?= $e($heading) ?></h1>
                        <hr class="small">
                        <span class="subheading">NYCU Badminton</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php
/**
 * Shared footer + closing scripts/tags. Set $extraScripts (raw HTML) before
 * requiring this file for any page-specific <script> tags that must load
 * after jquery/bootstrap (optional).
 */
$extraScripts = $extraScripts ?? '';
?>
    <hr>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="https://www.facebook.com/p/%E4%BA%A4%E9%80%9A%E5%A4%A7%E5%AD%B8%E7%BE%BD%E7%90%83%E9%9A%8A-NCTU_Badminton-100054456520532/?locale=zh_TW">
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
    <script src="js/bootstrap.js"></script>
<?= $extraScripts ?>
</body>

</html>

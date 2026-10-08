jQuery(document).ready(function ($) {
    var desktopBreakpoint = 1170;

    if ($(window).width() > desktopBreakpoint) {
        $(".navbar-custom").height();

        $(window).on("scroll", { previousTop: 0 }, function (event) {
            var currentTop = $(window).scrollTop();

            if (currentTop < event.data.previousTop) {
                // Scrolling up
                if (currentTop > 0 && $(".navbar-custom").hasClass("is-fixed")) {
                    $(".navbar-custom").addClass("is-visible");
                } else {
                    $(".navbar-custom").removeClass("is-visible is-fixed");
                }
            } else {
                // Scrolling down
                $(".navbar-custom").addClass("is-visible is-fixed");
            }

            event.data.previousTop = currentTop;
        });
    }

    // Top-level dropdown toggle (e.g. "關於球隊"): open its own submenu,
    // closing any other top-level submenu that was open.
    $(".nav>li>a").click(function () {
        $(this).parent().toggleClass("levelOneOpen");
        $(this).parent().siblings().each(function () {
            $(this).removeClass("levelOneOpen");
        });
    });

    // Second-level dropdown toggle (e.g. "隊長介紹" nested inside "關於球隊"):
    // same idea, one level deeper.
    $(".nav>li>ul>li>a").click(function () {
        $(this).parent().toggleClass("levelTwoOpen");
        $(this).parent().siblings().each(function () {
            $(this).removeClass("levelTwoOpen");
        });
    });
});

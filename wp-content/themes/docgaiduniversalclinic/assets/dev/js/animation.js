(function ($) {

    // TODO AOS Scrollable animation init
    function isScrolledIntoView(elem) {
        let docViewTop = $(window).scrollTop();
        let docViewBottom = docViewTop + $(window).height();
        let elemTop = $(elem).offset().top + 100;
        let elemBottom = elemTop + $(elem).outerHeight();

        return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom));
    }

    function checkAnimation() {
        $('.hidden-hd, .hidden-hd-hero, .hidden-rotate, .hidden-arrow, .hidden-fly, .hidden-arrows, .hidden-items, .home-guide-torch, .love-up, .hidden, .hidden-hd-right-hero-rotate').each(function () {
            if (isScrolledIntoView(this)) {
                $(this).addClass('show');
            }
        });
    }

    $(window).on('scroll', checkAnimation);
    $(window).on('load', checkAnimation);

})(jQuery);
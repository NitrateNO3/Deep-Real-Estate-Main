(function($){

    'use strict';

    // jQuery objects
    var $win = $(window),
        $doc = $(document),
        $body = $('body'),
        $hBody = $('html, body'),
        $relatedNews = $('.related-news-slider'),
        $featProp = $('.featured-property-silder'),
        $newestProp = $('.newest-properties-slider'),
        $newProp = $('.new-property-slider'),
        $testi1 = $('.testimonials-slider-1'),
        $otherProp = $('.other-single-slider');

    function relatedNewsSlider(a) {
        if (a < 482) {

            $relatedNews.bxSlider({
                auto: true,
                pager: false,
                controls: false,
                minSlides: 1,
                maxSlides: 6,
                slideWidth: 451,
                slideMargin: 30,
                moveSlides: 1,
            });

            $featProp.bxSlider({
                auto: true,
                pager: false,
                controls: false,
                minSlides: 1,
                maxSlides: 6,
                slideWidth: 451,
                slideMargin: 30,
                moveSlides: 1,
            });

            $newestProp.bxSlider({
                auto: true,
                pager: false,
                controls: true,
                minSlides: 1,
                maxSlides: 6,
                slideWidth: 451,
                slideMargin: 30,
                moveSlides: 1,
            });

            $newProp.bxSlider({
                auto: true,
                pager: false,
                controls: false,
                minSlides: 1,
                maxSlides: 6,
                slideWidth: 481,
                slideMargin: 0,
                moveSlides: 1,
            });

            $testi1.bxSlider({
                auto: true,
                pager: false,
                controls: false,
                minSlides: 1,
                maxSlides: 6,
                slideWidth: 451,
                slideMargin: 30,
                moveSlides: 1,
            });

            $otherProp.bxSlider({
                auto: true,
                pager: false,
                controls: false,
                minSlides: 1,
                maxSlides: 6,
                slideWidth: 451,
                slideMargin: 30,
                moveSlides: 1,
            });

        } else {

            $relatedNews.bxSlider({
                auto: true,
                pager: true,
                controls: false,
                minSlides: 2,
                maxSlides: 6,
                slideWidth: 371,
                slideMargin: 30,
                moveSlides: 2,
            });

            $featProp.bxSlider({
                auto: true,
                pager: true,
                controls: false,
                minSlides: 3,
                maxSlides: 6,
                slideWidth: 372,
                slideMargin: 30,
                moveSlides: 2
            });

            $newestProp.bxSlider({
                auto: true,
                pager: false,
                controls: true,
                minSlides: 3,
                maxSlides: 6,
                slideWidth: 300,
                slideMargin: 15,
                moveSlides: 1
            });

            $newProp.bxSlider({
                auto: true,
                pager: false,
                controls: true,
                minSlides: 2,
                maxSlides: 10,
                slideWidth: 370,
                slideMargin: 20,
                moveSlides: 2
            });

            $testi1.bxSlider({
                auto: true,
                pager: false,
                minSlides: 2,
                maxSlides: 4,
                slideWidth: 570,
                slideMargin: 30,
                moveSlides: 1

            });

            $otherProp.bxSlider({
                auto: true,
                pager: true,
                controls: false,
                minSlides: 2,
                maxSlides: 6,
                slideWidth: 371,
                slideMargin: 30,
                moveSlides: 2
            });
        }
    }

    var $banner = $('.banner-slider');
    $banner.bxSlider({
        auto: true,
        mode: 'fade',
        controls: false,
        pager: false,
    });

    var $banner1 = $('.banner-slider-1');
    $banner1.bxSlider({
        auto: true,
        pager: false,
    });

    var $testi = $('.testimonials-slider');
    $testi.bxSlider({
        auto: true,
        pager: false,

    });

    var $testi2 = $('.testimonials-slider-2');
    $testi2.bxSlider({
        auto: true,
        pager: true,
        controls: false
    });

    var width = $win.width();
    relatedNewsSlider(width);

    $win.on('resize', function() {
        var width = $win.width();
        relatedNewsSlider(width);
    });

    var $propBannerSlider = $('.property-banner-slider');
    $propBannerSlider.bxSlider({
        auto: true,
        pager: false,
        mode: 'fade',

    });

    if ($('.bxslider img').length > 0) {

        var $galThumbs = $('#gallery-thumbs');

        // Cache the thumb selector for speed
        var thumb = $galThumbs.find('.thumb');

        // How many thumbs do you want to show & scroll by
        var visibleThumbs = 8;

        // Put slider into variable to use public functions
        var gallerySlider = $('.bxslider').bxSlider({
            controls: false,
            pager: false,
            easing: 'easeInOutQuint',
            infiniteLoop: false,
            speed: 500,
            nextText: '&gt;',
            prevText: '&lt;',
            auto: true,

            onSlideAfter: function($slideElement, oldIndex, newIndex) {
                thumb.removeClass('pager-active');
                thumb.eq(newIndex).addClass('pager-active');

                // Action next carousel slide on one before the end, so newIndex + 1
                slideThumbs(newIndex + 1, visibleThumbs);
            }
        });

        // When clicking a thumb
        thumb.on('click', function(e) {

            // -6 as BX slider clones a bunch of elements
            gallerySlider.goToSlide($(this).closest('.thumb-item').index());

            // Prevent default click behaviour
            e.preventDefault();
        });

        // Function to calculate which slide to move the thumbs to
        function slideThumbs(currentSlideNumber, visibleThumbs) {

            // Calculate the first number and ignore the remainder
            var m = Math.floor(currentSlideNumber / visibleThumbs);

            // Multiply by the number of visible slides to calculate the exact slide we need to move to
            var slideTo = m;

            // Tell the slider to move
            thumbsSlider.goToSlide(slideTo);
        }

        // When you click on a thumb
        $galThumbs.find('.thumb').click(function() {

            // Remove the active class from all thumbs
            $galThumbs.find('.thumb').removeClass('pager-active');

            // Add the active class to the clicked thumb
            $(this).addClass('pager-active');

        });

        // Thumbnail slider
        var thumbsSlider = $galThumbs.bxSlider({
            controls: true,
            pager: false,
            easing: 'easeInOutQuint',
            infiniteLoop: false,
            slideWidth: 120,
            minSlides: visibleThumbs,
            maxSlides: visibleThumbs,
            slideMargin: 10
        });

    }

    var c, currentScrollTop = 0,
        header = $('header.scroll');

    $win.on('scroll', function () {
        var a = $win.scrollTop();
        var b = header.height();

        currentScrollTop = a;

        if (c < currentScrollTop && a > b + b) {
            header.removeClass('nav-down').addClass('nav-up', 200);
        }
        else if (c > currentScrollTop && !(a <= b)) {
            header.removeClass('nav-up').addClass('nav-down', 200);
        }
        else if(c = currentScrollTop){
            header.removeClass('nav-down')
        }
        c = currentScrollTop;
    });

    var $range = $('#range');
    $range.ionRangeSlider({
        hide_min_max: true,
        keyboard: true,
        min: 0,
        max: 100000,
        from: 500,
        to: 10000,
        type: 'double',
        step: 1,
        prefix: "$",
        grid: false
    });

    // Smooth scroll on click
    $doc.on('click', '.sub-menu-wrapper .sub-menu a[href^="#"]', function(event) {
        event.preventDefault();

        $hBody.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 2000);
    });

    var $sideNav = $('.sidenav');
    $sideNav.slimscroll({
        allowPageScroll: true,
        wheelStep: 10
    });

    var $openBtn = $('.open-btn');
    $openBtn.on('click', function() {
        $('.sidenav').addClass('open')
    });

    var $closeBtn = $('.closebtn');
    $closeBtn.on('click', function() {
        $('.sidenav').removeClass('open')
    });

    var $forgotPassLink = $('.forget-pass'),
        $newAccountLink = $('.new-account'),
        $loginLink = $('.log'),
        $fpBox = $('.forgot-password'),
        $loginBox = $('.login-wrapper'),
        $accountBox = $('.create-new-account');


    $forgotPassLink.on('click', function() {
        
        $fbBox.removeClass('hide');
        $loginBox.addClass('hide');
    });

    $newAccountLink.on('click', function() {
        $accountBox.removeClass('hide');
        $loginBox.addClass('hide');
    });

    $loginLink.on('click', function() {
        $loginBox.removeClass('hide');
        $accountBox.addClass('hide');
        $fpBox.addClass('hide');
    });

    // tabbed content
    var $tabContent = $('.tab_content'),
        $tabHeading = $('.tab_drawer_heading'),
        $tabLi = $('ul.tabs li');

    $tabContent.hide();
    $(".tab_content:first").show();

    /* if in tab mode */
    $tabLi.on('click', function() {

        $tabContent.hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();

        $tabLi.removeClass("active");
        $(this).addClass("active");

        $tabHeading.removeClass("d_active");
        $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
    });

    /* if in drawer mode */
    $tabHeading.on('click', function() {

        $tabContent.hide();
        var d_activeTab = $(this).attr("rel");
        $("#" + d_activeTab).fadeIn();

        $tabHeading.removeClass("d_active");
        $(this).addClass("d_active");

        $tabLi.removeClass("active");
        $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
    });


    /* Extra class "tab_last" 
       to add border to right side
       of last tab */
    $tabLi.last().addClass("tab_last");


    var $counter = $('.counter');
    $counter.counterUp({
        delay: 10,
        time: 1000
    });

})(jQuery);
;(function () {

    'use strict';


    // iPad and iPod detection
    var isiPad = function () {
        return (navigator.platform.indexOf("iPad") != -1);
    };

    var isiPhone = function () {
        return (
            (navigator.platform.indexOf("iPhone") != -1) ||
            (navigator.platform.indexOf("iPod") != -1)
        );
    };


    var fullHeight = function () {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function () {
            $('.js-fullheight').css('height', $(window).height());
        });

    };

    var burgerMenu = function () {

        $('.js-fh5co-nav-toggle').on('click', function (event) {
            event.preventDefault();
            var $this = $(this);
            if ($('body').hasClass('menu-show')) {
                $('body').removeClass('menu-show');
                $('#fh5co-main-nav > .js-fh5co-nav-toggle').removeClass('show');
            } else {
                $('body').addClass('menu-show');
                setTimeout(function () {
                    $('#fh5co-main-nav > .js-fh5co-nav-toggle').addClass('show');
                }, 900);
            }
        })
    };

    // Animations

    var contentWayPoint = function () {
        var i = 0;
        $('.animate-box').waypoint(function (direction) {

            if (direction === 'down' && !$(this.element).hasClass('animated')) {

                i++;

                $(this.element).addClass('item-animate');
                setTimeout(function () {

                    $('body .animate-box.item-animate').each(function (k) {
                        var el = $(this);
                        setTimeout(function () {
                            var effect = el.data('animate-effect');
                            if (effect === 'fadeIn') {
                                el.addClass('fadeIn animated');
                            } else {
                                el.addClass('fadeInUp animated');
                            }

                            el.removeClass('item-animate');
                        }, k * 200, 'easeInOutExpo');
                    });

                }, 100);

            }

        }, {offset: '85%'});
    };

    var counter = function () {
        $('.js-counter').countTo({
            formatter: function (value, options) {
                return value.toFixed(options.decimals);
            }
        });
    };

    var counterWayPoint = function () {
        if ($('#counter-animate').length > 0) {
            $('#counter-animate').waypoint(function (direction) {

                if (direction === 'down' && !$(this.element).hasClass('animated')) {
                    setTimeout(counter, 400);
                    $(this.element).addClass('animated');

                }
            }, {offset: '90%'});
        }
    };


    var imgPopup = function () {


        $('body').on('click', '.img-popup', function (event) {
            event.preventDefault();
            var src = $(this).attr('href');
            var link = $(this).attr('data-link');
            var link_app = $(this).attr('data-link-app');

            var html = '';
            html += '<div class="mfp-figure"><button title="Close (Esc)" type="button" class="mfp-close">×</button><figure>';
            html += '<img class="mfp-img" src=' + src + ' data-link=' + link + ' data-link-app=' + link_app + ' style="max-height: 576px;"><figcaption>';
            html += '<div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>';

            $.magnificPopup.open({
                items: {
                    src: html,
                    type: 'inline'
                },
                type: 'image'
            });

        });

        $('body').on('click', '.mfp-img', function (event) {
            if (/Mobi/.test(navigator.userAgent)) {
                // mobile!
                var url = $(this).attr('data-link-app');
            }
            else {
                var url = $(this).attr('data-link');
            }

            openInNewTab(url);
        });
    };

    var openInNewTab = function (url) {
        var win = window.open(url, '_blank');
        win.focus();
    }


    // Document on load.
    $(function () {
        fullHeight();
        burgerMenu();
        counter();
        contentWayPoint();
        counterWayPoint();
        imgPopup();
    });


}());
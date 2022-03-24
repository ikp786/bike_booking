(function($) {
    'use strict';


    $('.login-form-b').on('click', function() {
        $('.lofin-form-box').addClass('active');
        $('body').css('overflow', 'hidden');
    });
    $('.welcome-modal').on('click', function() {
        $('.lofin-form-box1').addClass('active');
        $('body').css('overflow', 'hidden');
    });
    $('.otp-verify').on('click', function() {
        $('.otp-verify-form-box').addClass('active');
        $('body').css('overflow', 'hidden');
    });

    $('.remove-cl-but').on('click', function() {
        $('.lofin-form-box').removeClass('active');
        $('.lofin-form-box1').removeClass('active');
        $('.otp-verify-form-box').removeClass('active');
        $('body').css('overflow', 'auto');
    });

    $(window).on('scroll', function() {
        var scrolled = $(window).scrollTop();
        if (scrolled > 300) $('.go-top').addClass('active');
        if (scrolled < 300) $('.go-top').removeClass('active');
    });
    $(document).ready(function() {
        var s = $(".sticker");
        var pos = s.position();
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos.top & windowpos <= 1000000) {
                s.addClass("stick");
            } else {
                s.removeClass("stick");
            }
        });
    });
    // Nice Select JS
    $('select').niceSelect();

    // // Date Picker
    // $('#datetimepicker').datepicker({
    //     weekStart: 0,
    //     todayBtn: "linked",
    //     language: "es",
    //     orientation: "bottom auto",
    //     keyboardNavigation: false,
    //     autoclose: true
    // });

    // // Date Picker 2
    // $('#datetimepicker2').datepicker({
    //     weekStart: 0,
    //     todayBtn: "linked",
    //     language: "es",
    //     orientation: "bottom auto",
    //     keyboardNavigation: false,
    //     autoclose: true
    // });

    $('.toolbar-btn').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var $this = $(this);
        var target = $this.attr('href');
        var prevTarget = $this.parent().siblings().children('.toolbar-btn').attr('href');
        $(target).toggleClass('open');
        $(prevTarget).removeClass('open');
    });

    /**********************
     *Close Button Actions
     ***********************/

    $('.btn-close').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        $this.parents('.open').removeClass('open');
    });

    var $offcanvasNav = $('.offcanvas-minicart_menu, .mobile-menu'),
        $offcanvasNavWrap = $(
            '.mobile-menu_wrapper'
        ),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu'),
        $menuToggle = $('.menu-btn'),
        $menuClose = $('.btn-close');

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fa fa-angle-down" aria-hidden="true"></i></span>');

    /*Close Off Canvas Sub Menu*/
    $offcanvasNavSubMenu.slideUp();

    /*Category Sub Menu Toggle*/
    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if (
            $this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/) &&
            ($this.attr('href') === '#' || $this.attr('href') === '' || $this.hasClass('menu-expand'))
        ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.siblings('ul').slideUp('slow');
            } else {
                $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
                $this.closest('li').siblings('li').removeClass('menu-open');
                $this.siblings('ul').slideDown('slow');
                $this.parent().siblings().children('ul').slideUp();
            }
        }
        if ($this.is('a') || $this.is('span') || $this.attr('class').match(/\b(menu-expand)\b/)) {
            $this.parent().toggleClass('menu-open');
        } else if ($this.is('li') && $this.attr('class').match(/\b('menu-item-has-children')\b/)) {
            $this.toggleClass('menu-open');
        }
    });


    $('.btn-close').on('click', function(e) {
            e.preventDefault();
            $('.mobile-menu .sub-menu').slideUp();
            $('.mobile-menu .menu-item-has-children').removeClass('menu-open');
        })
        /*----------------------------------------*/
        /*  Category Menu
        /*----------------------------------------*/
    $('.rx-parent').on('click', function() {
        $('.rx-child').slideToggle();
        $(this).toggleClass('rx-change');
    });
    //    category heading
    $('.category-heading').on('click', function() {
        $('.category-menu-list').slideToggle(900);
        $('.cat-mega-menu, .right-menu > ul').slideUp();
        $('.menu-expand').removeClass('active');
    });
    /*-- Category Menu Toggles --*/
    function categorySubMenuToggle() {
        var screenSize = $(window).width();
        if (screenSize <= 991) {
            $('#cate-toggle .right-menu > a').prepend('<i class="expand menu-expand"></i>');
            $('.category-menu .right-menu ul').slideUp();
        } else {
            $('.category-menu .right-menu > a i').remove();
            $('.category-menu .right-menu ul').slideDown();
        }
    }
    categorySubMenuToggle();
    $(window).resize(categorySubMenuToggle);
    /*-- Category Sub Menu --*/
    function categoryMenuHide() {
        var screenSize = $(window).width();
        if (screenSize <= 991) {
            $('.category-menu-list').hide();
        } else {
            $('.category-menu-list').show();
        }
    }
    categoryMenuHide();
    $(window).resize(categoryMenuHide);
    $('.category-menu-hidden').find('.category-menu-list').hide();
    $('.category-menu-list').on('click', 'li a, li a .menu-expand', function(e) {
        var $a = $(this).hasClass('menu-expand') ? $(this).parent() : $(this);
        $(this).toggleClass('active');
        $(this).children('.menu-expand').toggleClass('active');
        if ($a.parent().hasClass('right-menu')) {
            if ($a.attr('href') === '#' || $(this).hasClass('menu-expand')) {
                if ($a.siblings('ul:visible').length > 0) $a.siblings('ul').slideUp();
                else {
                    $(this).parents('li').siblings('li').find('ul:visible').slideUp();
                    $a.siblings('ul').slideDown();
                }
            }
        }
        if ($(this).hasClass('menu-expand') || $a.attr('href') === '#') {
            e.preventDefault();
            return false;
        }
    });
    // $('.open-btn').on('click', function() {
    //     alert(';dasf;l');
    //     $(this).addClass('close-btn');
    //     $(this).removeClass('open-btn');
    //     // $('.url-box').fadeIn();
    // });

    $('.slider-main').owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        dots: true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,

    });
    $('.benefits-slider-a').owlCarousel({
        loop: true,
        // autoplay: true,
        center: true,
        nav: true,
        margin: 20,
        dots: false,
        slideSpeed: 600,
        autoplayHoverPause: true,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 3,
            },
            1200: {
                items: 4,
            },

        }
    });
    $('.testimonial-slider').owlCarousel({
        loop: true,
        autoplay: true,
        nav: true,
        margin: 36,
        dots: false,
        center: true,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
                dots: true,
                nav: false,


            },
            576: {
                items: 2,
                dots: true,
                nav: false,


            },
            768: {
                items: 2,

            },
            1200: {
                items: 3,
            },

        }
    });

    $('.slider-vedio').owlCarousel({
        loop: true,
        autoplay: true,
        nav: true,
        margin: 36,
        dots: false,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 2,

            },
            1200: {
                items: 3,
            },

        }
    });


    $('.mock-test').owlCarousel({
        loop: true,
        autoplay: true,
        nav: true,
        margin: 30,
        dots: false,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
                margin: 10,

            },
            460: {
                items: 2,
                margin: 10,

            },
            576: {
                items: 2,
            },
            768: {
                items: 3,

            },
            1200: {
                items: 5,
            },
            1600: {
                items: 6,
            },

        }
    });


    $('.test-details-1').owlCarousel({
        loop: true,
        autoplay: true,
        nav: true,
        margin: 30,
        dots: false,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
                margin: 10,

            },
            460: {
                items: 2,
                margin: 10,

            },
            576: {
                items: 2,
            },
            768: {
                items: 3,

            },
            1200: {
                items: 4,
            },
            1600: {
                items: 5,
            },

        }
    });


    $('.image-slider').owlCarousel({
        loop: true,
        autoplay: true,
        nav: true,
        margin: 30,
        dots: false,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
            },
            411: {
                items: 2,
            },
            576: {
                items: 2,
            },
            768: {
                items: 4,

            },
            1200: {
                items: 5,
            },
            1600: {
                items: 5,
            },

        }
    });
    $('.test-details-3').owlCarousel({
        loop: true,
        autoplay: true,
        nav: true,
        margin: 30,
        dots: false,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
            },
            757: {
                items: 2,
            },
            1200: {
                items: 2,
            },
            1600: {
                items: 3,
            },

        }
    });



    // Click JS
    $('.go-top').on('click', function() {
        $("html, body").animate({ scrollTop: "0" }, 500);
    });

    // FAQ Accordion JS
    $('.accordion').find('.accordion-title').on('click', function() {
        // Adds Active Class
        $(this).toggleClass('active');
        // Expand or Collapse This Panel
        $(this).next().slideToggle('fast');
        // Hide The Other Panels
        $('.accordion-content').not($(this).next()).slideUp('fast');
        // Removes Active Class From Other Titles
        $('.accordion-title').not($(this)).removeClass('active');
    });

    // Count Time JS
    function makeTimer() {
        var endTime = new Date("november  30, 2020 17:00:00 PDT");
        var endTime = (Date.parse(endTime)) / 1000;
        var now = new Date();
        var now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }
        $("#days").html(days + "<span>Days</span>");
        $("#hours").html(hours + "<span>Hours</span>");
        $("#minutes").html(minutes + "<span>Minutes</span>");
        $("#seconds").html(seconds + "<span>Seconds</span>");
    }
    setInterval(function() { makeTimer(); }, 300);

    // Tabs JS
    $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
    $('.tab ul.tabs li').on('click', function(g) {
        var tab = $(this).closest('.tab'),
            index = $(this).closest('li').index();
        tab.find('ul.tabs > li').removeClass('current');
        $(this).closest('li').addClass('current');
        tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
        tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
        g.preventDefault();
    });

    // Input Plus & Minus Number JS
    $('.input-counter').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="text"]'),
            btnUp = spinner.find('.plus-btn'),
            btnDown = spinner.find('.minus-btn'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
        btnDown.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });

    // Others Option For Responsive JS
    $(".others-option-for-responsive .dot-menu").on("click", function() {
        $(".others-option-for-responsive .container .container, .dot-menu").toggleClass("active");
    });

    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    // Preloader
    jQuery(window).on('load', function() {
        $('.preloader').addClass('preloader-deactivate');
    })

    // Product View Slider JS
    var bigimage = $("#big");
    var thumbs = $("#thumbs");
    // Var Totalslides = 10;
    var syncedSecondary = true;

    bigimage
        .owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: [
                "<i class='bx bx-left-arrow-alt'></i>",
                "<i class='bx bx-right-arrow-alt'></i>",
            ]
        })
        .on("changed.owl.carousel", syncPosition);

    thumbs
        .on("initialized.owl.carousel", function() {
            thumbs
                .find(".owl-item")
                .eq(0)
                .addClass("current");
        })
        .owlCarousel({
            items: 5,
            dots: false,
            nav: false,
            navText: [
                "<i class='bx bx-left-arrow-alt'></i>",
                "<i class='bx bx-right-arrow-alt'></i>",
            ],
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: 4,
            responsiveRefreshRate: 100
        })
        .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
        //if loop is set to false, then you have to uncomment the next line
        //var current = el.item.index;

        //to disable loop, comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        //to this
        thumbs
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = thumbs.find(".owl-item.active").length - 1;
        var start = thumbs
            .find(".owl-item.active")
            .first()
            .index();
        var end = thumbs
            .find(".owl-item.active")
            .last()
            .index();

        if (current > end) {
            thumbs.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
            thumbs.data("owl.carousel").to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            bigimage.data("owl.carousel").to(number, 100, true);
        }
    }
    thumbs.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        bigimage.data("owl.carousel").to(number, 300, true);
    });


})(jQuery);
$(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
        $('.stick').addClass('newClass');
    } else {
        $('.stick').removeClass('newClass');
    }
});

$(document).on('keyup', '.inpu-control', function() {
    var ida = $(this).val();
    if (ida != '') {
        $(this).addClass('active');
    } else {

        $(this).removeClass('active');
    }
});
$(document).on('click', '.on-chang-in', function() {
    var ida = $(this).attr('idd');
    $('.' + ida).addClass('active');
    var idb = $(this).attr('ida');
    $('.' + idb).removeClass('active');

});
$(document).on('click', '.on-chang-out', function() {
    var idc = $(this).attr('ida');
    $('.' + idc).removeClass('active');

});
document.querySelector(".number-f").addEventListener("keypress", function(evt) {
    if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
        evt.preventDefault();
    }
});
/***********************about page***************************/
/*client slider*/
$(document).ready(function() {
    $('.single-item').not('.slick-initialized').slick({
        draggable: false,
        fade: true,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
    });
    $('.center-item').not('.slick-initialized').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        draggable: false,
        autoplaySpeed: 4000,
        asNavFor: '.single-item',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerPadding: '40px',
                    draggable: true,
                    slidesToShow: 1
                }
            },
        ]
    });
});


/*industry we serve slider*/
$('.our_team').not('.slick-initialized').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                 slidesToShow: 2,
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 375,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

/*companies slider*/
$('.companies').not('.slick-initialized').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    centerMode: true,
    arrows: false,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                 slidesToShow: 3,
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 375,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

/*counter*/
$('.counter-count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
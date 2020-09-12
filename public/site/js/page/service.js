/**************************service page********************************/
$('#service-lazy').not('.slick-initialized').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                arrows: false,
                 slidesToShow: 2,
            }
        },
        {
            breakpoint: 769,
            settings: {
                arrows: false,
                slidesToShow: 2,
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
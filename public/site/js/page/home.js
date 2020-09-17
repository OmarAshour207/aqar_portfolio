/*portfolio slider*/
$('.portfolio').not('.slick-initialized').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false
});
$("#nextProject").click(function(){
    $(".portfolio").slick("slickNext");
});
$("#prevProject").click(function(){
    $(".portfolio").slick("slickPrev");
});


/*technologies*/
$(".tech-icon").click(function(){
    $(".tech-icon").removeClass("active");
    $(this).addClass("active");
    var x = $(this).attr("data-id");
    $('.tech-detail').addClass('d-none');
    $('.tech-detail#' + x).removeClass('d-none');
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

/*typewrite*/
var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
}

    setTimeout(function() {
        that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};


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
$('.our_service').not('.slick-initialized').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
 
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
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 576,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 375,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }
    ]
});


/*our project slider*/
$('#industry_serve').not('.slick-initialized').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
//     rtl: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                arrows: false,
                 slidesToShow: 3,
            }
        },
        {
            breakpoint: 769,
            settings: {
                arrows: false,
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 576,
            settings: {
                arrows: false,
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

$('#industry_serve2').not('.slick-initialized').slick({
    
    slidesToShow: 6,
    slidesToScroll: 1,
//    autoplay: true,
    autoplaySpeed: 2000,
      arrows: false,
//      vertical: true,
//     rtl: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                arrows: false,
                 slidesToShow: 3,
            }
        },
        {
            breakpoint: 769,
            settings: {
                arrows: false,
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 576,
            settings: {
                arrows: false,
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

$('#industry_serve3').not('.slick').slick({
    
    slidesToShow: 1,
    slidesToScroll: 1,
   
    autoplaySpeed: 2000,
      arrows: true,
      vertical: true,
//     rtl: true
    dots:true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                arrows: false,
                 slidesToShow: 1,
            }
        },
        {
            breakpoint: 769,
            settings: {
                arrows: false,
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 576,
            settings: {
                arrows: false,
                slidesToShow: 1
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

$('#industry_serve4').not('.slick').slick({
    
 
  lazyLoad: 'ondemand',
    slidesToShow: 3,
    slidesToScroll: 1,
//    autoplay: true,
    autoplaySpeed: 2000,
     arrows: false,
//     rtl: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                arrows: false,
                 slidesToShow: 3,
            }
        },
        {
            breakpoint: 769,
            settings: {
                arrows: false,
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 576,
            settings: {
                arrows: false,
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


/*home page*/
/*menu*/
$(".menu-open").click(function(){
    $("body").addClass("menu-opened");
    $(".menu").addClass("menu-show");
});
$(".menu-close").click(function(){
    $("body").removeClass("menu-opened");
    $(".menu-show").removeClass("menu-show");
});

/*AOS*/
AOS.init();

/*fixed menu*/
$(window).scroll(function(){
    if ($(window).scrollTop() >= 300) {
        $('.nav-container').addClass('fixed-top');
        $('body').css('padding-top','80px');
    }
    else {
        $('.nav-container').removeClass('fixed-top');
        $('body').css('padding-top','0px');
    }
});

/*pre loader*/
$(window).on('load', function() {
    $('.preloader').fadeOut();
});



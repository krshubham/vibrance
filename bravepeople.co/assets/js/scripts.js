jQuery(document).ready(function ($) {

    var links = $('.navigation').find('li');
    slide = $('.slide');
    mywindow = $(window);
    htmlbody = $('html,body');

    mywindow.scroll(function () {
        if (mywindow.scrollTop() == 0) {
            $('.navigation li[data-slide="1"]').addClass('active');
            $('.navigation li[data-slide="2"]').removeClass('active');
        }
    });

    function goToByScroll(dataslide) {
        htmlbody.animate({
            scrollTop: $('.slide[data-slide="' + dataslide + '"]').offset().top - $('.menu').height()
        }, 1000, 'easeInOutQuint');
    }

    links.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
    });

    $('.slide-link').click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
    });

});

function overlayLoader() {
    $("#home-overlay").removeClass('active');
}

$( document ).ready(function() {
    setTimeout(overlayLoader, 2000)
    $("#overlay").delay(500).fadeOut('500');
});

$(window).load(function() {
    $("#pre-overlay").delay(500).fadeOut('500');
});


/* STELLAR */

function parallax() {

    var windowWidth = $(window).width();

    if ( windowWidth >= 1024 ) {
        $.stellar({
            horizontalScrolling: false,
            verticalScrolling: true,
            responsive: true,
            scrollProperty: 'scroll',
            positionProperty: 'position',
            parallaxBackgrounds: true,
            parallaxElements: true,
            hideDistantElements: false,
        });
    }

}
$(window).load(function() {
	parallax();
});
$(window).resize(function() {
	parallax();
});

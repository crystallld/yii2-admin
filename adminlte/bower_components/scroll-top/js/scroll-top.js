$(function(){

    var btnScroller = $('#btn-top-scroller');
    var scrollerTriggerPoint = $('html, body').offset().top + 150;

    $(document).on('scroll', function() {
        var pos = $(window).scrollTop();
        if (pos > scrollerTriggerPoint && !btnScroller.is(':visible')) {
            btnScroller.fadeIn();
        } else if (pos < scrollerTriggerPoint && btnScroller.is(':visible')) {
            btnScroller.fadeOut();
        }
    }).scroll();

    btnScroller.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 300);
    });

});
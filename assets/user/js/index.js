$(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
        $('.sticker').addClass('newClass');
    } else {
        $('.sticker').removeClass('newClass');
    }
});
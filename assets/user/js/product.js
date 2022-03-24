$(document).on('change', '.dexktop-control', function() {
    var idd = $(this).attr('idd');
    var id = $(this).attr('id');
    if (id == '') {
        $('.' + idd).removeClass('active');
    } else {
        $('.' + idd).addClass('active');
    }
});
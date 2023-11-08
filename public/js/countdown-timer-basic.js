jQuery(function ($) {
    var a;
    jQuery(".div_countdown_timer").each(function () {
        var element = $(this);
        var finalDate = element.data('final-date');
        var drop = parseInt(element.data('drop'));
        var color = element.data('color');
        var bgcolor = element.data('bgcolor');

        clock(element, finalDate, drop, color, bgcolor);

        a = setInterval(() => clock(element, finalDate, drop, color, bgcolor), drop);
    });
    function clock(element, date, drop, color, bgcolor) {

        var finalDate = new Date(date).getTime();
        var current = new Date().getTime();
        var difference = finalDate - current;

        if (difference < 0) {
            clearInterval(a);
            element.hide();
        } else {
            var day = Math.floor(difference / (1000 * 60 * 60 * 24));
            var hrs = Math.floor(difference % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            var min = Math.floor(difference % (1000 * 60 * 60) / (1000 * 60));
            var sec = Math.floor(difference % (1000 * 60) / 1000);

            if (drop == 86400000) {
                display = countdown_obj_basic.sale + day + countdown_obj_basic.days;
            }
            else if (drop == 3600000) {
                display = countdown_obj_basic.sale + day + countdown_obj_basic.days + hrs + countdown_obj_basic.hrs;
            }
            else if (drop == 60000) {
                display = countdown_obj_basic.sale + day + countdown_obj_basic.days + hrs + countdown_obj_basic.hrs + min + countdown_obj_basic.mins;
            } else {
                display = countdown_obj_basic.sale + day + countdown_obj_basic.days + hrs + countdown_obj_basic.hrs + min + countdown_obj_basic.mins + sec + countdown_obj_basic.secs;
            }
            element.css({
                color: color,
                background: bgcolor
            });
            element.html(display);
        }
    }
});

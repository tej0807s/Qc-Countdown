/**
* Functions to show countdown timer(just number)
*/

jQuery(function ($) {
    var a;
    jQuery(".span_day").each(function () {
        var element = $(this);
        var finalDate = element.data('final-date');
        var drop = parseInt(element.data('drop'));

        clock(element, finalDate, drop);

        a = setInterval(() => clock(element, finalDate, drop), drop);
    });
    function clock(element, date, drop) {

        var finalDate = new Date(date).getTime();
        var current = new Date().getTime();
        var difference = finalDate - current;

        if (difference < 0) {
            clearInterval(a);
            element.hide();
        } else {
            var day = Math.floor(difference / (1000 * 60 * 60 * 24));
            display_day = day; // To show for all drop options
            element.html(display_day);
        }
    }
});
jQuery(function ($) {
    var b;
    jQuery(".span_hrs").each(function () {
        var element = $(this);
        var finalDate = element.data('final-date');
        var drop = parseInt(element.data('drop'));

        clock(element, finalDate, drop);

        b = setInterval(() => clock(element, finalDate, drop), drop);
    });
    function clock(element, date, drop) {

        var finalDate = new Date(date).getTime();
        var current = new Date().getTime();
        var difference = finalDate - current;

        if (difference < 0) {
            clearInterval(b);
            element.hide();
        } else {
            var hrs = Math.floor(difference % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            if (drop == 3600000 || drop == 60000 || drop == 1000) {
                display_hrs = hrs; // To show for drops 1sec, 1min or 1hr
            }
            element.html(display_hrs);
        }
    }
});
jQuery(function ($) {
    var c;
    jQuery(".span_min").each(function () {
        var element = $(this);
        var finalDate = element.data('final-date');
        var drop = parseInt(element.data('drop'));

        clock(element, finalDate, drop);

        c = setInterval(() => clock(element, finalDate, drop), drop);
    });
    function clock(element, date, drop) {

        var finalDate = new Date(date).getTime();
        var current = new Date().getTime();
        var difference = finalDate - current;

        if (difference < 0) {
            clearInterval(c);
            element.hide();
        } else {
            var min = Math.floor(difference % (1000 * 60 * 60) / (1000 * 60));
            if (drop == 60000 || drop == 1000) {
                display_min = min; // To show for drops 1sec or 1min
            }
            element.html(display_min);
        }
    }
});
jQuery(function ($) {
    var d;
    jQuery(".span_sec").each(function () {
        var element = $(this);
        var finalDate = element.data('final-date');
        var drop = parseInt(element.data('drop'));

        clock(element, finalDate, drop);

        d = setInterval(() => clock(element, finalDate, drop), drop);
    });
    function clock(element, date, drop) {

        var finalDate = new Date(date).getTime();
        var current = new Date().getTime();
        var difference = finalDate - current;

        if (difference < 0) {
            clearInterval(d);
            element.hide();
        } else {
            var sec = Math.floor(difference % (1000 * 60) / 1000);
            if (drop == 1000) {
                display_sec = sec; // To show for drop 1sec only
            }
            element.html(display_sec);
        }
    }
});

/**
 * Functions to show countdown timer labels(days,mins etc)
*/

jQuery(function ($) {
    var e;
    jQuery(".timer_day_text").each(function () {
        var element = $(this);
        var finalDate = element.data('final-date');
        var drop = parseInt(element.data('drop'));

        clock(element, finalDate, drop);

        e = setInterval(() => clock(element, finalDate, drop), drop);
    });
    function clock(element, date, drop) {

        var finalDate = new Date(date).getTime();
        var current = new Date().getTime();
        var difference = finalDate - current;

        if (difference < 0) {
            clearInterval(e);
            element.hide();
        } else {
            display_day_txt = "DAYS"; // To show in for all drop options
            element.html(display_day_txt);
        }
    }
});

jQuery(function ($) {
    var f;
    jQuery(".timer_hrs_text").each(function () {
        var element = $(this);
        var finalDate = element.data('final-date');
        var drop = parseInt(element.data('drop'));

        clock(element, finalDate, drop);

        f = setInterval(() => clock(element, finalDate, drop), drop);
    });
    function clock(element, date, drop) {

        var finalDate = new Date(date).getTime();
        var current = new Date().getTime();
        var difference = finalDate - current;

        if (difference < 0) {
            clearInterval(f);
            element.hide();
        } else if (drop == 3600000 || drop == 60000 || drop == 1000) {
            display_hrs_txt = "HOURS"; // To show for drops 1sec, 1min or 1hr
            element.html(display_hrs_txt);
        }
    }
});

jQuery(function ($) {
    var g;
    jQuery(".timer_min_text").each(function () {
        var element = $(this);
        var finalDate = element.data('final-date');
        var drop = parseInt(element.data('drop'));

        clock(element, finalDate, drop);

        g = setInterval(() => clock(element, finalDate, drop), drop);
    });
    function clock(element, date, drop) {

        var finalDate = new Date(date).getTime();
        var current = new Date().getTime();
        var difference = finalDate - current;

        if (difference < 0) {
            clearInterval(g);
            element.hide();
        } else if (drop == 60000 || drop == 1000) {
            display_min_text = "MINUTES"; // To show for drops 1sec or 1min
            element.html(display_min_text);
        }
    }
});

jQuery(function ($) {
    var h;
    jQuery(".timer_sec_text").each(function () {
        var element = $(this);
        var finalDate = element.data('final-date');
        var drop = parseInt(element.data('drop'));

        clock(element, finalDate, drop);

        h = setInterval(() => clock(element, finalDate, drop), drop);
    });
    function clock(element, date, drop) {

        var finalDate = new Date(date).getTime();
        var current = new Date().getTime();
        var difference = finalDate - current;

        if (difference < 0) {
            clearInterval(h);
            element.hide();
        } else if (drop == 1000) {
            display_sec_text = "SECONDS"; // To show for drop 1sec only
            element.html(display_sec_text);
        }

    }
});

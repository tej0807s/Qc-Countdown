var currentTime = Math.floor(Date.now() / 1000);
var endTime = Math.floor(Date.parse(countdown_obj_modern.sale_end) / 1000);

$(document).ready(function () {
    $('.countdown').final_countdown({
        start: currentTime,
        end: endTime, //sale end time in unix
        now: currentTime,

        selectors: {
            value_seconds: '.clock-seconds .val',
            canvas_seconds: 'canvas_seconds',
            value_minutes: '.clock-minutes .val',
            canvas_minutes: 'canvas_minutes',
            value_hours: '.clock-hours .val',
            canvas_hours: 'canvas_hours',
            value_days: '.clock-days .val',
            canvas_days: 'canvas_days'
        },
        seconds: {
            borderColor: 'lightblue',
            borderWidth: '3'
        },
        minutes: {
            borderColor: 'lightgreen',
            borderWidth: '3'
        },
        hours: {
            borderColor: 'yellow',
            borderWidth: '3'
        },
        days: {
            borderColor: 'red',
            borderWidth: '3'
        }
    }, function () {
        // Finish callback
    });
});

/**
*  Function to show timer and timer label for custom drops(sec,min etc). 
*/
jQuery(document).ready(function ($) {

    $(".countdown_seconds").each(function () {

        var element = $(this);
        var drop = parseInt(element.data('drop'));
        if (drop != 1000) {
            element.remove();
        }
    });
    $(".countdown_minutes").each(function () {

        var element = $(this);
        var drop = parseInt(element.data('drop'));
        if (drop != 60000 && drop != 1000) {
            element.remove();
        }
    });
    $(".countdown_hours").each(function () {

        var element = $(this);
        var drop = parseInt(element.data('drop'));
        if (drop != 3600000 && drop != 60000 && drop != 1000) {
            element.remove();
        }
    });
});


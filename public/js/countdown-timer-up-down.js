var end_date = countdown_obj_updown.sale_end;
var targetDate = new Date(end_date);

var days;
var hrs;
var min;
var sec;

$(function () {
    timeToLaunch();

    numberTransition("#days .number", days, 1000, "easeOutQuad");
    numberTransition("#hours .number", hrs, 1000, "easeOutQuad");
    numberTransition("#minutes .number", min, 1000, "easeOutQuad");
    numberTransition("#seconds .number", sec, 1000, "easeOutQuad");

    setTimeout(countDownTimer, 1001);
});

function timeToLaunch() {
    var currentDate = new Date();

    var diff = (currentDate - targetDate) / 1000;
    var diff = Math.abs(Math.floor(diff));

    days = Math.floor(diff / (24 * 60 * 60));
    sec = diff - days * 24 * 60 * 60;

    hrs = Math.floor(sec / (60 * 60));
    sec = sec - hrs * 60 * 60;

    min = Math.floor(sec / 60);
    sec = sec - min * 60;
}

function countDownTimer() {
    timeToLaunch();

    $("#days .number").text(days);
    $("#hours .number").text(hrs);
    $("#minutes .number").text(min);
    $("#seconds .number").text(sec);

    setTimeout(countDownTimer, 1000);
}

function numberTransition(id, endPoint, transitionDuration, transitionEase) {
    $({
        numberCount: $(id).text()
    }).animate({
        numberCount: endPoint
    }, {
        duration: transitionDuration,
        easing: transitionEase,
        step: function () {
            $(id).text(Math.floor(this.numberCount));
        },
        complete: function () {
            $(id).text(this.numberCount);
        }
    });
}

/**
*  Function to show timer and timer label for custom drops(sec,min etc). 
*/
jQuery(document).ready(function ($) {

    $(".timer_seconds").each(function () {

        var element = $(this);
        var drop = parseInt(element.data('drop'));
        if (drop != 1000) {
            element.remove();
        }
    });
    $(".timer_minutes").each(function () {

        var element = $(this);
        var drop = parseInt(element.data('drop'));
        if (drop != 60000 && drop != 1000) {
            element.remove();
        }
    });
    $(".timer_hours").each(function () {

        var element = $(this);
        var drop = parseInt(element.data('drop'));
        if (drop != 3600000 && drop != 60000 && drop != 1000) {
            element.remove();
        }
    });
});

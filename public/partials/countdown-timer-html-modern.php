<html>

<head>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript"
        src="https://www.jqueryscript.net/demo/Modern-Circular-jQuery-Countdown-Timer-Plugin-Final-Countdown/js/kinetic.js">
    </script>
    <script type="text/javascript"
        src="https://www.jqueryscript.net/demo/Modern-Circular-jQuery-Countdown-Timer-Plugin-Final-Countdown/jquery.final-countdown.js">
    </script>
</head>
<table>
    <div class="modern_sale_title">Modern <b>Count</b>down</div>
    <div class="countdown_days" data-drop="<?php echo esc_attr($timer_data['drop']); ?>">
        <!-- days -->
        <div class="clock-item clock-days countdown-time-value col-sm-6 col-md-3">
            <div class="inner">
                <div id="canvas_days"></div>
                <div class="time_number">
                    <p class="val">0</p>
                    <p class="type-days time_name">Days</p>
                </div>
            </div>
        </div>
    </div>
    <!-- hours -->
    <div class="countdown_hours" data-drop="<?php echo esc_attr($timer_data['drop']); ?>">
        <div class="clock-item clock-hours countdown-time-value col-sm-6 col-md-3">
            <div class="inner">
                <div id="canvas_hours"></div>
                <div class="time_number">
                    <p class="val">0</p>
                    <p class="type-hours time_name">Hours</p>
                </div>
            </div>
        </div>
    </div>

    <!-- minutes -->
    <div class="countdown_minutes" data-drop="<?php echo esc_attr($timer_data['drop']); ?>">
        <div class="clock-item clock-minutes countdown-time-value col-sm-6 col-md-3">
            <div class="inner">
                <div id="canvas_minutes"></div>
                <div class="time_number">
                    <p class="val">0</p>
                    <p class="type-minutes time_name">Minutes</p>
                </div>
            </div>
        </div>
    </div>

    <!-- seconds -->
    <div class="countdown_seconds" data-drop="<?php echo esc_attr($timer_data['drop']); ?>">
        <div class="clock-item clock-seconds countdown-time-value col-sm-6 col-md-3">
            <div class="inner">
                <div id="canvas_seconds"></div>
                <div class="time_number">
                    <p class="val">0</p>
                    <p class="type-seconds time_name">Seconds</p>
                </div>
            </div>
        </div>
    </div>
</table>

</html>
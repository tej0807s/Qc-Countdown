<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<table>
    <div class="main_class">
        <div class="updown_sale_title">CountUp <b>& </b>Countdown</div>
        <ul id="countdown">
            <li id="days" class="timer_days" data-drop="<?php echo esc_attr($timer_data['drop']); ?>">
                <div class="number">00</div>
                <div class="label">Days</div>
            </li>
            <li id="hours" class="timer_hours" data-drop="<?php echo esc_attr($timer_data['drop']); ?>">
                <div class="number">00</div>
                <div class="label">Hrs</div>
            </li>
            <li id="minutes" class="timer_minutes" data-drop="<?php echo esc_attr($timer_data['drop']); ?>">
                <div class="number">00</div>
                <div class="label">Mins</div>
            </li>
            <li id="seconds" class="timer_seconds" data-drop="<?php echo esc_attr($timer_data['drop']); ?>">
                <div class="number">00</div>
                <div class="label">Sec</div>
            </li>
        </ul>
    </div>
</table>
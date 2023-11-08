<?php
/**
 * HTML for the Yellow-BG style Product Countdown Timer.
 *
 * This file defines the HTML structure for displaying the Yellow-BG Product Countdown Timer style.
 *
 * @link       https://quanticedgesolutions.com/
 * @since      1.0.0
 *
 * @package    QC-Countdown
 * @subpackage QC-Countdown/public/partials
 */
?>
<table>
    <div class="timer_body">
        <div class="countdown_timer_container">
            <div class="yellow_bg_sale_title">Black <b>& </b>Yellow</div>
            <ul>
                <li class="timer_list">
                    <span class="timer_span span_day" id="days" data-drop="<?php echo esc_attr($timer_data['drop']); ?>"
                        data-final-date="<?php echo esc_attr($timer_data['endsale']); ?>">
                    </span>
                    <span class="timer_day_text"></span>
                </li>
                <li class="timer_list">
                    <span class="timer_span span_hrs" id="hours"
                        data-drop="<?php echo esc_attr($timer_data['drop']); ?>"
                        data-final-date="<?php echo esc_attr($timer_data['endsale']); ?>">
                    </span>
                    <span class="timer_hrs_text" data-drop="<?php echo esc_attr($timer_data['drop']); ?>"
                        data-final-date="<?php echo esc_attr($timer_data['endsale']); ?>"></span>
                </li>
                <li class="timer_list">
                    <span class="timer_span span_min" id="minutes"
                        data-drop="<?php echo esc_attr($timer_data['drop']); ?>"
                        data-final-date="<?php echo esc_attr($timer_data['endsale']); ?>">
                    </span>
                    <span class="timer_min_text" data-drop="<?php echo esc_attr($timer_data['drop']); ?>"
                        data-final-date="<?php echo esc_attr($timer_data['endsale']); ?>"></span>
                </li>
                <li class="timer_list">
                    <span class="timer_span span_sec" id="seconds"
                        data-drop="<?php echo esc_attr($timer_data['drop']); ?>"
                        data-final-date="<?php echo esc_attr($timer_data['endsale']); ?>">
                    </span>
                    <span class="timer_sec_text" data-drop="<?php echo esc_attr($timer_data['drop']); ?>"
                        data-final-date="<?php echo esc_attr($timer_data['endsale']); ?>"></span>
                </li>
            </ul>

        </div>
    </div>
</table>
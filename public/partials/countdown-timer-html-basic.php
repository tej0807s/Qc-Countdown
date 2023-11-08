<?php
/**
 * HTML for the default 'Basic' style Product Countdown Timer.
 *
 * This file defines the HTML structure for displaying the 'Basic' Product Countdown Timer style.
 *
 * @link       https://quanticedgesolutions.com/
 * @since      1.0.0
 *
 * @package    QC-Countdown
 * @subpackage QC-Countdown/public/partials
 */
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    div.div_countdown_timer {
        color: <?php echo $color;
?>;
        background: <?php echo $bgcolor;
?>;
        border-radius: 8px;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.6);
        max-width: 550px;
        text-align: center;
        font-size: 20px;
    }
    </style>
</head>
<!--Creating data attributes to use in js -->
<table>
    <div class="div_countdown_timer" data-id="<?php echo esc_attr($timer_data['id']); ?>"
        data-drop="<?php echo esc_attr($timer_data['drop']); ?>"
        data-final-date="<?php echo esc_attr($timer_data['endsale']); ?>"
        data-color="<?php echo esc_attr($timer_data['color']); ?>"
        data-bgcolor="<?php echo esc_attr($timer_data['bgcolor']); ?>">
    </div>
</table>

</html>
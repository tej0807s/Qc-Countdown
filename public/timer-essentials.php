<?php
/**
 * PHP file for all Countdown Timer related functions.
 *
 * This file defines all the functions for Countdown Timer like fetching timer data, displaying the timer & shortcode use.
 *
 * @link       https://quanticedgesolutions.com/
 * @since      1.0.0
 *
 * @package    QC-Countdown
 * @subpackage QC-Countdown/public
 */

class Timer
{
    private $endsale_date; // Only for use in localized scripts in qc_timer_data
    public function __construct()
    {
        add_action('woocommerce_single_product_summary', [$this, 'qc_timer']);
        add_action('wp_enqueue_scripts', [$this, 'countdown_enqueue_script']);
        add_action('wp_enqueue_scripts', [$this, 'countdown_enqueue_style']);
        add_shortcode('short', [$this, 'qc_countdown_shortcode']);

    }
// Function Name: qc_timer()
// To display the countdown timer on relevant pages.
    public function qc_timer()
    {
        $id = get_the_ID();
        $product = wc_get_product($id);
        $endsale = $product->get_date_on_sale_to();
        if ($endsale) { // To only show on products where an endsale date exists
            $timer_data = $this->qc_timer_data();

            $id = get_the_ID();
            global $wpdb;
            $style_result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}countdown WHERE id=$id");
            if ($style_result) {
                foreach ($style_result as $row) {
                    $style = $row->style;
                    if ($row->style == __('Basic', 'count-down')) {
                        include 'partials/countdown-timer-html-basic.php';
                    } else if ($row->style == __('Black & Yellow', 'count-down')) {
                        include 'partials/countdown-timer-html-yellow-bg.php';
                    } else if ($row->style == __('Draft', 'count-down')) {
                        include 'partials/countdown-timer-html-draft.php';
                    } else if ($row->style == __('Modern', 'count-down')) {
                        include 'partials/countdown-timer-html-modern.php';
                    } else if ($row->style == __('CountUp and CountDown', 'count-down')) {
                        include 'partials/countdown-timer-html-up-down.php';
                    } else if ($row->style == __('Flipdown', 'count-down')) {
                        include 'partials/countdown-timer-html-flipdown.php';
                    }
                }
            }

        }
    }
// Function Name: qc_timer_data()
// To fetch relevant data for the countdown timer.
    public function qc_timer_data($product_id = null)
    {
        if (!is_null($product_id)) {
            $id = $product_id;
        } else {
            if (is_product()) {
                $id = get_the_ID();
            } else {
                return;
            }
        }
        $product = wc_get_product($id);
        $endsale = $product->get_date_on_sale_to();
        $this->endsale_date = date('Y-m-d H:i:s', strtotime($endsale));

        /* Enqueued here because the value $this->endsale becomes null when passed while keeping it in countdown_enqueue_script function as
        wp_enqueue_script is executed first in wordpress structure hence it won't have a value when it runs as $endsale is assigned later*/

        wp_enqueue_script('countdown_modern', plugin_dir_url(__FILE__) . 'js/countdown-timer-modern.js', array('jquery'), false, true);
        wp_localize_script('countdown_modern', 'countdown_obj_modern', array('url' => admin_url('admin-ajax.php'), 'sale_end' => $this->endsale_date));

        wp_enqueue_script('countdown_updown', plugin_dir_url(__FILE__) . 'js/countdown-timer-up-down.js', array('jquery'), false, true);
        wp_localize_script('countdown_updown', 'countdown_obj_updown', array('url' => admin_url('admin-ajax.php'), 'sale_end' => $this->endsale_date));

        wp_enqueue_script('countdown_flipdown', plugin_dir_url(__FILE__) . 'js/countdown-timer-flipdown.js', array('jquery'), false, true);
        wp_localize_script('countdown_flipdown', 'countdown_obj_flipdown', array('url' => admin_url('admin-ajax.php'), 'sale_end' => $this->endsale_date));

        wp_enqueue_script('countdown_draft', plugin_dir_url(__FILE__) . 'js/countdown-timer-draft.js', array('jquery'), false, true);
        wp_localize_script('countdown_draft', 'countdown_obj_draft', array('url' => admin_url('admin-ajax.php'), 'sale_end' => $this->endsale_date));

        // echo $this->endsale_date;die();
        $current_date = date('Y-m-d H:i:s');
        $dbDrop = 0;
        $color = '';
        $bgcolor = '';

        if (!is_null($product_id)) { // For shortcode use, where only id is supplied.
            $id = $product_id;
            global $wpdb;
            $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}countdown WHERE id=$id");
            if ($result) {
                foreach ($result as $row) {
                    $color = $row->color;
                    $bgcolor = $row->bgcolor;
                    $timer_style = $row->style;

                    if ($row->drop == __('Every Second', 'count-down')) {
                        $dbDrop = 1000;
                    } else if ($row->drop == __('Every Minute', 'count-down')) {
                        $dbDrop = 60000;
                    } else if ($row->drop == __('Every Hour', 'count-down')) {
                        $dbDrop = 3600000;
                    } else if ($row->drop == __('Every Day', 'count-down')) {
                        $dbDrop = 86400000;
                    }
                }
            }
        } else if (is_product() && ($this->endsale_date > $current_date)) { // For normal use, from product edit page.
            global $wpdb;
            $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}countdown WHERE id=$id");
            if ($result) {
                foreach ($result as $row) {
                    $color = $row->color;
                    $bgcolor = $row->bgcolor;
                    $timer_style = $row->style;

                    if ($row->drop == __('Every Second', 'count-down')) {
                        $dbDrop = 1000;
                    } else if ($row->drop == __('Every Minute', 'count-down')) {
                        $dbDrop = 60000;
                    } else if ($row->drop == __('Every Hour', 'count-down')) {
                        $dbDrop = 3600000;
                    } else if ($row->drop == __('Every Day', 'count-down')) {
                        $dbDrop = 86400000;
                    }
                }
            }
        } else { // If nothing from above
            return;
        }
        return array(
            'id' => $id,
            'drop' => $dbDrop,
            'endsale' => $this->endsale_date,
            'color' => $color,
            'bgcolor' => $bgcolor,
            'style' => $timer_style,
        );

    }
    public function countdown_enqueue_script()
    {
        wp_enqueue_script('countdown_basic', plugin_dir_url(__FILE__) . 'js/countdown-timer-basic.js', array('jquery'), false, true);
        wp_localize_script('countdown_basic', 'countdown_obj_basic', array('url' => admin_url('admin-ajax.php'), 'sale' => __('Sale Ends In: ', 'count-down'), 'days' => __(' Days ', 'count-down'), 'hrs' => __(' Hours ', 'count-down'), 'mins' => __(' Minutes ', 'count-down'), 'secs' => __(' Seconds ', 'count-down')));

        wp_enqueue_script('countdown_ybg', plugin_dir_url(__FILE__) . 'js/countdown-timer-yellow-bg.js', array('jquery'), false, true);
        wp_localize_script('countdown_ybg', 'countdown_obj_ybg', array('url' => admin_url('admin-ajax.php'), 'days' => __(' DAYS ', 'count-down'), 'hrs' => __(' HOURS ', 'count-down'), 'mins' => __(' MINUTES ', 'count-down'), 'secs' => __(' SECONDS ', 'count-down')));

    }
    public function countdown_enqueue_style()
    {
        wp_enqueue_style('countdown-yellow-bg', plugin_dir_url(__FILE__) . 'css/countdown-timer-yellow-bg.css', false, true);
        wp_enqueue_style('countdown-draft', plugin_dir_url(__FILE__) . 'css/countdown-timer-draft.css', false, true);
        wp_enqueue_style('countdown-modern', plugin_dir_url(__FILE__) . 'css/countdown-timer-modern.css', false, true);
        wp_enqueue_style('countdown-up-down', plugin_dir_url(__FILE__) . 'css/countdown-timer-up-down.css', false, true);
        wp_enqueue_style('countdown-flipdown', plugin_dir_url(__FILE__) . 'css/countdown-timer-flipdown.css', false, true);
    }

// Function Name: qc_countdown_shortcode()
// Creates a shortcode 'short' for user to display the timer easily.
    public function qc_countdown_shortcode($atts)
    {
        $product_id = ($atts['product_id']);
        if (!$product_id || empty($product_id)) {
            return;
        }
        $product = wc_get_product($product_id);
        if (!$product) {
            return;
        }
        $timer_data = $this->qc_timer_data($product->get_id());
        if (!empty($timer_data)) {
            if ($timer_data['style'] == 'Basic') {
                include 'partials/countdown-timer-html-basic.php';
            }
            if ($timer_data['style'] == 'Black & Yellow') {
                include 'partials/countdown-timer-html-yellow-bg.php';
            }
            if ($timer_data['style'] == 'Draft') {
                include 'partials/countdown-timer-html-draft.php';
            }
            if ($timer_data['style'] == 'Modern') {
                include 'partials/countdown-timer-html-modern.php';
            }
            if ($timer_data['style'] == 'CountUp and CountDown') {
                include 'partials/countdown-timer-html-up-down.php';
            }
            if ($timer_data['style'] == 'Flipdown') {
                include 'partials/countdown-timer-html-flipdown.php';
            }
        } else {
            include 'partials/countdown-error-html.php';
        }
        return;
    }
}
new Timer();

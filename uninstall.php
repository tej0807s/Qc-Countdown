<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://https://quanticedgesolutions.com/
 * @since      1.0.0
 *
 * @package    QC-Countdown
 */

// if (!defined('WP_UNINSTALL_PLUGIN')) {
//     exit;
// }

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    include 'public/partials/countdown-error-html.php';
    die();
}

global $wpdb;
$countdown_data = $wpdb->prefix . 'countdown';
$wpdb->query("DROP TABLE IF EXISTS $countdown_data");

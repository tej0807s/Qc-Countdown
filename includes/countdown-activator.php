<?php
/**
 * Fired during plugin activation.
 *
 * @link       https://https://quanticedgesolutions.com/
 * @since      1.0.0
 *
 * @package    QC-Countdown
 * @subpackage QC-Countdown/includes
 */

class Countdown_Timer_Activator
{

/**
 * Creates the database table for countdown timer's inputs.
 *
 * @since    1.0.0
 */

    public static function activate()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'countdown';
        $charset_collate = $wpdb->get_charset_collate();
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            $query = "CREATE TABLE " . $table_name . "(
                `id` int,
                `product` varchar(255),
                `drop` varchar(255),
                `color` varchar(255),
                `bgcolor` varchar(255),
                `style` varchar(255),
                PRIMARY KEY(`id`)
            ) $charset_collate;";

            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            dbDelta($query);
        }
        flush_rewrite_rules();
    }
}

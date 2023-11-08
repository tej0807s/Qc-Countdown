<?php
/**
 * Fired during plugin deactivation.
 *
 * @link       https://https://quanticedgesolutions.com/
 * @since      1.0.0
 *
 * @package    QC-Countdown
 * @subpackage QC-Countdown/includes
 */

class Countdown_Timer_Deactivator
{
    /**
     * Flushes the rewrite rules when plugin is deactivated.
     *
     * @since    1.0.0
     */

    public static function deactivate()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'countdown';
        $charset_collate = $wpdb->get_charset_collate();
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
            $query = "DROP TABLE " . $table_name;
            $wpdb->query($query);
        }
        flush_rewrite_rules();
    }
}

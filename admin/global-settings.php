<?php
/**
 * PHP file for Global Settings functions for the Countdown Timer.
 *
 * This file defines all the functions for the countdown timer to change the settings globally.
 *
 * @link       https://quanticedgesolutions.com/
 * @since      1.0.0
 *
 * @package    QC-Countdown
 * @subpackage QC-Countdown/admin
 */
class Global_Settings
{
    public function __construct()
    {
        add_filter('woocommerce_settings_tabs_array', [$this, 'qc_add_settings_tab']);
        add_action('woocommerce_settings_tabs_qc_settings_tab', [$this, 'qc_fill_settings_tab']);
        add_action('woocommerce_update_options_qc_settings_tab', [$this, 'qc_update_settings']);
    }
//Function Name: qc_add_settings_tab
//To add a new custom tab in WooCommerce setting sub-menu.
    public function qc_add_settings_tab($tab)
    {
        $tab['qc_settings_tab'] = __('Global Timer', 'count-down');
        return $tab;
    }
//Function Name: qc_fill_settings_tab
//To add a new custom tab in WooCommerce setting sub-menu.
    public function qc_fill_settings_tab()
    {
        woocommerce_admin_fields($this->qc_get_settings());
        $dbDrop = get_option('wc_settings_tab_drop');
        $endsale_date = get_option('wc_settings_tab_date');

    }
    public function qc_get_settings()
    {
        $settings = array(
            'section_title' => array(
                'name' => __('Global Timers Settings', 'count-down'),
                'type' => 'title',
                'desc' => __('Add countdown timer to all your products.'),
                'id' => 'wc_settings_tab_section_title',
            ),
            'color' => array(
                'name' => __('Color', 'count-down'),
                'type' => 'color',
                'desc' => __("Choose a color for your countdown timer's text."),
                'id' => 'wc_settings_tab_color',
            ),
            'bgcolor' => array(
                'name' => __('Background Color', 'count-down'),
                'type' => 'color',
                'desc' => __("Choose a color for your countdown timer's background."),
                'id' => 'wc_settings_tab_bgcolor',
            ),
            'date' => array(
                'name' => __('Sale End Date', 'count-down'),
                'type' => 'date',
                'desc' => __("Choose timer end date."),
                'id' => 'wc_settings_tab_date',
            ),
            'drop' => array(
                'name' => __('Timer Drop', 'count-down'),
                'type' => 'select',
                'options' => array(
                    1000 => 'Every Second',
                    60000 => 'Every Minute',
                    3600000 => 'Every Hour',
                    86400000 => 'Every Day',
                ),
                'desc' => __("Choose timer drop rate."),
                'id' => 'wc_settings_tab_drop',
            ),
            'section_end' => array(
                'type' => 'sectionend',
                'id' => 'wc_settings_tab_section_end',
            ),
        );
        return apply_filters('wc_settings_tab_settings', $settings);
    }
    public function qc_update_settings()
    {
        woocommerce_update_options($this->qc_get_settings());
    }
}
new Global_Settings();

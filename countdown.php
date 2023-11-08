<?php
/**
 * @link        https: //quanticedgesolutions.com/
 * @since       1.0.0
 * @package     QC-Countdown
 *
 *
 * @wordpress-plugin
 * Plugin Name: QC-Countdown
 * Plugin URI: https://quanticedgesolutions.com/
 * Description: A plugin that helps you make, manage and customize a product countdown timer for your WooCommerce store.
 * Version: 1.0.0
 * Author: QuanticEdge
 * Author URI: https://quanticedgesolutions.com/
 * Text Domain: count-down
 */

//If this file is called directly, abort.
if (!defined('WPINC')) {
    include 'admin/partials/countdown-error-html.php';
    die();
}

/**
 * Current plugin version.
 * Started at 1.0.0.
 * To be updated when plugin is updated.
 */
define('QC_COUNTDOWN_VERSION', '1.0.0');

/**
 * Required files for the plugin to work containing HTML structures, functions  and shortcodes.
 */
require_once plugin_dir_path(__FILE__) . 'admin/meta-box.php';
require_once plugin_dir_path(__FILE__) . 'public/timer-essentials.php';
require_once plugin_dir_path(__FILE__) . 'admin/global-settings.php';

/**
 * The code that runs during plugin activation.
 */
function activate_countdown()
{
    require_once plugin_dir_path(__FILE__) . 'includes/countdown-activator.php';
    Countdown_Timer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_countdown()
{
    require_once plugin_dir_path(__FILE__) . 'includes/countdown-deactivator.php';
    Countdown_Timer_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_countdown');
register_deactivation_hook(__FILE__, 'deactivate_countdown');

/**
 * The core plugin class
 *
 * @since 1.0.0
 */

require_once plugin_dir_path(__FILE__) . 'includes/class-countdown.php';

function run_countdown()
{
    $plugin = new Countdown();

}

run_countdown();

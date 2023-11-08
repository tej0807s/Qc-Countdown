<?php
class Countdown
{
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct()
    {
        if (defined('QC_COUNTDOWN_VERSION')) {
            $this->version = QC_COUNTDOWN_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'countdown';

        $this->load_dependencies();
    }
    private function load_dependencies()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-countdown-loader.php';
    }
/**
 * The name of plugin used to identify it within the context of WordPress and to define internationalization funationality.
 *
 * @since     1.0.0
 * @return    string    The name of the plugin.
 */

    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

/**
 * Retrieve the current version number of the plugin.
 */
    public function get_plugin_version()
    {
        return $this->plugin_version;
    }
}

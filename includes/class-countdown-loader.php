<?php
class Countdown_Loader
{
/**
 * The array of actions registered with Wordpress.
 *
 * @since       1.0.0
 * @access      protected
 * @var         array $actions The actions registered with WordPress to fire when the plugin loads.
 */
    protected $actions;

/**
 * The array of filters registerd with Wordpress.
 *
 * @since       1.0.0
 * @access      protected
 */
    protected $filters;

/**
 * Initialize the collections used to maintain actions and filters.
 *
 * @since       1.0.0
 */

    public function __construct()
    {
        $this->actions = array();
        $this->filters = array();
    }

}

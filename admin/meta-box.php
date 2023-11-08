<?php
/**
 * PHP file for all MetaBox related functions.
 *
 * This file defines all the functions for MetaBoxes used to display content or inserting/updating data database.
 *
 * @link       https://quanticedgesolutions.com/
 * @since      1.0.0
 *
 * @package    QC-Countdown
 * @subpackage QC-Countdown/admin
 */

class Metabox
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'qc_add_meta'], 10);
        add_action('save_post', [$this, 'qc_insert']);
        add_action('save_post', [$this, 'qc_update']);

    }
    public function qc_add_meta()
    {
        $page = ['product'];
        foreach ($page as $screen) {
            add_meta_box('meta_id', __('Countdown Timer', 'count-down'), [$this, 'qc_meta_html'], $screen);
        }
    }
//Function Name: qc_meta_html
//Function to display the HTML structure of the Metabox with previously entered values in it.
    public function qc_meta_html()
    {
        $id = get_the_ID();
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}countdown WHERE id=$id");
        foreach ($result as $row) {
            $meta_entered_color = $row->color;
            $meta_entered_bgcolor = $row->bgcolor;
            $meta_entered_drop = $row->drop;
            $meta_entered_style = $row->style;
        }
        include 'partials/countdown-meta-html.php';

    }
//Function Name: qc_insert()
//Inserts data entered in meta box in db table.
    public function qc_insert()
    {
        if (is_product() || get_post_type() == 'product') {
            global $wpdb;
            $table_name = $wpdb->prefix . 'countdown';
            $id = get_the_ID();
            $name = get_the_title();
            $wpdb->insert($table_name, array('id' => $id, 'product' => $name, 'drop' => $_POST['drop'], 'color' => $_POST['color'], 'bgcolor' => $_POST['bgcolor'], 'style' => $_POST['style']));

        }
    }
//Function Name: qc_update()
//Updates data entered in meta box in db table.
    public function qc_update()
    {
        if (is_product() || get_post_type() == 'product') {
            global $wpdb;
            $table_name = $wpdb->prefix . 'countdown';
            $id = get_the_ID();
            $name = get_the_title();
            $wpdb->update($table_name, array('id' => $id, 'product' => $name, 'drop' => $_POST['drop'], 'color' => $_POST['color'], 'bgcolor' => $_POST['bgcolor'], 'style' => $_POST['style']), array('id' => $id));
        }

    }
}
new Metabox();

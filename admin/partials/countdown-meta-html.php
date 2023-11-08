<?php
/**
 * HTML for the Countdown Timer Metabox on single product edit page.
 *
 * This file defines the HTML structure of the contents of Metabox which is used to take necessary inputs from user.
 *
 * @link       https://quanticedgesolutions.com/
 * @since      1.0.0
 *
 * @package    QC-Countdown
 * @subpackage QC-Countdown/admin/partials
 */
?>

<form method="post">
    <table cellpadding="3" cellspacing="3">
        <tr>
            <td><label for="drop"><b><?php _e('Timer Drop', 'count-down')?>
                    </b></label><br /></td>
            <td><select name="drop">
                    <?php empty($meta_entered_drop) ? $meta_entered_drop = 'Every Second' : ''?>
                    <option <?php echo ($meta_entered_drop == 'Every Second') ? 'selected' : ''; ?>>
                        <?php _e('Every Second', 'count-down')?></option>
                    <option <?php echo ($meta_entered_drop == 'Every Minute') ? 'selected' : ''; ?>>
                        <?php _e('Every Minute', 'count-down')?>
                    </option>
                    <option <?php echo ($meta_entered_drop == 'Every Hour') ? 'selected' : ''; ?>>
                        <?php _e('Every Hour', 'count-down')?>
                    </option>
                    <option <?php echo ($meta_entered_drop == 'Every Day') ? 'selected' : ''; ?>>
                        <?php _e('Every Day', 'count-down')?>
                    </option>
                    <br />
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="style_option"><b><?php _e('Style', 'count-down')?></b></label></td>
            <td>
                <select name="style">
                    <?php empty($meta_entered_style) ? $meta_entered_style = 'Basic' : ''?>
                    <option <?php echo ($meta_entered_style == 'Basic') ? 'selected' : '' ?>>
                        <?php _e('Basic', 'count-down');?></option>
                    <option <?php echo ($meta_entered_style == 'Black & Yellow') ? 'selected' : '' ?>>
                        <?php _e('Black & Yellow', 'count-down');?></option>
                    <option <?php echo ($meta_entered_style == 'Draft') ? 'selected' : '' ?>>
                        <?php _e('Draft', 'count-down');?></option>
                    <option <?php echo ($meta_entered_style == 'Modern') ? 'selected' : '' ?>>
                        <?php _e('Modern', 'count-down');?></option>
                    <option <?php echo ($meta_entered_style == 'CountUp and CountDown') ? 'selected' : '' ?>>
                        <?php _e('CountUp and CountDown', 'count-down');?></option>
                    <option <?php echo ($meta_entered_style == 'Flipdown') ? 'selected' : '' ?>>
                        <?php _e('Flipdown', 'count-down');?></option>
                </select>
            </td>
            <td><label>Choose from already made styles or create a custom color combination with the
                    'Basic' style.</label>
            </td>
        </tr>
        <tr>
            <td><label for="color"><b><?php _e('Font Color', 'count-down')?></b></label>
                <br />
            </td>
            <td><input type="color" name="color" value="<?php echo $meta_entered_color; ?>"><br /></td>
            <td><label>Select for 'Basic' style timer and timer displayed by shortcode.</label>
            </td>
        </tr>
        <tr>
            <td><label for="bgcolor"><b><?php _e('Background Color', 'count-down')?>
                    </b></label><br /></td>
            <td><input type="color" name="bgcolor" value="<?php echo $meta_entered_bgcolor; ?>"><br /></td>
            <td><label>Select for 'Basic' style timer and timer displayed by shortcode.</label>
        </tr>

    </table>
</form>
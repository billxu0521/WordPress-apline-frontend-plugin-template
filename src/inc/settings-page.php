<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get the active tab from the $_GET parameter
$settings_url = "options-general.php?page=one-sign-per-day";
$default_tab = 'whatsapp-settings';
$tab = isset($_GET['tab'])?sanitize_text_field($_GET['tab']):$default_tab;

// Initialize variables
$button_status = intval(get_option('ospd_button_status'));
$button_text = get_option('ospd_button_text');
$button_target = get_option('ospd_button_target');

?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <div class="tab-content">
        <form method="post" action="options.php">
        <?php settings_fields(''); ?>

            <table class="form-table">
                    <tr>
                        <th scope="row"><?php echo esc_html__('Button status', 'simple-chat-button'); ?> :</th>
                        <td>
                            <input type="checkbox" name="ospd_button_status" id="ospd_button_status" value="1" <?php checked('1', esc_attr($button_status));?>>
                            <span><?php echo esc_html__('Enabled', 'one-sign-per-day'); ?></span>
                        <td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html__('Button text', 'one-sign-per-day'); ?> <small style="font-weight: 400"><?php echo esc_html__('(optional)','one-sign-per-day'); ?></small> :</th>
                        <td>
                            <input type="text" name="ospd_button_text" id="ospd_button_text" placeholder="<?php echo esc_html__('Need Help?', 'one-sign-per-day'); ?>" value="<?php echo esc_attr($button_text);?>"/>
                            
                        </td>
                    </tr>
                    
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
</div>
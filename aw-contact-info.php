<?php
/*
Plugin Name: AW Contact Info
Description: Basic contact information to be displayed within the website.
Version: 1.0
Author: Alex Winter
Author URI: https://alxwntr.com/
*/

// register the settings page
add_action('admin_menu', 'contact_info_settings_page');
function contact_info_settings_page() {
    add_options_page('Contact Info Settings', 'Contact Info', 'manage_options', 'contact-info-settings', 'contact_info_settings');
}

// define the settings page
function contact_info_settings() {
?>
    <form method="post" action="options.php">
        <?php settings_fields('contact_info_settings_group'); ?>
        <?php do_settings_sections('contact-info-settings'); ?>
        <?php submit_button(); ?>
    </form>
<?php
}

// register the settings fields
add_action('admin_init', 'contact_info_settings_fields');

function contact_info_settings_fields() {
    register_setting('contact_info_settings_group', 'contact_info_title');
    register_setting('contact_info_settings_group', 'contact_info_tagline');
    register_setting('contact_info_settings_group', 'contact_info_address');
    register_setting('contact_info_settings_group', 'contact_info_phone');

    add_settings_section('contact_info_settings_section', 'Contact Info', 'contact_info_settings_section', 'contact-info-settings');

    add_settings_field('contact_info_title', 'Title', 'contact_info_title_field', 'contact-info-settings', 'contact_info_settings_section');
    add_settings_field('contact_info_tagline', 'Tagline', 'contact_info_tagline_field', 'contact-info-settings', 'contact_info_settings_section');
    add_settings_field('contact_info_address', 'Address', 'contact_info_address_field', 'contact-info-settings', 'contact_info_settings_section');
    add_settings_field('contact_info_phone', 'Phone', 'contact_info_phone_field', 'contact-info-settings', 'contact_info_settings_section');
}

// Define the settings fields
function contact_info_settings_section() {
    echo '<p>This information is displayed within your website footer, contact page, etc...</p>';
}

function contact_info_title_field() {
    $title = get_option('contact_info_title');
    echo '<input type="text" name="contact_info_title" value="' . esc_attr($title) . '">';
}

function contact_info_tagline_field() {
    $tagline = get_option('contact_info_tagline');
    echo '<input type="text" name="contact_info_tagline" value="' . esc_attr($tagline) . '">';
}

function contact_info_address_field() {
    $address = get_option('contact_info_address');
    echo '<textarea name="contact_info_address">' . esc_textarea($address) . '</textarea>';
}

function contact_info_phone_field() {
    $phone = get_option('contact_info_phone');
    echo '<input type="tel" name="contact_info_phone" value="' . esc_attr($phone) . '">';
}

// Define the include statements for each field
function contact_info_title() {
    $title = get_option('contact_info_title');
    echo esc_html($title);
}

function contact_info_tagline() {
    $tagline = get_option('contact_info_tagline');
    echo esc_html($tagline);
}

function contact_info_address() {
    $address = get_option('contact_info_address');
    echo nl2br(esc_html($address));
}

function contact_info_phone() {
    $phone = get_option('contact_info_phone');
    echo esc_html($phone);
}

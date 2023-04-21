# AW Contact Info
 A simple Wordpress plugin for collecting and outputting contact information. For example within the website footer or Contact page, etc.

After activating the plugin, navigate to 'Settings' > 'Contact Info'. Then enter the fields as necessary.

Then within your Wordpress Theme files you can echo the text from these fields. For example:

    <h2><?php echo contact_info_title(); ?></h2>
    <p><?php echo contact_info_tagline(); ?></p>
    <address><?php echo contact_info_address(); ?></address>
    <div class="phone"><?php echo contact_info_phone(); ?></div>
    <a href="<?php echo contact_info_linkedin(); ?>" target="_blank" rel="noopener">LinkedIn</a>

# Todo:
* Add ability to only display specific markup if the user entered text withint the field. For example, if there is no 'contact_info_title' then we should also not output the h2 tags that wrap it.
* Add ability to display the phone number in various formats. For example, the number without any special characters or spaces to be used within the href="tel:".
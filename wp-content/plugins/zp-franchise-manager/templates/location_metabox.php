<style>
    ul.location_meta {}
    ul.location_meta li {}
    ul.location_meta li label { display:inline-block; text-align:right; min-width:20%; }
    ul.location_meta li input[type=text] { min-width:40%; }
</style>
<ul class="location_meta">
    <li>
        <label for="loc_meta_address">Address 1</label>
        <input type="text" id="loc_meta_address" name="loc_meta_address" value="<?php echo @get_post_meta($post->ID, 'loc_meta_address', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_address2">Address 2</label>
        <input type="text" id="loc_meta_address2" name="loc_meta_address2" value="<?php echo @get_post_meta($post->ID, 'loc_meta_address2', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_city">City</label>
        <input type="text" id="loc_meta_city" name="loc_meta_city" value="<?php echo @get_post_meta($post->ID, 'loc_meta_city', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_state">State</label>
        <input type="text" id="loc_meta_state" name="loc_meta_state" value="<?php echo @get_post_meta($post->ID, 'loc_meta_state', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_zip">ZIP</label>
        <input type="text" id="loc_meta_zip" name="loc_meta_zip" value="<?php echo @get_post_meta($post->ID, 'loc_meta_zip', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_phone">Phone</label>
        <input type="text" id="loc_meta_phone" name="loc_meta_phone" value="<?php echo @get_post_meta($post->ID, 'loc_meta_phone', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_email">Email</label>
        <input type="text" id="loc_meta_email" name="loc_meta_email" value="<?php echo @get_post_meta($post->ID, 'loc_meta_email', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_hours">Hours</label>
        <input type="text" id="loc_meta_hours" name="loc_meta_hours" value="<?php echo @get_post_meta($post->ID, 'loc_meta_hours', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_salonlink">Salon Link</label>
        <input type="text" id="loc_meta_salonlink" name="loc_meta_salonlink" value="<?php echo @get_post_meta($post->ID, 'loc_meta_salonlink', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_gmap">Map Shortcode</label>
        <input type="text" id="loc_meta_gmap" name="loc_meta_gmap" value="<?php echo @get_post_meta($post->ID, 'loc_meta_gmap', true); ?>" />
    </li>
    <li>
        <label for="loc_meta_gcal">Google Calendar Code</label>
        <input type="text" id="loc_meta_gcal" name="loc_meta_gcal" value="<?php echo @get_post_meta($post->ID, 'loc_meta_gcal', true); ?>" />
    </li>
</ul>

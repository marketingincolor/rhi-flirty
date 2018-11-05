<?php
/*
Plugin Name: ZeePress Franchise Manager
Plugin URI: http://zeepress.com/plugins
Description: A Wordpress plugin for Franchise Management
Version: 0.1
Author: Marketing In Color
Author URI: http://www.marketingincolor.com
License: GPL2

Copyright 2014 Marketing In Color  (email : developer@marketingincolor.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*********************************************************************************/
/**************** Franchise Manager USERROLE removed for FGL site ****************/
/*********************************************************************************/

if(!class_exists('Franchise_Manager'))
{
	class Franchise_Manager
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// Initialize Settings
			require_once(sprintf("%s/settings.php", dirname(__FILE__)));
			$Franchise_Manager_Settings = new Franchise_Manager_Settings();

			// Register custom post types
			require_once(sprintf("%s/post-types/location.php", dirname(__FILE__)));
			$Location_Post_Type_Template = new Location_Post_Type_Template();

			$plugin = plugin_basename(__FILE__);
			add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));
		} // END public function __construct

		/**
		 * Activate the plugin
		 */
		public static function activate()
		{

            $roles_object = new WP_Roles();
            $roles_object->add_cap('administrator', 'edit_locations');
            $roles_object->add_cap('administrator', 'create_locations');
            $roles_object->add_cap('administrator', 'manage_locations');
            $roles_object->add_cap('administrator', 'delete_locations');
            $roles_object->add_cap('administrator', 'read_locations');

		} // END public static function activate

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{

            $roles_object = new WP_Roles();
            $roles_object->remove_cap('administrator', 'edit_locations');
            $roles_object->remove_cap('administrator', 'create_locations');
            $roles_object->remove_cap('administrator', 'manage_locations');
            $roles_object->remove_cap('administrator', 'delete_locations');
            $roles_object->remove_cap('administrator', 'read_locations');
			
		} // END public static function deactivate

		// Add the settings link to the plugins page
		function plugin_settings_link($links)
		{
			$settings_link = '<a href="options-general.php?page=franchise-manager">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}
		
	} // END class Franchise_Manager
} // END if(!class_exists('Franchise_Manager'))

if(class_exists('Franchise_Manager'))
{
	// Install and uninstall hooks
	register_activation_hook(__FILE__, array('Franchise_Manager', 'activate'));
	register_deactivation_hook(__FILE__, array('Franchise_Manager', 'deactivate'));

	// instantiate the plugin class
	$franchise_manager = new Franchise_Manager();

}

/*********************************************************************************/
/**************** Various Functions below terminated for FGL site ****************/
/*********************************************************************************/
/**
 * Remove the slug from published post permalinks for Post Type
 */
function fm_remove_cpt_slug( $post_link, $post ) {

    if ( ! in_array( $post->post_type, array( 'location' ) ) || 'publish' != $post->post_status )
        return $post_link;

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}
//add_filter( 'post_type_link', 'fm_remove_cpt_slug', 10, 2 ); /******** REMOVED FOR FGL ********/

/**
 * Bypass request for custom Post Type
 */
function fm_parse_request_bypass( $query ) {
    if ( ! $query->is_main_query() )
        return;

    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) )
        return;

    if ( ! empty( $query->query['name'] ) )
        $query->set( 'post_type', array( 'post', 'location', 'page' ) );
}
//add_action( 'pre_get_posts', 'fm_parse_request_bypass' ); /******** REMOVED FOR FGL ********/

add_filter( 'map_meta_cap', 'fm_custom_map_meta_cap', 10, 4 );
function fm_custom_map_meta_cap( $caps, $cap, $user_id, $args ) {
    /* If editing, deleting, or reading a location, get the post and post type object. */
    if ( 'edit_location' == $cap || 'delete_location' == $cap || 'read_location' == $cap ) {
        $post = get_post( $args[0] );
        $post_type = get_post_type_object( $post->post_type );
        /* Set an empty array for the caps. */
        $caps = array();
    }
    /* If editing a franchise, assign the required capability. */
    if ( 'edit_location' == $cap ) {
        if ( $user_id == $post->post_author )
            $caps[] = $post_type->cap->edit_posts;
        else
            $caps[] = $post_type->cap->edit_others_posts;
    }
    /* If deleting a franchise, assign the required capability. */
    elseif ( 'delete_location' == $cap ) {
        if ( $user_id == $post->post_author )
            $caps[] = $post_type->cap->delete_posts;
        else
            $caps[] = $post_type->cap->delete_others_posts;
    }
    /* If reading a private franchise, assign the required capability. */
    elseif ( 'read_location' == $cap ) {

        if ( 'private' != $post->post_status )
            $caps[] = 'read';
        elseif ( $user_id == $post->post_author )
            $caps[] = 'read';
        else
            $caps[] = $post_type->cap->read_private_posts;
    }
    /* Return the capabilities required by the user. */
    return $caps;
}

/********************************************************************************/
/**************** Various NEW Functions below added for FGL site ****************/
/********************************************************************************/
/**
 * Remove Custom Meta box from Admin
 */
function remove_post_custom_fields() {
    remove_meta_box( 'postcustom' , 'location' , 'normal' ); 
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );
/**
 * Add Shortcodes
 */
function location_shortcodes_init()
{
    // Location Alpha Shortcode - [location-alpha]
    function location_alpha_shortcode($atts, $content = null)
    {
        global $post;
        $content = get_post_meta($post->ID, 'company_name', true);
        // always return
        return $content;
    }
    add_shortcode('location-alpha', 'location_alpha_shortcode');
    // Location Beta Shortcode
    function location_beta_shortcode($atts, $content = null)
    {
        $page_id = get_queried_object_id();
        $content = get_the_term_list( $page_id, 'types', '<ul class="types"><li>', ',</li><li>', '</li></ul>' );
        return $content;
    }
    add_shortcode('location-beta', 'location_beta_shortcode');

    // Location Phone Shortcode - [ location-phone]
    function location_phone_shortcode($atts, $content = null)
    {
        global $post;
        $location_phone = get_post_meta( $post->ID, 'loc_meta_phone', true );
        return $location_phone;
    }
    add_shortcode('location-phone', 'location_phone_shortcode');

    // Location Salon Link Shortcode - [ location-salonlink ]
    function location_salonlink_shortcode($atts, $content = null)
    {
        global $post;
        $location_salonlink = get_post_meta( $post->ID, 'loc_meta_salonlink', true );
        return $location_salonlink;
    }
    add_shortcode('location-salonlink', 'location_salonlink_shortcode');
}
add_action('init', 'location_shortcodes_init');
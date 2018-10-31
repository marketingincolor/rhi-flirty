<?php
if(!class_exists('Location_Post_Type_Template'))
{
    /**
     * A PostTypeTemplate class that provides additional meta fields
     */
    class Location_Post_Type_Template
    {
        const POST_TYPE	= "location";
        private $_meta	= array(
            'loc_meta_address', // address1
            'loc_meta_address2', // address2
            'loc_meta_city', // city
            'loc_meta_state', // state
            'loc_meta_zip', // zip
            'loc_meta_phone', // phone
            'loc_meta_email', // email
            'loc_meta_hours', // hours
            'loc_meta_salonlink', // suid
            'loc_meta_gmap', // mapcode
            'loc_meta_gcal', // calcode
        );

        /**
         * The Constructor
         */
        public function __construct()
        {
            // register actions
            add_action('init', array(&$this, 'init'));
            add_action('admin_init', array(&$this, 'admin_init'));
        } // END public function __construct()

        /**
         * hook into WP's init action hook
         */
        public function init()
        {
            // Initialize Post Type
            $this->create_post_type();
            add_action('save_post', array(&$this, 'save_post'));
        } // END public function init()

        /**
         * Create the post type
         */
        public function create_post_type()
        {
            register_post_type(self::POST_TYPE,
                array(
                    'labels' => array(
                        'name' => __(sprintf('%ss', ucwords(str_replace("_", " ", self::POST_TYPE)))),
                        'singular_name' => __(ucwords(str_replace("_", " ", self::POST_TYPE)))
                    ),
                    'public' => true,
                    'menu_icon' => 'dashicons-networking',
                    'supports' => array(
                        'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes'
                    ),
                    'has_archive' => false,
                    'rewrite' => array('slug' => 'locations'),
                    'hierarchical' => true,
                    'capability_type' => 'location',
                    'map_meta_cap' => true,
                    'capabilities' => array(
                        // meta caps (don't assign these to roles)
                        'edit_post' => 'edit_location',
                        'read_post' => 'read_location',
                        'delete_post' => 'delete_location',
                        // primitive/meta caps
                        'create_posts' => 'create_locations',
                        // primitive caps used outside of map_meta_cap()
                        'edit_posts' => 'edit_locations',
                        'edit_others_posts' => 'manage_locations',
                        'publish_posts' => 'manage_locations',
                        'read_private_posts' => 'read',
                        // primitive caps used inside of map_meta_cap()
                        'read' => 'read',
                        'delete_posts' => 'manage_locations',
                        'delete_private_posts' => 'manage_locations',
                        'delete_published_posts' => 'manage_locations',
                        'delete_others_posts' => 'manage_locations',
                        'edit_private_posts' => 'edit_locations',
                        'edit_published_posts' => 'edit_locations'
                    ),
                )
            );
            flush_rewrite_rules();
        }

        /**
         * Save the metaboxes for this custom post type
         */
        public function save_post($post_id)
        {
            // verify if this is an auto save routine. If it is we bypass the update.
            if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            {
                return;
            }

            if(isset($_POST['post_type']) /*&& $_POST['post_type'] == self::POST_TYPE*/ && current_user_can('edit_post', $post_id))
            {
                foreach($this->_meta as $field_name)
                {
                    // Update the post's meta field
                    update_post_meta($post_id, $field_name, $_POST[$field_name]);
                }
            }
            else
            {
                return;
            } // if($_POST['post_type'] == self::POST_TYPE && current_user_can('edit_post', $post_id))
        } // END public function save_post($post_id)

        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
            // Add metaboxes
            add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
        } // END public function admin_init()

        /**
         * hook into WP's add_meta_boxes action hook
         */
        public function add_meta_boxes()
        {
            // Add this metabox to every selected post
            add_meta_box(
                sprintf('franchise_manager_%s_section', self::POST_TYPE),
                sprintf('%s Information', ucwords(str_replace("_", " ", self::POST_TYPE))),
                array(&$this, 'add_inner_meta_boxes'),
                self::POST_TYPE
            );
        } // END public function add_meta_boxes()

        /**
         * called off of the add meta box
         */
        public function add_inner_meta_boxes($post)
        {
            // Render the job order metabox
            include(sprintf("%s/../templates/%s_metabox.php", dirname(__FILE__), self::POST_TYPE));
        } // END public function add_inner_meta_boxes($post)

    } // END class Location_Post_Type_Template
} // END if(!class_exists('Location_Post_Type_Template'))

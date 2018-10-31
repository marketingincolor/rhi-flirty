<?php
// Register menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu', 'jointswp' ),   // Main nav in header
		'footer-links' => __( 'Footer Links', 'jointswp' ) // Secondary nav in footer
	)
);

// The Top Menu
function joints_top_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'medium-horizontal menu',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
        'theme_location' => 'main-nav',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Topbar_Menu_Walker()
    ));
} 

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }

    // add main/sub classes to li's and links
    function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
        // depth dependent classes
        /*$depth_classes = array(
            ( $depth == 0 ? 'topElement' : 'parent' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );*/

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // get slug for icon classes
        //$single_id = get_page_by_title( $item->title );
        //$find_slug = get_post($single_id->ID); 
        //$slug = $find_slug->post_name;

        if( $item->object == 'page' ) {
            //$single_id = get_page_by_title( $item->title );
            //$find_slug = get_post($single_id->ID); 
            $single_id = $item->object_id;
            $find_slug = get_post($single_id);
            $slug = $find_slug->post_name;
        } elseif( $item->object == 'custom') {
            $slug = $item->post_name;
        }

        if($depth === 0){
             // build html
            //$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . /*$depth_class_names . ' ' .*/ $class_names . '"><label class="icon ' . $slug . '"><span class="icon-' . $slug . '"></span></label>';

            $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . /*$depth_class_names . ' ' .*/ $class_names . '">';
        }else{
            $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . /*$depth_class_names . ' ' .*/ $class_names . '">';
        };

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $link_before = '<span class="icon-' . $slug . '"></span>';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            //$args->link_before,
            $link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}

// The Off Canvas Menu
function joints_off_canvas_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical menu accordion-menu',       			// Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
        'theme_location' => 'main-nav',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Off_Canvas_Menu_Walker()
    ));
} 

class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu\">\n";
    }
}

// The Footer Menus
function joints_footer_links() {
    wp_nav_menu(array(
    	'container' => 'false',                         // Remove nav container
    	'menu' => __( 'Footer Links', 'jointswp' ),   	// Nav name
    	'menu_class' => 'menu',      					// Adding custom nav class
    	'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
    	'fallback_cb' => ''  							// Fallback function
	));
} 

function joints_footer_links_two() {
    wp_nav_menu(array(
        'container' => 'false',                         // Remove nav container
        'menu' => __( 'Footer Links Two', 'jointswp' ),     // Nav name
        'menu_class' => 'menu',                         // Adding custom nav class
        'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
        'fallback_cb' => ''                             // Fallback function
    ));
}

function joints_footer_links_three() {
    wp_nav_menu(array(
        'container' => 'false',                         // Remove nav container
        'menu' => __( 'Footer Links Three', 'jointswp' ),     // Nav name
        'menu_class' => 'menu',                         // Adding custom nav class
        'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
        'fallback_cb' => ''                             // Fallback function
    ));
}/* End Footer Menus */

// Header Fallback Menu
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => '',      						// Adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                           // Before each link
        'link_after' => ''                             // After each link
	) );
}

// Footer Fallback Menu
function joints_footer_links_fallback() {
	/* You can put a default here if you like */
}

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );
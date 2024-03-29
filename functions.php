<?php
// Theme Functions
// Create Theme Options Page
require_once __DIR__ . "/options.php";

/**
 * Customizer additions.
 */
require get_template_directory() . "/inc/customizer.php";

add_action("after_setup_theme", "ucla_ps_setup");

function ucla_ps_setup()
{
  remove_theme_support("core-block-patterns");
  add_theme_support("title-tag");
  add_theme_support("automatic-feed-links");
  add_theme_support("post-thumbnails");
  add_theme_support("html5", ["search-form"]);
  add_theme_support("responsive-embeds");

  global $content_width;
  
  if ( ! isset( $content_width ) ) { $content_width = 1920; }
    register_nav_menus( array(
      'main-menu' => esc_html__( 'Main Menu', 'ucla' ),
      'secondary-menu' => esc_html__( 'Secondary Menu', 'ucla-secondary' ),
      'foot-menu' => esc_html__( 'Foot Menu (Menu name must be "Foot Menu")', 'ucla-foot' )
    ));
  }

/**
 * Register Walker Class
 */
require get_template_directory() . '/classes/class-ucla-wordpress-primary-navigation-walker.php';
require get_template_directory() . '/classes/class-ucla-wordpress-secondary-navigation-walker.php';

// Load Theme Scripts and Styles
add_action("wp_enqueue_scripts", "ucla_load_scripts");
function ucla_load_scripts() {

  wp_enqueue_script( 'ucla-lib-script', get_template_directory_uri() . '/dist/js/ucla-lib-scripts.min.js', '', '2.0.0-beta.2', true );

  wp_enqueue_style( 'ucla-lib', get_template_directory_uri() . '/dist/css/ucla-lib.min.css' );  
  wp_enqueue_style( 'ucla-ps', get_template_directory_uri() . "/css/ucla-ps.min.css", [], null, "screen" );
    

}

// WP Admin Login Styles
//add_action("login_enqueue_scripts", "my_login_page_remove_back_to_link");
function my_login_page_remove_back_to_link()
{
  // Path the admin page login styles
  wp_enqueue_style(
    "login-style",
    get_template_directory_uri() . "/style-login.css"
  );
}

// Create UCLA Colors Admin Color Scheme via plugin https://github.com/uclaioes/ucla-wp-admin-color-scheme
function set_default_admin_color($theme)
{

	// set new default admin color scheme
	$theme = 'ucla-light-theme';

	// return the new default color
	return $theme;

}

add_filter('get_user_option_admin_color', 'set_default_admin_color', 10, 2 );


// Breadcrumbs
function get_breadcrumb()
{
  echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
  if (is_single()) {
    echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
    echo get_post_type(get_the_ID());
    // if (is_single()) {
    //     echo " &nbsp;&nbsp;&#47;&nbsp;&nbsp; ";
    //     the_title();
    // }
  } elseif (is_page()) {
    // echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
    // echo the_title();
  } elseif (is_search()) {
    echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;Search Results for... ";
    echo '"<em>';
    echo the_search_query();
    echo '</em>"';
  }
}

// Categories for pages
add_action("init", "ucla_page_categories");
function ucla_page_categories()
{
  register_taxonomy_for_object_type("category", "page");
}

// Taxonomy for pages
add_action("init", "ucla_page_tags");
function ucla_page_tags()
{
  register_taxonomy_for_object_type("post_tag", "page");
}

// Title Separator
add_filter("document_title_separator", "ucla_document_title_separator");
function ucla_document_title_separator($sep)
{
  $sep = "|";
  return $sep;
}

// Title
add_filter("the_title", "ucla_title");
function ucla_title($title)
{
  if ($title == "") {
    return "...";
  } else {
    return $title;
  }
}

// Read More Link
add_filter("the_content_more_link", "ucla_read_more_link");
function ucla_read_more_link()
{
  if (!is_admin()) {
    return ' <a href="' .
      esc_url(get_permalink()) .
      '" class="more-link">More on this topic.</a>';
  }
}

// The Excerpt Link
add_filter("excerpt_more", "ucla_excerpt_read_more_link");
function ucla_excerpt_read_more_link($more)
{
  if (!is_admin()) {
    global $post;
    return "";
    return ' <a href="' .
      esc_url(get_permalink($post->ID)) .
      '" class="more-link">More on this topic.</a>';
  }
}

// Filter the excerpt length to 20 words.
function wpdocs_custom_excerpt_length($length)
{
  return 20;
}
add_filter("excerpt_length", "wpdocs_custom_excerpt_length", 999);

// Image Sizing
add_filter("intermediate_image_sizes_advanced", "ucla_image_insert_override");
function ucla_image_insert_override($sizes)
{
  unset($sizes["medium_large"]);
  return $sizes;
}

add_image_size("actual_size", 1427, 280);

// Add Sidebar widget
add_action("widgets_init", "ucla_right_init");
function ucla_right_init()
{
  register_sidebar([
    "name" => esc_html__("Right Sidebar Widget Area", "ucla"),
    "id" => "right-widget-area",
    "before_widget" => '<div class="widget-container %2$s">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widget-title">',
    "after_title" => "</h3>",
  ]);
}

// Add Sidebar widget
add_action("widgets_init", "ucla_footer_init");
function ucla_footer_init()
{
  register_sidebar([
    "name" => esc_html__("Footer Widget", "ucla"),
    "id" => "footer-widget",
    "before_widget" => '<div class="footer-widget-container %2$s">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widget-title">',
    "after_title" => "</h3>",
  ]);
}

/**
 * Function and filters to remove width|height attributes. 
 * https://wordpress.stackexchange.com/questions/22302/how-do-you-remove-hard-coded-thumbnail-image-dimensions
 * https://petragregorova.com/articles/how-to-remove-height-and-width-attributes-from-images-in-wordpress/
 */

function remove_width_attribute( $html ) { 
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); 
  return $html;
}

add_filter("post_thumbnail_html", "remove_width_attribute", 10);
add_filter("image_send_to_editor", "remove_width_attribute", 10);
//add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );


// Filters the returned oEmbed HTML.
// https://developer.wordpress.org/reference/hooks/oembed_dataparse/
add_filter( 'oembed_dataparse', 'remove_width_attribute', 10 );  


/**
 * Add media alternate image sizes besides WP defaults
 * https://developer.wordpress.org/reference/functions/add_image_size/
 * add_image_size( string $name, int $width, int $height, bool|array $crop = false )
 */

add_image_size("square", "600", "600", true);
add_image_size("square_thumb", "300", "300", true);

/** REMOVE wp-emoji **/

remove_action("wp_head", "print_emoji_detection_script", 7);
remove_action("wp_print_styles", "print_emoji_styles");

// https://managewp.com/hack-improve-wordpress-toolbar

add_action("admin_bar_menu", "ucla_ps_edit_toolbar", 999);

function ucla_ps_edit_toolbar($wp_toolbar)
{
  $wp_toolbar->remove_node("updates");
  $wp_toolbar->remove_node("comments");
  //$wp_toolbar->remove_node('wp-logo');
  //$wp_toolbar->remove_node('site-name');
  //$wp_toolbar->remove_node('new-content');
  //$wp_toolbar->remove_node('top-secondary');
}

/**
 * Removes some menus by page.
 */
add_action("admin_menu", "ucla_ps_remove_menus");
function ucla_ps_remove_menus()
{
  remove_menu_page("edit-comments.php");
  remove_menu_page("link-manager.php"); //Comments
  //remove_menu_page( 'index.php' );                  //Dashboard
  //remove_menu_page( 'jetpack' );                    //Jetpack*
  //remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
}

/**
 * PRINT DATE FUNCTIONS
 */

function custom_datetime_object($field_name)
{
  $date = new DateTime($field_name);
  echo $date->format("Ymd");
}

function custom_unixtimestamp($field_name)
{
  $date = new DateTime($field_name);
  echo $date->format("d.m.Y H:i:s");
}

function custom_html_datetime($field_name)
{
  $date = new DateTime($field_name);
  echo $date->format("Y-m-d H:i");
}

function custom_html_date($field_name)
{
  $date = new DateTime($field_name);
  echo $date->format("Y-m-d");
}

function custom_html_time($field_name)
{
  $date = new DateTime($field_name);
  echo $date->format("H:i");
}

function custom_year($field_name)
{
  $date = new DateTime($field_name);
  echo $date->format("Y");
}

function custom_public_date($field_name)
{
  $date = new DateTime($field_name);
  echo $date->format("F j, Y");
}

function custom_public_datetime($field_name)
{
  $date = new DateTime($field_name);
  echo $date->format("F j, Y, g:i a");
}

function custom_public_time($field_name)
{
  $date = new DateTime($field_name);
  echo $date->format("g:i a");
}

function custom_public_date_format($field_name, $format)
{
  //$format = ('l, F j, Y, g:i a');
  $date = new DateTime($field_name);
  echo $date->format($format);
}

// Dashboard Widgets

// Remove WordPress Events & News
add_action("wp_dashboard_setup", "remove_dashboard_widgets");
function remove_dashboard_widgets()
{
  remove_meta_box("dashboard_primary", "dashboard", "side");
  remove_meta_box("dashboard_secondary", "dashboard", "side");
}

//
// add_action('wp_dashboard_setup', 'ucla_custom_dashboard_widgets');

// function ucla_custom_dashboard_widgets()
// {
//     wp_add_dashboard_widget('custom_help_widget', 'UCLA Physical Sciences Web Support', 'custom_dashboard_help');
//     add_meta_box('custom_help_widget', esc_html__('UCLA Physical Sciences Web Support', 'wporg'), 'custom_dashboard_help', 'dashboard', 'side', 'high');
//     // Global the $wp_meta_boxes variable (this will allow us to alter the array).
//     global $wp_meta_boxes;
// }
//
// function custom_dashboard_help()
// {
//     echo '<h2>Welcome to the UCLA Physical Sciences website.</h2>' . '<p>Get started</p>' . '<p><a href="https://github.com/ucla-physicalsciences">UCLA Physical Sciences Github Org</a></p>';
// }

  // Web Component Library Navigation
  class ucla_header_menu_walker extends Walker_Nav_Menu {
    /**
     * @see Walker::display_element()
     * @since 2.5.0
     *
     * @param object $element           Data object.
     * @param array  $children_elements List of elements to continue traversing (passed by reference).
     * @param int    $max_depth         Max depth to traverse.
     * @param int    $depth             Depth of current element.
     * @param array  $args              An array of arguments.
     * @param string $output            Used to append additional content (passed by reference).
     */
    function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output)
    {
      $id_field = $this->db_fields['id'];
      if ( is_object( $args[0] ) ) {
        $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
      }
      return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
  
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      if ( $args->has_children && $depth == 0 ) {
        $item->classes[] = 'nav-primary__link--has-children';
      }
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
      $class_names = $value = '';
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'nav-primary__item menu-item-' . $item->ID;
  
      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
      $output .= $indent . '<li' . $class_names .'>';
  
      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
      $attributes .= ' class="nav-primary__link' . (in_array("current_page_item", $item->classes) || in_array("current-menu-parent", $item->classes) ? ' nav-primary__link--current-page' : '') . '"';
  
      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;
  
      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
  
    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n<ul class=\"nav-primary__sublist\">$indent</li>\n";
    }
  
    /**
     * @see Walker::end_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "$indent</ul>\n";
    }
  
    /**
     * @see Walker::end_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Page data object. Not used.
     * @param int $depth Depth of page. Not Used.
     */
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "</li>\n";
    }
  }
  
  // Add Class to Nav List
  function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->list_class)) {
        $classes[] = $args->list_class;
    }
    return $classes;
  }
  add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
  
  function add_additional_class_on_anchor($classes, $item, $args) {
    if (isset($args->link_class)) {
      $classes['class'] = $args->link_class;
    }
    return $classes;
  }
  add_filter('nav_menu_link_attributes', 'add_additional_class_on_anchor', 1, 3);
 

<?php

show_admin_bar(false);
require_once('wp_bootstrap_navwalker.php');

if ( ! function_exists( 'beacon_setup' ) ) {

    function beacon_setup() {
        /** Make theme available for translation. */
        load_theme_textdomain( 'genisys', get_template_directory() . '/languages' );

        /** Enable support for Post Thumbnails on posts and pages. */
        add_theme_support( 'post-thumbnails' );

        /** This theme uses wp_nav_menu() in one location. */
        register_nav_menus( array(
          'menu-1' => esc_html__( 'Primary menu', 'beacon' ),
          'menu-2' => esc_html__( 'Footer menu', 'beacon' )
        ) );

    }
}
add_action( 'after_setup_theme', 'beacon_setup' );

/*** Enqueue scripts and styles. */
function beacon_scripts() {

  /*** Enqueue styles. */
  wp_enqueue_style('adobe-typekit', 'https://use.typekit.net/pmr4pqg.css', array(), false, 'all');
  wp_enqueue_style('plugins', get_template_directory_uri() . '/css/plugins.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/plugins.css' )), 'all');
  wp_enqueue_style( 'beacon-style', get_stylesheet_uri(), array(), date("ymd-Gis", filemtime( get_stylesheet_directory())));

  /*** Enqueue scripts. */
  wp_enqueue_script('jquery');
  wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/plugins.js' )), true);
  wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/scripts.js' )), true);
}
add_action( 'wp_enqueue_scripts', 'beacon_scripts' );

/*** Register and enqueue a custom stylesheet in the WordPress admin. */
function genisys_scripts_admin() {
    wp_enqueue_style('icon-fonts', get_template_directory_uri() . '/css/icon_fonts.css', array(), false, 'all');
}
add_action( 'admin_enqueue_scripts', 'genisys_scripts_admin' );

/**
 * Custom css
 *
 */ 
function valley_insurance_admin_custom_css() {
    echo '<style type="text/css">#acf-group_5a2badeb476ba .hndle {background: #23275E; color: #FFF;}</style>';
}
add_action('admin_head', 'valley_insurance_admin_custom_css');

/**
 * Dashboard google map api key support.
 */
add_filter('acf/settings/google_api_key', function () {
  $gmap_api = get_field('google_map_api_key', 'options');
    return $gmap_api;
});

/*** ACF OPTIONS PAGE */
if(function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

/*** Reorder dashboard menu */
function reorder_admin_menu( $__return_true ) {
    return array(
         'index.php',                 // Dashboard
         'separator1',                // --Space--
         'acf-options',               // ACF Theme Settings
         'edit.php?post_type=page',   // Pages
         'edit.php',                  // Posts
         'separator2',                // --Space--
         'edit.php?post_type=team',   // Team
         'edit.php?post_type=location',   // Team
         'edit.php?post_type=our_service',// Service
         'edit.php?post_type=our_equipment',// Equipment
         'gf_edit_forms',             // Gravity Forms
         'upload.php',                // Media
         'wpseo_dashboard',           // Yoasta
         'gadash_settings',           // Google Analytics
         'themes.php',                // Appearance
         'edit-comments.php',         // Comments 
         'users.php',                 // Users
         'tools.php',                 // Tools
         'options-general.php',       // Settings
         'plugins.php',               // Plugins
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

/*** Remove dashboard menu */
function remove_admin_menus() {
  remove_menu_page( 'edit.php' );              // Comments
  remove_menu_page( 'edit-comments.php' );              // Comments
  remove_menu_page( 'tools.php' );                      // Tools
  remove_menu_page( 'plugins.php' );                    // Plugings
  remove_menu_page( 'sharethis-general' );          // share this
  remove_menu_page( 'edit.php?post_type=acf-field-group' ); // Custom Field 
  remove_menu_page( 'pods' );                         // Pods Custom post type
}
//add_action( 'admin_menu', 'remove_admin_menus', 999);

/*** GC Color Theme */
function additional_admin_color_schemes() {
  //Get the theme directory
  $theme_dir = get_template_directory_uri();

  //GoingClear
  wp_admin_css_color(
    'goingclear', __('GoingClear'),
    admin_url("css/colors/goingclear/colors.css"),
    array('#8ec652', '#008cc6', '#e5e5e5', '#999'),
    array( 'base' => '#e5f8ff', 'focus' => '#fff', 'current' => '#fff' )
  );
}
add_action('admin_init', 'additional_admin_color_schemes');

/*** Reset GC Color Theme as Default for New Users */
function set_default_admin_color($user_id) {
  $args = array(
      'ID' => $user_id,
      'admin_color' => 'goingclear'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

/*** Remove Login Wiggle */
function remove_login_shake() {
    // remove the wp_shake JavaScript
    remove_action( 'login_head', 'wp_shake_js', 12 );
}
add_action( 'login_head', 'remove_login_shake' );

function custom_header() { 
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '../../../../wp-admin/admin/login.css" />'; 
    echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '../../../../wp-admin/admin/jquery-3.2.1.min.js"></script>';
    echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '../../../../wp-admin/admin/login.js"></script>';
   
}
add_action('login_head', 'custom_header');

/*** Gravity form user role */
function gforms_editor_access() {
    $role = get_role( 'editor' );
    $role->add_cap( 'gform_full_access' );
}
add_action( 'after_switch_theme', 'gforms_editor_access' );

/*** Gravity form anchor */
add_filter( 'gform_confirmation_anchor', '__return_false' );

/*** Limit blog text */
function Limit_Text($text, $limit=30){
  $array = explode( "\n", wordwrap( $text, $limit));
  return $array['0'];
}

function form_submit_button($button, $form){
    return "<button class='btn' id='gform_submit_button_{$form["id"]}'>{$form['button']['text']}</button>";
}
add_filter("gform_submit_button", "form_submit_button", 10, 2);

/*** ACF not working use jquery */
function hide_editor_custom_js() {
    echo '<script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery("#page_template").change( function() {
                    jQuery("#_home_page_options").hide();
                    jQuery("#postdivrich").show();
                    switch( jQuery( this ).val() ) {
                        case "t_home.php":
                          jQuery("#_home_page_options").show();
                          jQuery("#postdivrich").hide();
                        break;
                        case "t_services.php":
                          jQuery("#_home_page_options").show();
                          jQuery("#postdivrich").hide();
                        break;
                        case "t_about.php":
                          jQuery("#_home_page_options").show();
                          jQuery("#postdivrich").hide();
                        break;
                        case "t_equipment.php":
                          jQuery("#_home_page_options").show();
                          jQuery("#postdivrich").hide();
                        break;
                        case "t_contact.php":
                          jQuery("#_home_page_options").show();
                          jQuery("#postdivrich").hide();
                        break;
                    }
                }).change();
            });
        </script>';
}
add_action('admin_head', 'hide_editor_custom_js');

/*** get permalink by template */
function perm_by_temp($t){
  $args = array(
      'post_type' => 'page',
      'posts_per_page' => 1,
      'meta_query' => array(
          array(
              'key' => '_wp_page_template',
              'value' => $t
          )
      )
  );
  $contact_page = new WP_Query( $args );

  if( ! empty( $contact_page->posts ) ) {
      return get_permalink( $contact_page->post->ID );
  }
}

/*** Get all page id */ 
function getPageID() {
  global $post;
  $postid = $post->ID;
  if(is_home() && get_option('page_for_posts')) {
    $postid = get_option('page_for_posts');
  }

  return $postid;
}

/*** Customized header title */
function customizedtitle($title){
  if(is_category() || is_author()){
    return get_the_archive_title();
  } else if( is_search()){
    return sprintf( esc_html__( 'Search Results for: %s', 'beacon' ), '<strong>' . get_search_query() . '</strong>' ); 
  }
  return $title;
}

/*** Breadcrumb */
function beacon_breadcrumb() {

  $delimiter = '<span class="angle-right">></span>';
  $home = 'Home'; 
  $before = '<span class="current-page">'; 
  $after = '</span>'; 

   
  if ( !is_front_page() ) {
   
    echo '<nav class="breadcrumb">';
     
    global $post;
    $homeLink = get_bloginfo('url');
    $blogTitle = get_the_title( get_option( 'page_for_posts' ) );
    $blogLink = get_permalink( get_option( 'page_for_posts' ) );
    echo '<a href="' . home_url() . '">' . $home . '</a> ' . $delimiter . ' ';
     
    if ( is_home() ) {
      echo $before . ' ' . $blogTitle . ' ' . $after;
    } elseif ( is_category() ) {

      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
      echo $before . single_cat_title('', false) . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
     
    } elseif ( is_month() ) {
      echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
     
    } elseif ( is_year() ) {
      echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
      echo $before . get_the_time('Y') . $after;
     
    } elseif ( is_single() && !is_attachment() ) {

      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {

        $cat = get_the_category(); $cat = $cat[0];
        echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
     
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() && !is_search() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
     
    } elseif ( is_attachment() ) {

      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
     
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
    } elseif ( is_page() && $post->post_parent ) {

      $parent_id = $post->post_parent;
       $breadcrumbs = array();
       while ($parent_id) {
       $page = get_page($parent_id);
       $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
       $parent_id = $page->post_parent;
       }
       $breadcrumbs = array_reverse($breadcrumbs);
       foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
       echo $before . get_the_title() . $after;
     
    } elseif ( is_search() ) {
      echo $before . ' ' . $blogTitle . ' ' . $after;
      //echo $before . 'Search Results for: "' . get_search_query() . '"' . $after;
    } elseif ( is_tag() ) {
      echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
      echo $before . 'Posts with the tag "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_tag() ) {
      echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
      echo $before . 'Posts with the tag "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
     
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
       echo ': ' . __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</nav>';
   } 
}
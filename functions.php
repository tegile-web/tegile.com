<?php

// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');
require_once(get_template_directory().'/assets/functions/menu-walkers.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php');

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php');

// Loag custom global vars
// require_once(get_template_directory().'/assets/functions/globals.php');

// IMPORT GLOBAL VARS
foreach(glob(__DIR__."/assets/functions/globals/*.php") as $filename){
    include $filename;
}

// IMPORT CUSTOM POST TYPE DEFINITIONS
foreach(glob(__DIR__."/post-types/*.php") as $filename){
    include $filename;
}

// IMPORT CUSTOM TAXONOMY DEFINITIONS
foreach(glob(__DIR__."/taxonomies/*.php") as $filename){
    include $filename;
}

// Import NASPO Management functions
require_once(get_template_directory().'/assets/functions/naspo-management.php');
add_action( 'init', 'naspo_page_manager' );

// Define our notices array for use globally
$notices = array();

// Function to display notice in Admin Console
function my_error_notice() {

    global $notices;

    foreach ($notices as $note) {

        echo '<div class="'.$note['type'].'"><p><strong>'.$note['msg'].'</strong></p></div>';
    }
}
add_action( 'all_admin_notices', 'my_error_notice' );

// Add a place for the events widget
function events_widgets_init() {
    register_sidebar( array(
        'name' => 'Events List',
        'id' => 'events-list',
        'orderby' => 'post_date',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
}
add_action('widgets_init', 'events_widgets_init');

// Function to ensure all 'Resource Types' use the 'common-resource-template.php' template
function use_common_resource_template( $template ) {

  if ( is_singular( array( 'product_info', 'case_study', 'white_paper', 'video' ) ) ) {

    $locate = locate_template( 'common-resource-template.php', false, false );

    if ( ! empty( $locate ) ) {

      $template = $locate;
    }
  }

  return $template;
}
add_filter( 'template_include', 'use_common_resource_template');

// Function to sort a post query and optionally remove duplicate values
function sort_posts( $posts, $orderby, $order = 'ASC', $unique = true ) {
    if ( ! is_array( $posts ) ) {
        return false;
    }

    usort( $posts, array( new Sort_Posts( $orderby, $order ), 'sort' ) );

    // use post ids as the array keys
    if ( $unique && count( $posts ) ) {
        $posts = array_combine( wp_list_pluck( $posts, 'ID' ), $posts );
    }

    return $posts;
}

// Class used for sort_posts function
class Sort_Posts {
    var $order, $orderby;

    function __construct( $orderby, $order ) {
        $this->orderby = $orderby;
        $this->order = ( 'desc' == strtolower( $order ) ) ? 'DESC' : 'ASC';
    }

    function sort( $a, $b ) {
        if ( $a->{$this->orderby} == $b->{$this->orderby} ) {
            return 0;
        }

        if ( $a->{$this->orderby} < $b->{$this->orderby} ) {
            return ( 'ASC' == $this->order ) ? -1 : 1;
        } else {
            return ( 'ASC' == $this->order ) ? 1 : -1;
        }
    }
}

// Function to build html entities form array key:value pairs
//      $props     = array of key:value pairs to join and form a tag
//      $text      = text to insert inside the result tag
//      $wrapper   = html tag to wrap the results in
//      $glue      = text to insert between the key & value
//      $bumper    = text to insert after the end of each key:value result
//
//      Example:
//                 $tag = '<' . $wrapper . ' key' . $glue . 'value' . '>' . $text . '</' . $wrapper . '>';
//
//      NEED TO REWORK TO DETECT SPECIAL ATTRIBUTES AND SWITCH TEXT & WRAPPER
function compile_html_tag( $props = false, $text = '', $wrapper = false, $glue = '="', $bumper = '" ' ) {

    // If there is no array we can't do anything
    if (!(is_array($props))) {
        return(false);
    }

    $voids = array( 'area', 'base', 'br', 'col', 'hr', 'img', 'input', 'link', 'meta', 'param', 'command', 'keygen', 'source' );

    $tag = ( ($wrapper) ? ('<'.$wrapper.' ') : ('') );

    array_walk( $props, function ( $val, $key, $delims ) {

        $delims['tag'] .= $key.$delims['glue'].$val.$delims['bumper'];
        // $tag .= 'class="sticky" ';
    }, array( 'glue'=>$glue, 'bumper'=>$bumper, 'tag'=>&$tag ));

    if ( in_array($wrapper,$voids) ) {

        // If the wrapper is a void tag then close it here
        $tag .= ' />';

    } elseif ( $wrapper ) {

        // If the wrapper is a regular tag then close it here and insert the filler
        $tag .= '>'.$text.'</'.$wrapper.'>';
    }

    return $tag;
}

// Function to generate button code
function button_generator( $cta, $btn = false, $logo = false ) {

    if ($logo) {

        $txt = compile_html_tag(array(
            'src' => $logo['url'],
            'alt' => $logo['alt'],
        ), '', 'img');
    } else {

        $txt = strtolower($cta['text']);
    }

    $cta = array(
        'href' => strtolower( $cta['url'] ),
        'target' => ( ( ($cta['target'] == 'target="_blank"') && (strpos($cta['url'], '#') !== 0) ) ? ('_blank') : ('_self') ),
        'class' => $cta['class'],
        'options' => array( 'external' => 'external', 'go' => 'go' ),
    );

    if ( !is_array($cta['class']) ) {
        $cta['class'] = array();
    }

    if ($cta['target'] == '_blank') {
        unset($cta['options']['go']);
    } else {
        unset($cta['options']['external']);
    }

    if ($logo) {
        $cta['class'][] = 'button img-button';
    } elseif ($btn) {
        $cta['class'][] = 'button';
        unset($cta['options']['go']);
    }

    $cta['class'] = implode( ' ', array_merge($cta['class'],$cta['options']) );

    unset($cta['options']);

    $domains = array(
        'http://www.tegile.com/',
        'https://www.tegile.com/',
        'http://tegile.com/',
        'https://tegile.com/',
        'http://dev.tegile.com/',
        'https://dev.tegile.com/',
    );

    foreach ($domains as $domain) {

        if ( strpos( $cta['href'], $domain ) !== false ) {

            $cta['href'] = wp_make_link_relative($cta['href']);
            break;
        }
    }

    $cta = compile_html_tag($cta, $txt, 'a');

    return $cta;
}

// Function to replace the select field on the Resource Rollup with all possible resource types
function acf_load_resource_field_choices( $field ) {

    // this is the taxonomy we are filtering for
    $tax = 'use_case';

    // get all post types as objects
    $post_types = get_post_types('','objects');

    // iteratore over post types and remove any that don't use the $tax taxonomy
    foreach( $post_types as $k=>$post_type ){

        $taxonomies = get_object_taxonomies( $k );

        if( !(in_array( $tax, $taxonomies )) ){

            unset($post_types[$k]);
        } else {

            // if they do use the $tax taxonomy, make the array value equal to the pretty name
            $post_types[$k] = $post_type->labels->menu_name;
        }
    }

    // add an 'All' option for the master resources page
    $post_types = array('all'=>'All') + $post_types;

    // reset choices
    $field['choices'] = array();

    // remove any unwanted white space
    $post_types = array_map('trim', $post_types);

    // loop through array and add to field 'choices'
    if( is_array($post_types) ) {

        foreach( $post_types as $k=>$post_type ) {

            $field['choices'][ $k ] = $post_type;

        }

    }

    // return the field
    return $field;

}
add_filter('acf/load_field/name=resource-type', 'acf_load_resource_field_choices');

// Function intended to add a nice separator so that we can see all of our Custom Post Types nicely in the Admin Menu
function make_admin_menu_separator() {

    global $menu;
    $position = 30;

    $menu[ $position ] = array(
        0 => '',
        1 => 'read',
        2 => 'separator' . $position,
        3 => '',
        4 => 'wp-menu-separator'
    );
}
add_action( 'admin_menu', 'make_admin_menu_separator' );

// Function to visually indicate which environment you are on.  Dev is light blue, Prod is bright red
function environment_indicator() {

    $url = $_SERVER['HTTP_HOST'];

    $url = array_shift(explode(".",$url));

    // echo '<pre>' . $url . '</pre>';

    switch ($url) {
        case 'dev':
            $color = '#178aff';
            break;
        default:
            $color = 'red';
            break;
    }

    echo "<style>
    #wpadminbar {
        border-bottom: 3px solid $color;
    }
    </style>";
}
add_action('admin_head', 'environment_indicator');

// Function to put a fancy title in the Title Bar of the Layouts on the edit page
function acf_layout_title( $title, $field, $layout, $i ) {


    // load text sub field
    if( $text = get_sub_field('id') ) {

        $title = '';

        // load sub field image
        // note you may need to add extra CSS to the page t style these elements
        // $title .= '<div class="thumbnail">';

        // if( $image = get_sub_field('image') ) {

            // $title .= '<img src="' . $image['sizes']['thumbnail'] . '" height="36px" />';

        // }

        // $title .= '</div>';

        $title .= '<strong>' . ucwords($text) . '</strong>';

    }


    // return
    return $title;

}
add_filter('acf/fields/flexible_content/layout_title', 'acf_layout_title', 10, 4);

add_filter( 'allow_subdirectory_install',
    create_function( '', 'return true;' )
);

// Function to redirect deactivated sites to /
function tegile_redirect_hidden_sites() {
 
    // Super Admins always get in
    if ( is_super_admin() || current_user_can( 'manage_options' ) ) {
        return true;
    } else {
        // Defines
        if ( defined( 'NOBLOGREDIRECT' ) ) {
            $goto = NOBLOGREDIRECT;
        } else {
            $goto = network_site_url();
        }
 
        $blog = get_blog_details();
 
        if( '1' == $blog-&gt;deleted || '2' == $blog-&gt;deleted || '1' == $blog-&gt;archived || '1' == $blog-&gt;spam ) {
            wp_redirect( $goto );
            die();
        } else {
            wp_redirect( '/vip/' );
            die();
        }
    }
}
add_filter('ms_site_check','tegile_redirect_hidden_sites');

############################################
########## NEW POPUP PLUGIN LOGIC ##########
############################################

// Hooking into wp_footer() to load pop-up logic if needed
//      Need to poll for popups matching the following Display Rules (in order of priority):
//          - Page:
//              - Query String
//              - Page Name
//              - Post Type
//          - User:
//              - GEO
//              - User-Agent
//              - Cookies    $_COOKIE["cookieName"]
//          - Display Order:
//              - Priority
//              - Date Published
function poll_for_popups() {

    require_once __DIR__.'/assets/php/UserAgent/UserAgentParser.php';

    $the_page = array(
        'id'        => get_the_ID(),
        'name'      => get_the_title(),
        'type'      => get_post_type(),
        'url'       => get_permalink(),
        'query'     => $_SERVER['QUERY_STRING'],
    );

    $the_user = array(
        'browser'   => parse_user_agent()['browser'],
        'geo'       => json_decode(file_get_contents("https://freegeoip2.azurewebsites.net/Home/Resolve/".str_replace(".", "-", $_SERVER['REMOTE_ADDR'])))->Location->country_iso_code,
        'referrer'  => $_SERVER['HTTP_REFERER'],
        'cookies'   => $_COOKIE,
    );

    # Get all popups
    $popups = get_posts(array(
        'posts_per_page' => -1,
        'post_type' => 'popups',
        'orderby' => 'date',
        'order' => 'DESC',
        // 'meta_query' => array(
        //     'relation' => 'OR',
        //     array(
        //         'key' => 'hide_resource',
        //         'compare' => 'NOT EXISTS',
        //     ),
        //     array(
        //         'key' => 'hide_resource',
        //         'value' => '0',
        //         'compare' => '==',
        //     ),
        // ),
    ));
    
    // Load Ouibounce script for Popup Launch Functionality if required
    // wp_enqueue_script( 'ouibounce-js', get_template_directory_uri() . 'https://cdnjs.cloudflare.com/ajax/libs/ouibounce/0.0.12/ouibounce.min.js', array( 'jquery' ), '', true );

    $url = $_SERVER['HTTP_HOST'];
    $url = array_shift(explode(".",$url));

    switch ($url) {
        case 'dev':
            echo '<pre>';
            print_r($popups);
            print_r($the_page);
            print_r($the_user);
            echo '</pre>';
            break;
        default:
            // Do Nothing
            break;
    }
}
add_action('wp_footer', 'poll_for_popups');

// Redirect Tag archive pages to blog home-page
// Make sure to make appropriate changes to SEO Ultimate Settings (Meta Robot Tags > Default Values)
 
/* Remove archives */
function remove_wp_archives(){

    // Other checks we can use
    // is_category();
    // is_date();
    // is_author();

    if (is_tag()) {
        $page = '/blog/';
        header("Location: $page",TRUE,301);
    }
}
add_action('template_redirect', 'remove_wp_archives');

?>
<?php

global $hc_settings;

$hc_settings = [
    'location_taxonomy' => 'hc_city_location',
    'state_taxonomy' => 'hc_state_location',
    'location_widget_title' => 'practice_area',
    'parent_location_widget_title' => 'parent_practice_area',
    'faqs_category_taxonomy' => 'hc_faqs',
    'state' => '',
    'stateabbr' => '',
    'phone_number' => '504-766-2200',
    'primary_menu' => "Primary Menu",
    'practice_areas_menu_item' => "",
    'main_practice_area' => 'Personal Injury',
    'main_practice_area_es' => 'Lesiones Personales',
    'is_multiple_state' => false, // please change this to True if the client has pages for multiple states
    'has_spanish_language' => false
];


/*
 *
 * AUTO INCLUDE - BE CAREFUL!
 *
 * */

$autoiclude_folders = [
    '/lib/snippets/',
    '/lib/taxonomy/',
    '/lib/shortcodes/',
    '/lib/widgets/',
];

foreach($autoiclude_folders as $folder) {
    foreach (scandir(dirname(__FILE__) . $folder) as $filename) {
        $path = dirname(__FILE__) . $folder . $filename;
        if (is_file($path)) {
            require_once $path;
        }
    }
}

// include layout
require_once 'lib/layout/layout.php';

// include frontend assets
require_once 'assets/assets.php';

// Return EN on the lang
add_filter( 'locale', function( $default_locale ) {
    return 'en';
});

function strict_transport_security_hsts() {
    header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains; preload' );
}

add_action('send_headers','strict_transport_security_hsts' );


// function create_attorney_post_type() {
//     $labels = array(
//         'name'               => _x( 'Attorneys', 'post type general name'),
//         'singular_name'      => _x( 'Attorney', 'post type singular name'),
//         'menu_name'          => _x( 'Attorneys', 'admin menu'),
//         'name_admin_bar'     => _x( 'Attorney', 'add new on admin bar'),
//         'add_new'            => _x( 'Add New', 'attorney'),
//         'add_new_item'       => __( 'Add New Attorney'),
//         'new_item'           => __( 'New Attorney'),
//         'edit_item'          => __( 'Edit Attorney'),
//         'view_item'          => __( 'View Attorney'),
//         'all_items'          => __( 'All Attorneys'),
//         'search_items'       => __( 'Search Attorneys'),
//         'parent_item_colon'  => __( 'Parent Attorneys:'),
//         'not_found'          => __( 'No attorneys found.'),
//         'not_found_in_trash' => __( 'No attorneys found in Trash.')
//     );

//     $args = array(
//         'labels'             => $labels,
//         'public'             => true,
//         'publicly_queryable' => true,
//         'show_ui'            => true,
//         'show_in_menu'       => true,
//         'query_var'          => true,
//         'rewrite' => array('slug' => 'our-team', 'with_front' => false),
//         'capability_type'    => 'post',
//         'has_archive'        => true,
//         'hierarchical'       => false,
//         'menu_position'      => 5,
//         'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
//         'menu_icon'         => 'dashicons-businessman',
//     );

//     register_post_type( 'attorney', $args );
// }

// add_action( 'init', 'create_attorney_post_type' );


// add_filter('genesis_attr_site-inner', 'add_custom_class_to_site_inner');
// function add_custom_class_to_site_inner($attributes)
// {
//     if(is_page_template('templates/about-us.php')) {
//         if (strpos($attributes['class'], 'main-wrap') !== false) {
//             $attributes['class'] .= ' full-width';
//         }
//     }
//     return $attributes;
// }


// function getYouTubeVideoID($url)
// {
//     $urlParts = parse_url($url);

//     if ($urlParts['host'] == 'youtu.be') {
//         return ltrim($urlParts['path'], '/');
//     } elseif (isset($urlParts['query'])) {
//         parse_str($urlParts['query'], $queryParams);
//         return $queryParams['v'] ?? null;
//     }
//     return null;
// }


add_action('send_headers', 'add_permissions_policy_header');
function add_permissions_policy_header() {
    header("Permissions-Policy: geolocation=(self), microphone=()");
}

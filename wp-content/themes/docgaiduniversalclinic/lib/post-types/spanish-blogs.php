<?php
// add_action('init', 'create_es_blog_post_type');

/*
function create_es_blog_post_type(){
*/
    global $hc_settings;
    if($hc_settings['has_spanish_language']){
        register_taxonomy('es_blog_cat',array('es_blog'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => _x( 'ES Blog Categories', 'taxonomy general name' ),
                'singular_name' => _x( 'ES Blog Category', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search ES Blog Categories' ),
                'all_items' => __( 'All ES Blog Categories' ),
                'parent_item' => __( 'Parent ES Blog Category' ),
                'parent_item_colon' => __( 'Parent ES Blog Category:' ),
                'edit_item' => __( 'Edit ES Blog Category' ), 
                'update_item' => __( 'Update ES Blog Category' ),
                'add_new_item' => __( 'Add New ES Blog Category' ),
                'new_item_name' => __( 'New ES Blog Category Name' ),
                'menu_name' => __( 'Categories' ),
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'es/blog/category', 'with_front' => false),
        ));

        register_post_type('es_blog', array(
            'labels' => array(
                'name' => 'ES Blog Posts',
                'singular_name' => 'ES Blog Post',
                'add_new' => 'Add Blog Post',
                'add_new_item' => 'Add New ES Blog Post',
                'edit_item' => 'Edit ES Blog Post',
                'new_item' => 'New ES Blog Post',
                'view_item' => 'View ES Blog Post',
                'search_items' => 'Find ES Blog Post',
                'not_found' => 'ES Blog Post Not Found',
                'not_found_in_trash' => 'ES Blog Posts Not Found in Trash',
                'parent_item_colon' => '',
                'menu_name' => 'ES Blog Posts',
            ),
            'menu_icon' => 'dashicons-admin-page',
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'thumbnail', 'editor'),
            'rewrite' => array( 'slug' => 'es/blog', 'with_front' => false),
        ));
    }
// }
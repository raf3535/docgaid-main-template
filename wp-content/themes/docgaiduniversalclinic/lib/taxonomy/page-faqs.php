<?php



// add_action('init', function(){

//     global $hc_settings;

    // Adding Taxonomy for FAQs
    register_taxonomy( $hc_settings['faqs_category_taxonomy'],
        array('page'),
        array('hierarchical' => true,
            'labels' => array(
                'name' =>  'FAQ Categories',
                'singular_name' =>  'Category',
                'search_items' =>   'Search Categories',
                'all_items' =>  'All Categories',
                'parent_item' =>  'Parent',
                'parent_item_colon' =>  'Parent:',
                'edit_item' =>  'Edit Category',
                'update_item' =>  'Update Category',
                'add_new_item' =>  'Add New Category',
                'new_item_name' =>  'New Category',
            ),
            'show_admin_column' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'faqs/category', 'with_front' => false ),
            'show_in_rest' => true

        )
    );
// });

add_filter( 'cp_remove_like_query', '__return_false');
<?php
global $hc_settings;

register_taxonomy( $hc_settings['location_taxonomy'],
    array('page'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    array('hierarchical' => true,     /* if this is true, it acts like categories */
        'labels' => array(
            'name' =>  'Page City Location',
            'singular_name' =>  'Location',
            'search_items' =>   'Search Locations',
            'all_items' =>  'All Locations',
            'parent_item' =>  'Parent Location',
            'parent_item_colon' =>  'Parent Location:',
            'edit_item' =>  'Edit Location',
            'update_item' =>  'Update Location',
            'add_new_item' =>  'Add New Location',
            'new_item_name' =>  'New Location Name',
        ),
        'show_admin_column' => true,
        'show_ui' => true,
        'public' => true,
        'query_var' => true,
//        'rewrite' => array( 'slug' => 'hc-city-location' ),
    )
);
if($hc_settings['is_multiple_state']){
    register_taxonomy( $hc_settings['state_taxonomy'],
        array('page'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true, it acts like categories */
            'labels' => array(
                'name' =>  'Page State',
                'singular_name' =>  'State',
                'search_items' =>   'Search State',
                'all_items' =>  'All States',
                'parent_item' =>  'Parent State',
                'parent_item_colon' =>  'Parent State:',
                'edit_item' =>  'Edit State',
                'update_item' =>  'Update State',
                'add_new_item' =>  'Add New State',
                'new_item_name' =>  'New State Name',
            ),
            'show_admin_column' => true,
            'show_ui' => true,
            'public' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'state' , 'with_front' => false ),
        )
    );
}
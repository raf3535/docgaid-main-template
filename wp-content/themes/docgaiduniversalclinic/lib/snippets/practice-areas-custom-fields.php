<?php
// ACF Settings
if( function_exists('acf_add_options_page') ) {

    $parent = acf_add_options_page(array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    // Add sub page.

    acf_add_options_sub_page(array(
        'page_title'  => __('Practice Areas'),
        'menu_title'  => __('Practice Areas'),
        'parent_slug' => $parent['menu_slug'],
    ));


    acf_add_local_field_group( array(
        'key' => 'group_6467c4631ef56',
        'title' => 'Practice Areas List',
        'fields' => array(
            array(
                'key' => 'field_6467c46348214',
                'label' => 'Client Practice Areas',
                'name' => 'client_practice_areas',
                'aria-label' => '',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'table',
                'pagination' => 0,
                'min' => 0,
                'max' => 0,
                'collapsed' => '',
                'button_label' => 'Add Practice Area',
                'rows_per_page' => 20,
                'sub_fields' => array(
                    array(
                        'key' => 'field_6467c47e48215',
                        'label' => 'Practice Area Name',
                        'name' => 'practice_area_name',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '85',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'parent_repeater' => 'field_6467c46348214',
                    ),
                    array(
                        'key' => 'field_655746b58f6f1',
                        'label' => 'Show practice in nav',
                        'name' => 'practice_show_in_nav',
                        'aria-label' => '',
                        'type' => 'radio',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '15',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Show' => 'Show',
                            'Hide' => 'Hide'
                        ),
                        'default_value' => 'Hide',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'parent_repeater' => 'field_6467c46348214',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-practice-areas',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ) );


    $practice_areas_list = [
        '-- None --' => '-- None --'
    ];

    if( have_rows('client_practice_areas', 'option') ){
        while( have_rows('client_practice_areas', 'option') ){
            the_row();
            $pa = get_sub_field('practice_area_name');
            $practice_areas_list[$pa] = $pa;
        }
    }

    acf_add_local_field_group( array(
        'key' => 'group_6467b69ca8a3f',
        'title' => 'Practice Areas',
        'fields' => array(
            array(
                'key' => 'field_6467b69dda1c1',
                'label' => 'Practice Area',
                'name' => 'practice_area',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => $practice_areas_list,
                'default_value' => false,
                'return_format' => 'value',
                'multiple' => 0,
                'allow_null' => 1,
                'ui' => 1,
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_6467b808da1c2',
                'label' => 'Parent Practice Area',
                'name' => 'parent_practice_area',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_6467b69dda1c1',
                            'operator' => '!=empty',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => $practice_areas_list,
                'default_value' => false,
                'return_format' => 'value',
                'multiple' => 0,
                'allow_null' => 1,
                'ui' => 1,
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ) );
}


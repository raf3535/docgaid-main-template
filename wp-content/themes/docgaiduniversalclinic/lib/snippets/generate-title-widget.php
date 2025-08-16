<?php
// Generate widget title field
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_63ff6ab8c5e73',
        'title' => 'Titles Widget Group',
        'fields' => array(
            array(
                'key' => 'field_63ff6ab93e496',
                'label' => 'Hide All Widgets',
                'name' => 'hide_all_widgets',
                'aria-label' => '',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'Show' => 'Show',
                    'Hide' => 'Hide',
                ),
                'default_value' => 'Show',
                'return_format' => 'value',
                'allow_null' => 0,
                'other_choice' => 0,
                'layout' => 'vertical',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_63ff6bba3e499',
                'label' => 'Hide CTA Widget',
                'name' => 'hide_cta_widget',
                'aria-label' => '',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'Show' => 'Show',
                    'Hide' => 'Hide',
                ),
                'default_value' => 'Show',
                'return_format' => 'value',
                'allow_null' => 0,
                'other_choice' => 0,
                'layout' => 'vertical',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_63ff6bdb3e49a',
                'label' => 'Hide Attorney Widget',
                'name' => 'hide_attorney_widget',
                'aria-label' => '',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'Show' => 'Show',
                    'Hide' => 'Hide',
                ),
                'default_value' => 'Show',
                'return_format' => 'value',
                'allow_null' => 0,
                'other_choice' => 0,
                'layout' => 'vertical',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_66ccf2fd9d8cc',
                'label' => 'Is it Rail Road Page?',
                'name' => 'railroad_page',
                'aria-label' => '',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
                'ui' => 1,
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'attorney',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;

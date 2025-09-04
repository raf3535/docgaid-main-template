<?php

/*
* Template Name: Career Single Template
*/

add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');
remove_action('genesis_loop', 'genesis_do_loop', 10);
remove_action('genesis_before_content_sidebar_wrap', 'custom_do_breadcrumbs', 5);
add_action('genesis_loop', 'custom_career_single_content', 10);

function custom_career_single_content()
{

    $contact_img_ai = get_field('contact_image_ai',297);
    $contact_title = get_field('contact_title',76);

    ?>


    <section class="career-single-section">
        
    </section>


<?php
}

genesis();
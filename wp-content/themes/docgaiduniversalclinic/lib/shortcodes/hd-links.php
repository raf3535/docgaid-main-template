<?php

add_shortcode('hd-links',function(){

    global $hc_settings;
    global $post;

    if(!$hc_settings) {
        return "";
    }

    $out = "";

    $types = [
        'Lawyer Serving:' => [
            'meta_key' => $hc_settings['location_widget_title']
        ],
        'FAQ:' => [
            'taxonomy' => $hc_settings['faqs_category_taxonomy']
        ],
        'Blog:' => [
            'taxonomy' => 'category',
            'post_type' => 'post'
        ]
        // add more here
    ];

    
    foreach($types as $header => $type) {

        $args = [
            'post_type' => !empty($type['post_type']) ? $type['post_type'] : 'page',
            'posts_per_page' => -1,
            'orderby' => 'post_title',
            'order' => 'ASC'
        ];

        if(!empty($type['meta_key'])) {
            $args['meta_key'] = $type['meta_key'];
            $args['meta_value'] = $post->post_title;
        } else if(!empty($type['taxonomy']) && $type['taxonomy'] !== 'category') {

           $args[$type['taxonomy']] = $post->post_title;

        } else if(!empty($type['taxonomy']) && $type['taxonomy'] == 'category') {

            $args['category_name'] = $post->post_title;

        } else {
            continue;
        }



        $posts = get_posts($args);

        if($posts) {

            $term_link = false;

            if(!empty($type['taxonomy'])) {

                if($type['taxonomy'] == 'category') {
                    $term_link = get_category_link(get_cat_ID($post->post_title));
                } else {
                    $term = get_term_by('name', $post->post_title, $type['taxonomy']);
                    if($term) {
                        $term_link = get_term_link($term);
                    }
                }

            }

            if($term_link) {
                $out .= "<h2><a href='{$term_link}'>{$post->post_title} {$header}</a></h2>";
            } else {
                $out .= "<h2>{$post->post_title} {$header}</h2>";
            }

            $out .= '<ul>';
            foreach ($posts as $p) {
                $out .= '<li>';
                $out .= '<a title="'.$p->post_title.'" href="'.get_permalink($p->ID).'">';
                $out .= $p->post_title;
                $out .= '</a>';
                $out .= '</li>';
            }
            $out .= '</ul>';
        }
    }

    return $out;

});
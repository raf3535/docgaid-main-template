<?php

add_shortcode('metropolis', function(){
    global $post;
    global $hc_settings;

    $state = preg_replace('/.+?, ([A-Z]{2})/', '$1', $post->post_title);

    ob_start();

    $cur_city_terms = get_the_terms($post->ID, $hc_settings['location_taxonomy']);
    $cur_city = current($cur_city_terms);

    $child = get_children([
        'post_parent' => $post->ID,
        'post_type' => 'page',
        'posts_per_page' => -1
    ]);
    $sorted = [];
    $cities = [];
    foreach($child as $child_item) {
        $city_terms = get_the_terms($child_item->ID, $hc_settings['location_taxonomy']);
        if($city_terms) {
            $city = current($city_terms);
        } else {
            continue;
        }

        $cities[] = $city->name;
    }

    usort($cities, function($a, $b)use($cur_city){
        if($a === $cur_city->name) {
            return -1;
        } else if($b === $cur_city->name) {
            return 1;
        } else {
            return $a > $b ? 1 : -1;
        }
    });

    foreach(array_unique($cities) as $city) {

        $childs = get_posts([
            'post_type' => 'page',
            'posts_per_page' => -1,
            'post_status'=>'publish',
            'post__not_in' => [$post->ID],
            'tax_query' => [
                [
                    'taxonomy' => $hc_settings['location_taxonomy'],
                    'terms' => $city,
                    'field' => 'name'
                ]
            ],
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key' => '_al_hreflang_lang',
                    'value' => 'english'
                ],
                [
                    'key' => '_al_hreflang_lang',
                    'compare' => 'NOT EXISTS'
                ],
            ]
        ]);

        foreach($childs as $cchild) {
            $sorted[$city][] = [
                'url' => get_permalink($cchild->ID),
                'title' => get_post_meta($cchild->ID, $hc_settings['location_widget_title'], true)
            ];
        }
    }

    $i = 0;
    foreach($sorted as $city => $schild) {
        if($city == $cur_city->name) echo "<h2>{$city}, {$state}</h2>";
        if($city !== $cur_city->name) echo "<h3>{$city}, {$state}</h3>";
        echo "<ul style=\"clear: both\" class=\"rs-areas-list\">";

        usort($schild, function($a, $b) use ($hc_settings){
            if($a['title'] == $hc_settings['main_practice_area']) {
                return -1;
            } else if($b['title'] == $hc_settings['main_practice_area']){
                return 1;
            }
            return $a['title'] > $b['title'] ? 1 : -1;
        });

        foreach($schild as $sc) {
            echo "<li><a href=\"".$sc['url']."\">".$sc['title']."</a></li>";
        }

        echo "</ul>";

        $i++;
    }



    $content = ob_get_contents();
    ob_clean();

    return $content;
});
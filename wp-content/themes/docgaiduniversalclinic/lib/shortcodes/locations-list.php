<?php

add_shortcode('locations-list', function(){
    global $post;
    global $hc_settings;

    ob_start();


    $args = [
        'post_type' => 'page',
        'posts_per_page' => -1,
        'meta_key' => $hc_settings['location_widget_title'],
        'meta_value' => $hc_settings['main_practice_area']
    ];

    $locations = get_posts($args);

    $locations_out = [];

    foreach($locations as $p) {
        $tax = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
        if($tax) {
            $tax_single = current($tax);
            $abc = $tax_single->name[0];

            $p->meta_city_name = $tax_single->name;
        } else {
            $abc = "-";

            $p->meta_city_name = "";
        }

        $locations_out[$abc][] = $p;
    }

    ksort($locations_out);

    foreach($locations_out as $k => $loc_arr) {
        echo "<h2>$k</h2><ul>";

        foreach ($loc_arr as $loc) {
            if(property_exists($loc, 'meta_city_name')) {
                echo "<li><a href=\"".get_permalink($loc->ID)."\">{$loc->meta_city_name}, {$hc_settings['stateabbr']}</a></li>";
            }
        }

        echo "</ul>";
    }

    $content = ob_get_contents();
    ob_clean();

    return $content;
});
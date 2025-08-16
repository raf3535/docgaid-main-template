<?php
function find_lawyer_shortcode($atts = null) {

    global $hc_settings;
    global $post;

    $current_wt = get_post_meta($post->ID, $hc_settings['location_widget_title'], true);

    if ($current_wt == $hc_settings['main_practice_area']) {
        return;
    }

    $posts = get_posts([
        'posts_per_page' => -1,
        'post_type' => 'page',
        'meta_key' => $hc_settings['location_widget_title'],
        'meta_value' => $hc_settings['main_practice_area'],
        'orderby' => 'rand'
    ]);

    if(!empty($hc_settings['priority_locations'])) {
        foreach(array_reverse($hc_settings['priority_locations']) as $loc) {
            foreach($posts as $pk => $p) {
                $city_terms = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
                if($city_terms){
                    $city = current($city_terms);

                    if($city->name === $loc) {
                        unset($posts[$pk]);
                        array_unshift($posts, $p);
                    }
                }
            }
        }
    }

    $posts = array_slice($posts, 0, 10);

    ob_start();

    if($posts): ?>
        <h4 class="widget-title">Find Yourself a Passionate Lawyer Now!</h4>
        <ul>
            <?php foreach($posts as $p) {

                $city_terms = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
                if($city_terms) {
                    $city = current($city_terms)->name;
                } else {
                    continue;
                }

                ?>
                <li><a href="<?=get_permalink($p->ID)?>"><?=$city, " {$hc_settings['main_practice_area']} Lawyer Near Me" ?></a></li>
                <?php
            } ?>
        </ul>
    <?php
    endif;

    $content = ob_get_contents();
    ob_clean();
    return $content;

}


add_shortcode('find-lawyer', 'find_lawyer_shortcode');
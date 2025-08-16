<?php

function areas_we_serve($atts = null)
{
    ob_start();
    //BEGIN OUTPUT
    global $hc_settings;

    $parent_id = $hc_settings['areas_we_serve_page']; // set the custom parent ID
    $taxonomy_name = 'hc_city_location'; // set the custom taxonomy name

    global $post;
    $taxonomies = get_taxonomies(); // Get all taxonomies

    if (!empty($taxonomies)) {
        foreach ($taxonomies as $taxonomy) {
            if ($taxonomy == $taxonomy_name) { // Check if the current taxonomy is "hc_city_location"
                $terms = get_terms(array('taxonomy' => $taxonomy));
                if (!is_wp_error($terms) && count($terms) > 0) {
                    echo '<div class="areas-we-serve-page">';
                    foreach ($terms as $term) {
                        // Get all child pages with the current term of the hc_city_location taxonomy
                        $args = array(
                            'post_type' => 'page',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $taxonomy_name,
                                    'field' => 'id',
                                    'terms' => $term->term_id,
                                ),
                            ),
                            'post_parent' => $parent_id,
                            'post_status' => 'publish',
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'nopaging' => true,
                        );
                        $child_pages = get_children($args);

                        // If there are child pages with the current term, display them with the term name
                        if (!is_wp_error($child_pages) && count($child_pages) > 0) {
                            echo '<h2>' . $term->name . '</h2>';
                            echo '<ul>';
                            foreach ($child_pages as $child_page) {
                                echo '<li><a href="' . get_permalink($child_page->ID) . '">' . $child_page->post_title . '</a>';
                                // Check if the child page has child pages of its own
                                $child_args = array(
                                    'post_type' => 'page',
                                    'post_parent' => $child_page->ID,
                                    'post_status' => 'publish',
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                    'nopaging' => true,
                                );
                                $grandchild_pages = get_children($child_args);
                                if (!is_wp_error($grandchild_pages) && count($grandchild_pages) > 0) {
                                    echo '<ul>';
                                    foreach ($grandchild_pages as $grandchild_page) {
                                        echo '<li><a href="' . get_permalink($grandchild_page->ID) . '">' . $grandchild_page->post_title . '</a></li>';
                                    }
                                    echo '</ul>';
                                }
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                    }
                    echo '</div>';
                }
            }
        }
    }

    //END OUTPUT (And actually output it!)
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}


add_shortcode('areas-we-serve', 'areas_we_serve');
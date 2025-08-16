<?php

add_shortcode('sitemap', function () {

    $noindexed = "&exclude=" . implode(",", array_column(get_posts([
        'post_type' => 'page',
        'posts_per_page' => -1,
        'meta_key' => '_yoast_wpseo_meta-robots-noindex',
        'meta_value' => "1"
    ]), "ID"));

    $pages = "<h2>Pages</h2><ul>" . wp_list_pages('title_li=&echo=0' . $noindexed) . "</ul>";

    $posts_li = "";

    foreach (get_categories() as $cat) {

        $posts_li .= "<li><a href='" . get_term_link($cat) . "'><h3>Category: {$cat->name}</h3></a><ul>";

        foreach (
            get_posts([
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'post_title',
                'order' => 'ASC',
                'cat' => $cat->term_id
            ]) as $p
        ) {
            $posts_li .= "<li><a href='" . get_permalink($p->ID) . "'>" . get_the_title($p->ID) . "</a></li>";
        }

        $posts_li .= "</li></ul>";
    }

    $posts = "<h2>Posts</h2><ul>{$posts_li}</ul>";

    $faq_li = "";
    $faq_terms = get_terms([
        'taxonomy' => 'hc_faqs',
        'hide_empty' => true
    ]);

    if (!empty($faq_terms) && !is_wp_error($faq_terms)) {
        foreach ($faq_terms as $term) {
            $faq_li .= "<li><a href='" . get_term_link($term) . "'><h3>FAQ Category: {$term->name}</h3></a><ul>";
            $faq_li .= "</ul></li>";
        }
    }

    $faqs = "<h2>FAQs</h2><ul>{$faq_li}</ul>";

    return $pages . $posts . $faqs;
});

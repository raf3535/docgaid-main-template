<?php
/*
// Breadcrumbs

function filter_yoast_breadcrumb_items($link_output, $link)
{
    $current_url = home_url(strtok($_SERVER["REQUEST_URI"], '?'));

    $link_markup = ($link['url'] === $current_url)
        ? $link['text']
        : '<a href="' . esc_url($link['url']) . '" itemprop="url">' . $link['text'] . '</a>';

    return '<li>' . $link_markup . '</li>';
}

add_filter('wpseo_breadcrumb_single_link', 'filter_yoast_breadcrumb_items', 10, 2);

function doublee_filter_yoast_breadcrumb_output($output)
{

    $output = preg_replace('/<span>(.*?)<\/span>/', '$1', $output);

    return $output;
}

add_filter('wpseo_breadcrumb_output', 'doublee_filter_yoast_breadcrumb_output');

if (function_exists('yoast_breadcrumb')) {
    function custom_do_breadcrumbs()
    {
        remove_action('genesis_before_loop', 'genesis_do_breadcrumbs', 10);
        yoast_breadcrumb('<ol class="breadcrumb" id="breadcrumbs">', '</ol>');
    }

    function wpseo_remove_breadcrumb_link($link_output, $link)
    {
        $breadcrumbsLinkToBeRemoved = ['Attorneys'];
        if (in_array($link['text'], $breadcrumbsLinkToBeRemoved)) {
            $link_output = str_replace('href="' . $link['url'] . '"', '', $link_output);
            $link_output = str_replace('data-wpel-link="internal"', '', $link_output);
        }

        return $link_output;
    }

    add_action('genesis_before_content_sidebar_wrap', 'custom_do_breadcrumbs', 5);
    // Decomment this if you want to make specific breadcrumb links unclickable.
    // add_filter('wpseo_breadcrumb_single_link', 'wpseo_remove_breadcrumb_link', 10, 2);
}

// Add proper breadcrumbs for location pages
function filter_wpseo_breadcrumb_links($crumbs) {
    global $post, $hc_settings;
    
    $original_crumbs = $crumbs;

    $terms = get_the_terms($post->ID, $hc_settings['faqs_category_taxonomy']);

    if(is_singular('page') && $terms) {

        $first = array_shift($crumbs);
        $last = array_pop($crumbs);

        $path = parse_url(get_permalink($post->ID), PHP_URL_PATH);

        $path_arr = array_filter(explode('/', $path));

        $parent_page_path = array_shift($path_arr);

        $location_posts = get_posts([
            'post_type' => 'page',
            'posts_per_page' => -1,
            'meta_query' => [
                [
                    'key' => $hc_settings['location_widget_title'],
                    'compare' => 'EXISTS'
                ]
            ]
        ]);

        $post_needed = null;

        foreach ($location_posts as $location_post) {
            if(get_permalink($location_post->ID) === home_url("/$parent_page_path/")) {
                $post_needed = $location_post;
                break;
            }
        }
        
        if(!$post_needed) {
            return $original_crumbs;
        }

        $crumbs = [];

        $crumbs[] = $first;
        $crumbs[] = [
            'url' => get_permalink($post_needed->ID),
            'text' => $post_needed->post_title,
            'id' => $post_needed->ID
        ];
        $crumbs[] = $last;

        return $crumbs;
    }

    if(is_tax($hc_settings['faqs_category_taxonomy'])) {
        $add_crumbs = [
            [
                'text' => 'Frequently Asked Questions',
                'url' => site_url('/faqs/')
            ]
        ];
        array_splice($crumbs, -1, 0, $add_crumbs);
    }

    if(is_search()) {
        if(is_paged()) {
            $add_crumbs = [
                [
                    'text' => 'Search Results'
                ]
            ];
            array_splice($crumbs, 1, -1, $add_crumbs);
        } else {
            $add_crumbs = [
                [
                    'text' => 'Search Results'
                ]
            ];
            array_splice($crumbs, 1, 1, $add_crumbs);
        }
    }

    return $crumbs;
}
add_filter( 'wpseo_breadcrumb_links', 'filter_wpseo_breadcrumb_links', 10, 1 );

add_filter( 'wpseo_breadcrumb_links', 'hd_change_location_breadcrumbs' );
function hd_change_location_breadcrumbs($links)
{
    global $hc_settings;
    $count = 0;
    foreach ($links as $k => $link) {
        if (isset($link['id'])) {
            if ($widget_title = get_field($hc_settings['location_widget_title'], $link['id'])) {
                $count++;
                if ($count > 2) {
                    $links[$k] = [
                        'url' => $links[$k]['url'],
                        'text' => $widget_title
                    ];
                }else{
                    $city = get_the_terms($links[$k]['id'], $hc_settings['location_taxonomy']) ? current(get_the_terms($links[$k]['id'], $hc_settings['location_taxonomy'])) : false;
                    if($city){
                        $city = $city->name;
                        $widget_title = "$city $widget_title Lawyer";
                        $links[$k] = [
                            'url' => $links[$k]['url'],
                            'text' => $widget_title
                        ];
                    }
                }
            }
        }
    }
    return $links;
}

function change_attorney_to_our_team_breadcrumbs($crumbs) {
    foreach ($crumbs as &$crumb) {
        if ($crumb['text'] === 'Attorney' || $crumb['text'] === 'Attorneys') {
            $crumb['text'] = 'Our Team';
            $crumb['url'] = home_url('/our-team/');
        }
    }
    return $crumbs;
}
add_filter('wpseo_breadcrumb_links', 'change_attorney_to_our_team_breadcrumbs', 10, 1);

function custom_change_breadcrumb_name($crumbs) {
    global $post;

    $specific_pages = array(847, 1454, 786, 848, 901, 862, 1773, 854); 

    foreach ($crumbs as &$crumb) {
        if ($crumb['text'] === 'FELA Lawyer') {
            if (in_array($post->ID, $specific_pages)) {
                $crumb['text'] = 'Railroad Injury Lawyer';
            }
        }
    }

    return $crumbs;
}

add_filter('wpseo_breadcrumb_links', 'custom_change_breadcrumb_name');
*/
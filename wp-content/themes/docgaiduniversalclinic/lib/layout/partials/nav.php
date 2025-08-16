<?php

function custom_remove_nav() {
    remove_action('genesis_after_header', 'genesis_do_nav', 10);
    remove_action('genesis_after_header', 'genesis_do_subnav', 10);

    genesis_do_nav();
}

function prepareMenuNameForAppendXML($name){
    return str_replace("&" , "&amp;" , $name);
}

add_action('genesis_header', 'custom_remove_nav', 12);


// DYNAMIC NAV MENU

function getElementsByClass(&$parentNode, $tagName, $className) {
    $nodes=array();

    $childNodeList = $parentNode->getElementsByTagName($tagName);
    for ($i = 0; $i < $childNodeList->length; $i++) {
        $temp = $childNodeList->item($i);
        if (stripos($temp->getAttribute('class'), $className) !== false) {
            $nodes[]=$temp;
        }
    }

    return $nodes;
}
// local menu items in header
add_filter( 'wp_nav_menu', 'filter_function_name_1676', 10, 2 );
function filter_function_name_1676( $nav_menu, $args ){
    global $hc_settings;

    if(is_object($args->menu) && $args->menu->name === $hc_settings['primary_menu'] || (is_string($args->menu) && $args->menu === $hc_settings['primary_menu'])) {
        global $post;

        $terms = get_the_terms( $post->ID, $hc_settings['location_taxonomy']);

        if(!$terms || !is_singular()) {
            return $nav_menu;
        }


        if($terms) {
            $city = current($terms)->name;

            $piurl = strtolower(str_replace(' ', '-', $city).'-personal-injury-lawyer/');

            $url_exist = get_posts([
                'post_type' => 'page',
                'meta_key' => $hc_settings['location_widget_title'],
                'meta_value' => $hc_settings['main_practice_area'],
                'tax_query' => array(
                    array(
                        'taxonomy' => $hc_settings['location_taxonomy'],
                        'field' => 'slug',
                        'terms' => current($terms)->slug
                    ),
                ),
            ]);

            if(count((array)$url_exist)) {
                $html = "<a href='".get_the_permalink($url_exist[0]->ID)."'>$city Practice Areas</a><ul class='sub-menu dynamic-sub-menu'>";

            }else {

                $html = "<a href='#'>$city Practice Areas</a><ul class='sub-menu dynamic-sub-menu'>";

            }

            $children = get_posts([
                'posts_per_page' => -1,
                'post_type' => 'page',
                'post_status' => 'publish',
                'tax_query' => [
                    [
                        'taxonomy' => $hc_settings['location_taxonomy'],
                        'terms' => [current($terms)->term_id]
                    ]
                ]
            ]);

            $practice_repeater = get_field('client_practice_areas', 'option');
            $main_prc = array();
            if ($practice_repeater) {
                foreach ($practice_repeater as $practice_item) {
                    $practice_name = $practice_item['practice_area_name'];
                    $practice_show_nav = $practice_item['practice_show_in_nav'];
                    if($practice_show_nav === 'Show') {
                        $main_prc[] = $practice_name;
                    }
                }
            }

            $children = array_filter($children, function($c)use($main_prc,$hc_settings){
                return in_array(get_post_meta($c->ID, $hc_settings['location_widget_title'], true), $main_prc);
            });

            usort($children, function($a, $b){
                return $a->post_title > $b->post_title ? 1 : -1;
            });
            
            if(count($children) < 2){
                return $nav_menu;
            }

            foreach($children as $child) {
                $html .= '<li><a href="'.get_permalink($child->ID).'">'.prepareMenuNameForAppendXML(get_post_meta($child->ID, $hc_settings['location_widget_title'], true)).'</a></li>';
            }


            $html .= "</ul>";

            $doc = new DOMDocument();

            $doc->loadHTML(htmlspecialchars_decode(iconv('UTF-8', 'ISO-8859-1//TRANSLIT', htmlentities($nav_menu, ENT_COMPAT, 'UTF-8')), ENT_QUOTES), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $content_node=$doc;

            $element = getElementsByClass($content_node, 'li', $hc_settings['practice_areas_menu_item']);
            if($element) {
                $element = current($element);
                if(count($children) < 8 ){
                    $classes = $element->getAttribute("class");
                    $element->setAttribute("class" , $classes.  " one-per-row");
                }else{
                    $classes = $element->getAttribute("class");
                    $element->setAttribute("class" , $classes.  " two-per-row");
                }
            }
            if(isset($element) && count((array)$element)){

                while($element->childNodes->length){
                    $element->removeChild($element->firstChild);
                }

                $fragment = $doc->createDocumentFragment();
                $fragment->appendXML($html);
                $element->appendChild($fragment);
            }

            $html = $doc->saveHTML();

            if($html) $nav_menu = $html;

        }
    }

    return $nav_menu;
}

// END DYNAMIC NAV MENU
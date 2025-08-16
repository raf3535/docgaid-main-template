<?php
// adding CTA's

if (!function_exists('hd_generate_cta')) {
    function hd_generate_cta()
    {
        global $post;
        global $hc_settings;

        $terms = get_the_terms($post->ID, $hc_settings['location_taxonomy']); // get page location term (city)

        $phoneNumber = $hc_settings['phone_number']; // get phone number

        $cta = [];

        //if no city, its not single blog post and its not FAQ page - then return content without CTA's

        if (!$terms && !is_singular('post') && !has_term('', $hc_settings['faqs_category_taxonomy'])) {
            return [];
        } else if ($terms) {

            $terms = current($terms); //get single term from $terms array

            $page_h1 = str_ireplace('lawyer', '', $terms->name . " " . get_the_title($post->ID));

            // wrapping it in CTA with phone number
            // $cta[1] = '<p class="rs-content-cta">' . $page_h1 . ' Lawyer Near Me <a href="tel:+1' . preg_replace("/[^0-9]/", "", $hc_settings['phone_number']) . '">' . $phoneNumber . '</a></p>';

            // getting location widget title - e.q. "Car Accidents"
            $short = get_post_meta($post->ID, $hc_settings['location_widget_title'], true);

            if ($short) {
                //if exists - making it singular and combining with location
                $short = str_replace(['Accidents', 'Bites'], ['Accident', 'Bite'], $short);
                // $cta[1] = '<p class="rs-content-cta">' . $terms->name . ' ' . $short . ' Lawyer Near Me <a href="tel:+1' . preg_replace("/[^0-9]/", "", $hc_settings['phone_number']) . '">' . $phoneNumber . '</a></p>';
            }
        }

        // default first CTA link for non-location pages - like blog, faq
        $cta_third_add = '<a href="/">' . strtolower($hc_settings['main_practice_area']) . ' lawyers</a>';
        $cta_first_add = ',';

        if ($terms && $post->post_parent !== 0) {
            // FOR LOCATION PAGES: get parent page title and link - e.q. "Personal Injury"
            $link = get_permalink($post->post_parent);
            // make lawyer plural
            $title = str_replace('Lawyer', 'Lawyers', get_the_title($post->post_parent));

            // this is for metropolis-specific pages e.q. "Fort Lauderdale, FL"
            if ($title == 'Areas We Serve') {
                $link = '/';
                $title = $hc_settings['state'] . ' ' . $hc_settings['main_practice_area'] . ' Lawyers';
            }

            //modify CTA on location pages with parent page correctly set
            $cta_third_add = '<a href="' . $link . '" title="' . $title . '">' . $title . '</a>';

            $widget_title = strtolower(get_post_meta($post->ID, $hc_settings['location_widget_title'], true));

            $cta_first_add = ' with ' . (in_array($widget_title[0], ['a', 'e', 'i', 'o', 'u']) ? 'an' : 'a') . " {$widget_title} lawyer serving {$terms->name},";
        } else if ($terms && $post->post_parent == 0) {
            $cta_third_add = '<a href="/">' . strtolower($hc_settings['main_practice_area']) . ' lawyers</a>';
            $cta_first_add = " with a {$hc_settings['main_practice_area']} lawyer serving {$terms->name},";
        }

        $cta[0] = '
            <div class="rs-content-cta rs-content-cta-small first-cta">
                <div class="row">
                       <div class="col-lg-12">
                            <h3 class="col-lg-8"> Don’t Get Railroaded <sup>®</sup> </h3>
                            <p class="col-lg-8">Contact Our Experienced Attorneys Today to Get Back On The Right Track.</p>
                       </div>
                        <div class="phone">
                        <svg xmlns="http://www.w3.org/2000/svg" width="59" height="59" viewBox="0 0 59 59" fill="none">
                            <g clip-path="url(#clip0_1_985)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.91856 2.01311C7.56077 1.37186 8.33193 0.874425 9.18093 0.553756C10.0299 0.233088 10.9374 0.0965115 11.8432 0.153079C12.7489 0.209647 13.6323 0.458066 14.4349 0.881875C15.2374 1.30568 15.9406 1.8952 16.4981 2.61137L23.0863 11.0751C24.2938 12.6277 24.7196 14.65 24.2424 16.5586L22.2348 24.5965C22.131 25.0129 22.1366 25.449 22.2511 25.8625C22.3655 26.276 22.585 26.6529 22.8881 26.9566L31.906 35.9745C32.2101 36.2782 32.5876 36.4981 33.0018 36.6125C33.416 36.727 33.8529 36.7323 34.2697 36.6278L42.304 34.6202C43.2459 34.3847 44.229 34.3664 45.1789 34.5667C46.1289 34.767 47.0209 35.1806 47.7875 35.7763L56.2512 42.3609C59.2939 44.7282 59.5729 49.2243 56.8495 51.944L53.0544 55.7391C50.3384 58.4552 46.279 59.648 42.4949 58.3157C32.8096 54.9079 24.0159 49.3632 16.766 42.0929C9.49618 34.8441 3.95151 26.0517 0.543226 16.3677C-0.785427 12.5873 0.407424 8.52424 3.12346 5.80821L6.91856 2.01311Z" fill="white"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_1_985">
                                <rect y="0.137695" width="58.725" height="58.725" rx="24.3" fill="white"/>
                                </clipPath>
                                </defs>
                        </svg>
                            <a href="tel:+1' . preg_replace("/[^0-9]/", "", $hc_settings['phone_number']) . '">' . $hc_settings['phone_number'] . ' </a>
                            </div>
                            <img src="' . CHILD_URL . '/assets/app/img/railroadguy.webp' . '" alt="railroad guy" class="railroadguy">
                        </div>
                </div>';
        $cta[2] = '
            <div class="second-cta">
                <img src="' . CHILD_URL . '/assets/app/img/second-cta.webp' . '" alt="podcast cta" class="second-cta__img">
                <div class="second-cta__content">
                    <h3 class="col-lg-6 col-xxl-8"> Listen To The Stay On Track Podcast </h3>
                <a href="https://podcasts.apple.com/pg/podcast/stay-on-track-podcast-with-poolson-oden-law-firm/id1712187316">
                    <img src="' . CHILD_URL . '/assets/app/svg/itunes.svg' . '" alt="itunes cta">
                </a>
                <a href="https://open.spotify.com/show/3fsZUIYnandJShsCMLWxRu?si=0ebbe63af6214ad0&nd=1&dlsi=51725d3a00d24c42">
                    <img src="' . CHILD_URL . '/assets/app/svg/spotify.svg' . '" alt="spotify cta">
                </a>
                </div>
            </div>
        ';

        $cta[3] = '
            <div class="third-cta">
                <div class="row">
                    <div class="col-lg-7 p-3 ps-4">
                        <h3> Let’s Get You back On Track. </h3>
                        <a href="' . site_url('/contact/') . '" class="btn-global mx-auto mx-lg-0">SPEAK WITH AN ATTORNEY TODAY</a>
                    </div>
                    <div class="col-lg-5">
                        <img class="third-cta__img d-none d-lg-block" src="' . CHILD_URL . '/assets/app/img/third-cta.webp' . '" alt="podcast cta">
                    </div>
                </div>
            </div>
        ';
        return $cta;
    }
}

add_filter('the_content', function ($content) {
    $cta_array = hd_generate_cta();

    if (!$cta_array) {
        return $content;
    }

    list($cta_first, $cta_second, $cta_third, $cta_fourth, $cta_last) = $cta_array;

    // matching all h2 in post_content, getting its offset
    preg_match_all('/<h2(.*)>/', $content, $h2_matches, PREG_OFFSET_CAPTURE);

    // if no h2 in content - matching other headers
    if (count($h2_matches[0]) <= 2) {
        preg_match_all('/<h(2|3|4)(.*)>/', $content, $h2_matches, PREG_OFFSET_CAPTURE);
    }
    // if no other headers in article - matching <p> tags with 300+ symbols between <p> and </p>
    if (count($h2_matches[0]) <= 1) {
        preg_match_all('/<p(.*)>.{300,}<\/p>/', $content, $h2_matches, PREG_OFFSET_CAPTURE);

        // if more than two <p> matched - exclude first match
        if (count($h2_matches[0]) > 2) {
            array_shift($h2_matches[0]);
        }
    }

    // including CTA's just before matched headers or <p>'s
    if (count($h2_matches[0]) > 1) {
        foreach (array_reverse($h2_matches[0]) as $k => $h2_match) {

            $k = count($h2_matches[0]) - $k - 1;

            if ($h2_match[1] && $k == 1) {
                $content = substr_replace($content, $cta_first, $h2_match[1], 0);
            }

            if ($h2_match[1] && $k == 2 && $cta_second) {
                $content = substr_replace($content, $cta_second, $h2_match[1], 0);
            }

            if ($h2_match[1] && $k == 3) {
                $content = substr_replace($content, $cta_third, $h2_match[1], 0);
            }

            if ($h2_match[1] && $k == 4) {
                $content = substr_replace($content, $cta_fourth, $h2_match[1], 0);
            }
        }
    }

    $content .= $cta_last;

    return $content;
});

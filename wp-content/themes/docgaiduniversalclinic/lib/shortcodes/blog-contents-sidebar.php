<?php

function hd_custom_blog_sidebar() {
    
    $content = get_the_content();
    $title_widgets = get_field('hide_the_widget_for_the_whole_site', 'option');
    $cta_widget = get_field('hide_the_cta_widget_for_the_whole_site', 'option');
    $attorney_widget = get_field('hide_the_attorney_widget_for_the_whole_site', 'option');
    if(!$content) {
        return;
    }
    $doc = new DOMDocument('1.0', 'utf-8');
    
    libxml_use_internal_errors(true);
    ob_start();
   
    $doc->loadHTML(htmlspecialchars_decode(iconv('UTF-8', 'ISO-8859-1//TRANSLIT', htmlentities($content, ENT_COMPAT, 'UTF-8')), ENT_QUOTES));

    if(get_field('hide_all_widgets') !== 'Hide' && $title_widgets !== 'Hide') {
        $title = 'On This Page';
        $titles_to_display = 6;

        if (count($doc->getElementsByTagName('h2'))):
            echo '<div id="blogSidebar" class="blogSidebar">';
            echo '<div class="contents">' . $title . '</div>';
            echo '<ol>';

            $counter = 0;

            foreach ($doc->getElementsByTagName('h2') as $node) { 
                if ($counter >= $titles_to_display) {
                    break; 
                }
                ?>
                <li><span class="scrollToElements" onclick="scrollToElement('<?= $node->nodeValue ?>')"><?= $node->nodeValue ?></span></li> 
                <?php
                $counter++;
            }
            echo '</ol>';
            if (get_field('hide_cta_widget') !== 'Hide' && $cta_widget !== 'Hide') {
            //     echo '<div class="sidebar-cta mt-2">
            //        <div class="sidebar-cta-title">
            //           <p><strong>Get Free Advice</strong> About <br>The Compensation <br>You Deserve</p>
            //           <a href="' . site_url('/contact-us/') . '" title="Have a case?" class="btn-global">Have a case?</a>
            //        </div>
            //  </div>';
            }
            if (get_field('hide_attorney_widget') !== 'Hide' && $attorney_widget !== 'Hide') {
                // echo '<div class="sidebar-cta mt-3">
                //         <div class="sidebar-cta-trust">
                //             <div class="trust-thumb">
                //                 <img src="'.CHILD_URL.'/assets/app/img/default-thumb.jpg" alt="Hennessey Boilerplate" title="Hennessey Boilerplate" width="75" height="75">
                //             </div>
                //             <div class="trust-meta">
                //                 <span>LEGALLY REVIEWED BY</span>
                //                 <h4>Attorney Name</h4>';

                //                 $post_date = get_the_date('Y-m-d');
                //                 $current_year = date('Y');
                //                 $random_date_key = 'legally_reviewed_by_date';
                //                 $random_date = get_post_meta(get_the_ID(), $random_date_key, true);
                //                 $year_diff = $current_year - intval(substr($post_date, 0, 4));

                //                 if ($year_diff > 2) {
                //                     if (empty($random_date) || ($current_year - intval(substr($random_date, 0, 4)) > 2)) {
                //                         $random_date = date('Y-m-d', strtotime('-3 months +' . mt_rand(0, 89) . ' days'));
                //                         update_post_meta(get_the_ID(), $random_date_key, $random_date);
                //                     }
                //                 } else {
                //                     $random_date = $post_date;
                //                 }
                //                 echo '<span>' . date('F', strtotime($random_date)) . ' ' . date('m', strtotime($random_date)) . ', ' . date('Y', strtotime($random_date)) . '</span>';
                        
                //             echo'</div>
                //             <div class="trust-cta">
                //                 <a href="'.site_url('/contact-us/').'" class="btn-global" title="Trusted Content">Trusted Content</a>
                //             </div>
                //         </div>
                //     </div>';
            }
            echo '</div>';
            ?>
            <script>
                function scrollToElement(el) {
                    var header = jQuery('.header').height() + 10;
                    
                    if(jQuery('body').hasClass('admin-bar')) {
                        header = jQuery('.header').height() + 45;
                    }
                    jQuery('h2').each(function () {
                        if (jQuery(this).text() == el) {
                            jQuery('html, body').animate({
                                scrollTop: jQuery(this).offset().top - header
                            }, 500);
                            jQuery('#blogSidebar .scrollToElements').removeClass('active');
                        }
                    });
                }
                jQuery(window).on('scroll', function() {
                    var elementText = "";
                    var theLatestScrolledElemenet = -999999;
                    jQuery('h2').each(function() {
                        var currentH2ScrollValue = jQuery(this).offset().top - jQuery(window).scrollTop() - 210;
                        if(currentH2ScrollValue < 0 && currentH2ScrollValue > theLatestScrolledElemenet){
                            theLatestScrolledElemenet = currentH2ScrollValue;
                            elementText = jQuery(this).text();
                        }
                    });
                    var found = false;
                    jQuery('#blogSidebar .scrollToElements').each(function() {
                        if(elementText == jQuery(this).text()) {
                            found = true;
                            jQuery(this).addClass('active');
                        } else{
                            jQuery(this).removeClass('active');
                        }
                    });
                    if(!found){
                        jQuery('#blogSidebar .scrollToElements').removeClass('active');
                    }
                    var hero = jQuery('.internal-hero-wrap').height();
                    var header = jQuery('.header').height();
                    var heightScroll = hero + header - 15;
                    console.log(heightScroll);
                    var content = jQuery('main.content').height();
                    var heightContent = content + heightScroll;
                    
                    var sidebarWidget = jQuery('#blogSidebar');
                    if(jQuery(window).scrollTop() > heightScroll) {
                        sidebarWidget.addClass('sidebar-active');
                        if(jQuery(window).scrollTop() >= (heightContent - sidebarWidget.height()) - 25) {
                            sidebarWidget.addClass('sidebar-active-bottom');
                        } else {
                            sidebarWidget.removeClass('sidebar-active-bottom');
                        }
                    } else {
                        sidebarWidget.removeClass('sidebar-active');
                    }
                });
            </script>
            <?php
            add_filter('genesis_attr_content', 'toc_is_active');
        endif;
    }
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function toc_is_active($attributes) {
    $attributes['class'] .= ' toc-active';
    return $attributes;
}

add_shortcode('hd_blog_sidebar', 'hd_custom_blog_sidebar');
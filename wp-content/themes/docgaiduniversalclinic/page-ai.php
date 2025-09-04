<?php

/*
* Template Name: Ai Template
*/

add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');
remove_action('genesis_loop', 'genesis_do_loop', 10);
remove_action('genesis_before_content_sidebar_wrap', 'custom_do_breadcrumbs', 5);
add_action('genesis_loop', 'custom_ai_content', 10);

function custom_ai_content()
{
    $title_billing  = get_field('title_billing');
    $text_billing   = get_field('text_billing');
    $button_billing = get_field('button_billing');
    $document_title = get_field('document_title');
    $document_subtitle = get_field('document_subtitle');
    $document_small_title = get_field('document_small_title');
    $advantage_subtitle = get_field('advantage_subtitle');
    $title_using = get_field('title_using');
    $partner_title = get_field('partner_title',76);
    $partner_content = get_field('partner_content',76);
    $faq_title = get_field('faq_title',76);
    $comments_title = get_field('comments_title',76);
    $contact_title = get_field('contact_title',76);
    $contact_img_ai = get_field('contact_image_ai');



    ?>

    <section class="billing-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="billing-content text-center">
                        <h2 class="billing-title text-white"><?php echo wp_kses_post($title_billing); ?></h2>
                        <p class="billing-text text-white"><?php echo wp_kses_post($text_billing); ?></p>
                        <button class="billing-button text-white"><?php echo esc_html($button_billing); ?></button>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <section class="billing-blocks">
        <div class="container">
            <div class="row justify-content-center">
                <?php while(have_rows('billing_block')): the_row(); ?>
                    <div class="col-lg-4 col-md-10 col-12 p-0">
                        <div class="in-col-billing text-center">
                            <?php $block_image = get_sub_field('block_image'); if($block_image) { ?>
                                <img src="<?= $block_image['url']; ?>" alt="<?= $block_image['alt']; ?>" class="block-image">
                            <?php } ?>
                            <p class="text-white block-title"><?php the_sub_field('block_title'); ?></p>
                            <p class="text-white block-content"><?php the_sub_field('block_content'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <section class="documents-section">
        <div class="container">
            <?= $document_title ?>
            <div class="row justify-content-around">
                <div class="col-lg-5 col-12">
                    <div class="in-col-documents">
                        <p class="document-subtitle"><?= $document_subtitle ?></p>
                        <hr class="orange-line">
                        <p class="document-small-title orange-text"><?= $document_small_title ?></p>
                        <?php if( have_rows('document_content') ): ?>
                            <ul class="document-list">
                                <?php while( have_rows('document_content') ): the_row(); ?>
                                    <?php the_sub_field('content_list'); ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <img loading="lazy" data-lazy="http://localhost:8888/wordpress/wp-content/uploads/2025/08/Group-890.png" src="http://localhost:8888/wordpress/wp-content/uploads/2025/08/Group-890.png" class="document-image w-100" alt="Document Image">
                </div>
            </div>
            <div class="row justify-content-around" style="margin-top: 80px;">
                <div class="col-lg-5 col-12">
                    <img loading="lazy" data-lazy="http://localhost:8888/wordpress/wp-content/uploads/2025/08/Group-892.png" src="http://localhost:8888/wordpress/wp-content/uploads/2025/08/Group-892.png" class="document-image w-100" alt="Document Image">
                </div>
                <div class="col-lg-5 col-12">
                    <div class="in-col-documents">
                        <p class="document-subtitle"><?= $advantage_subtitle ?></p>
                        <hr class="orange-line">
                        <?php if( have_rows('advantage_content') ): ?>
                            <ul class="document-list">
                                <?php while( have_rows('advantage_content') ): the_row(); ?>
                                    <?php the_sub_field('advantage_list'); ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        <button class="billing-button text-white">Demo anfragen</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="using-easy">
        <div class="container">
            <?= $title_using ?>
            <div class="row justify-content-around">
            <?php if( have_rows('blocks_using') ): ?>
                <?php while( have_rows('blocks_using') ): the_row(); ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="in-col-using text-center">
                            <p class="big-number-use"><?php the_sub_field('big_number_block'); ?></p>
                            <p class="title-block-using"><?php the_sub_field('title_block_use'); ?></p>
                            <hr class="orange-line">
                            <p class="content-block-use"><?php the_sub_field('content_block_use'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
            <div class="d-flex justify-content-center">
                <button class="long-btn-use text-white">Unverbindliche Beratung anfordern</button>
            </div>
        </div>
    </section>

    <section class="partners-section" id="partners-section">
        <div class="container">
            <div class="in-partner-div d-flex justify-content-center text-center wow animate__animated animate__fadeInDown">
                <div class="textes-center">
                    <p class="title-partner text-uppercase"><?= $partner_title ?></p>
                    <p class="sm-partner-text"><?= $partner_content ?></p>
                </div>
            </div>

            <div class="margin-carousel wow animate__animated animate__fadeInUp">
            <div class="mobile-margin">
                <div class="swiper partnerSwiper2">
                <div class="swiper-wrapper">
                    <?php while (have_rows('partner_images',76)) : the_row(); ?>
                    <?php $partner_single_img = get_sub_field('partner_single_img',76); ?>
                    <?php if ($partner_single_img) { ?>
                        <div class="swiper-slide">
                        <img src="<?= $partner_single_img['url']; ?>" alt="<?= $partner_single_img['alt']; ?>" class="partner-img-sizes">
                        </div>
                    <?php } ?>
                    <?php endwhile; ?>
                </div>

                <div class="swiper-button-prev swiper-button-prev-partner"></div>
                <div class="swiper-button-next swiper-button-next-partner"></div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="comment-section">
    <div class="container mt-5 wow animate__animated animate__fadeInUp">
        <?= $comments_title ?>

        <?php if (have_rows('commenter_blocks',76)): ?>
        <?php $count = count(get_field('commenter_blocks',76)); ?>

        <!-- Swiper -->
        <div class="swiper comments" data-count="<?= $count; ?> ">
            <div class="swiper-wrapper">
                <?php while (have_rows('commenter_blocks',76)): the_row(); ?>
                <div class="swiper-slide wow animate__animated animate__fadeInUp">
                    <div class="review-card">
                        <p class="review-text"><?php the_sub_field('comment',76); ?></p>

                        <div class="review-footer">
                            <div class="review-user">
                                <?php $commenter_img = get_sub_field('commenter_img',76); ?>
                                <?php if ($commenter_img): ?>
                                    <img class="user-img" src="<?= esc_url($commenter_img['url']); ?>" alt="<?= esc_attr($commenter_img['alt']); ?>">
                                <?php endif; ?>
                                <div class="user-info">
                                    <p class="name-commenter"><?php the_sub_field('commenter_name',76); ?></p>
                                    <small><?php the_sub_field('comment_day'); ?></small>
                                    <span class="stars">★★★★★</span>
                                </div>
                            </div>

                            <?php $commenter_logo = get_sub_field('commenter_logo',76); ?>
                            <?php if ($commenter_logo): ?>
                                <img class="logo-img" src="<?= esc_url($commenter_logo['url']); ?>" alt="<?= esc_attr($commenter_logo['alt']); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination + navigation -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="#f85b00" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>
            </div>
            <div class="swiper-button-prev" style="transform: rotate(180deg)">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="#f85b00" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

 <!-- ONLINE BUCHEN SECTION -->

<section class="questions-accordion">
    <div class="container wow animate__animated animate__fadeInDown">
        <h2 class="faq-title text-uppercase"><?= $faq_title ?></h2>
        <div class="faq-accordion">
            <?php while(have_rows('faq_items',76)): the_row(); ?>
                <div class="faq-item">
                    <div class="faq-header">
                        <?php the_sub_field('faq_question',76); ?>
                        <span class="faq-icon">&#9660;</span>
                    </div>
                    <div class="faq-content">
                        <?php the_sub_field('faq_answer',76); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="form-part" id="contact-section">
     <div class="container wow animate__animated animate__fadeInRight">
        <div class="row justify-content-around">
            <div class="col-lg-5 col-md-10 col-12 p-0">
                <img src="<?= $contact_img_ai['url']; ?>" alt="<?= $contact_img_ai['alt']; ?>" class="w-100">
            </div>
                <div class="col-lg-5 col-12">
                    <p class="title-contact text-uppercase"><?=$contact_title ?></p>
                    <form>
                        <div class="form-group">
                            <span class="form-label">Vorname*</span>
                            <input type="text" class="form-input" name="vorname">
                        </div>

                        <div class="form-group">
                            <span class="form-label">Nachname*</span>
                            <input type="text" class="form-input" name="nachname">
                        </div>

                        <div class="form-group">
                            <span class="form-label">E-Mail*</span>
                            <input type="email" class="form-input" name="email">
                        </div>

                        <div class="form-group">
                            <span class="form-label">Phone*</span>
                            <input type="tel" class="form-input" name="phone">
                        </div>

                        <div class="form-group">
                            <span class="form-label">Ihre Nachricht</span>
                            <textarea class="form-textarea" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn-submit">ABSENDEN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <?php
}

genesis();
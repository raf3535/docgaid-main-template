<?php

/*
 * Template Name: Home Page Template
*/

add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');
remove_action('genesis_loop', 'genesis_do_loop', 10);
remove_action('genesis_before_content_sidebar_wrap', 'custom_do_breadcrumbs', 5);
add_action('genesis_loop', 'custom_homepage_content', 10);


function custom_homepage_content()
{

    $innovation_subtitle = get_field('innovation_subtitle');
    $innovation_title= get_field('innovation_title');
    $button_innovation = get_field('button_innovation');
    $fact_title = get_field('fact_title');
    $fact_subtitle = get_field('fact_subtitle');
    $benefit_title = get_field('benefit_title');
    $benefit_subtitle = get_field('benefit_subtitle');
    $title_doctors= get_field('title_doctors');
    $text_doctors = get_field('text_doctors');
    $button_text = get_field('button_text');
    $assistant_image = get_field('assistant_image');
    $title_assistant = get_field('title_assistant');
    $subtitle_assistant = get_field('subtitle_assistant');
    $consulting_title = get_field('consulting_title');
    $partner_title = get_field('partner_title');
    $partner_content = get_field('partner_content');
    $faq_title = get_field('faq_title');
    $contact_img = get_field('contact_img');
    $comments_title = get_field('comments_title');
    $contact_title = get_field('contact_title');

?>
    <div class="hero-front-page">
        <div class="container-lg">
            <div class="row align-items-center justify-content-center">
                <div class="in-col-textes text-center wow animate__animated animate__fadeInDown">
                    <p class="sub-title-top"><?= $innovation_subtitle; ?></p>
                    <img src="<?= CHILD_URL ?>/assets/app/svg/line-subtitle.svg">

                    <p class="title-top">
                        Mehr <span class="orange-tt"> Innovation,</span>
                        <br> Mehr <span class="orange-tt">Organisation</span>
                    </p>
                </div>
                <div class="test-uns-button d-flex justify-content-between align-items-center wow animate__animated animate__fadeInUp">
                    <p>Kontaktieren Sie uns jetzt !</p>
                    <div class="round-button">
                        <div class="round-button-inner-button">
                            <img loading="lazy" data-lazy="https://docgaid.de/wp-content/uploads/2022/10/icons8-right-1.svg" src="https://docgaid.de/wp-content/uploads/2022/10/icons8-right-1.svg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flexx wrapper">
                <div class="image-statistic">
                    <img class="image-statistic-main" src="<?= CHILD_URL ?>/assets/app/img/tablet-hero-1.png" alt="">
                    <div class="stat-box wow animate__animated animate__fadeInLeft">
                        <!-- <p class="number-counter"> <span id="counter" class="counter-value" data-count="7511"> 7511 </span>€</p> -->
                        <p class="stat-main"><span class="counter-value">7511</span>€</p>
                        <img src="<?= CHILD_URL ?>/assets/app/svg/line-subtitle.svg" class="line-stat">
                        <p class="stat-info">Ihr Kostenvorteil pro Jahr</p>
                    </div>
                    <div class="stat-box wow animate__animated animate__fadeInLeft">
                        <p class="stat-main"><span class="counter-value">374</span>H</p>
                        <img src="<?= CHILD_URL ?>/assets/app/svg/line-subtitle.svg" class="line-stat">
                        <p class="stat-info">Ihr Zeitersparnis pro Jahr</p>
                    </div>
                </div>
                <div class="image-scroll">
                    <div class="sticky-wrap">
                        <img src="<?= CHILD_URL ?>/assets/app/img/tablet-main-hero.png" alt="">
                    </div>
                </div>
                <div class="image-statistic">
                    <img class="image-statistic-main image-statistic-right" src="<?= CHILD_URL ?>/assets/app/img/tablet-hero-3.png" alt="">
                    <div class="stat-box wow animate__animated animate__fadeInRight">
                        <p class="stat-main"><span class="counter-value">2021</span></p>
                        <img src="<?= CHILD_URL ?>/assets/app/svg/line-subtitle.svg" class="line-stat">
                        <p class="stat-info">Gründungsidee</p>
                    </div>
                    <div class="stat-box wow animate__animated animate__fadeInRight">
                        <p class="stat-main"><span class="counter-value">3</span>H</p>
                        <img src="<?= CHILD_URL ?>/assets/app/svg/line-subtitle.svg" class="line-stat">
                        <p class="stat-info">Auftragsbearbeitung</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <div class="praxis-section" id="praxis-section">
     <div class="container">
        <div class="m-auto">
            <div class="text-center wow animate__animated animate__fadeInDown">
                <p class="title-numbers-top "><?=$benefit_title ?></p>
                <div class="span-bordered-long">
                    <p class="span-text-top text-white"><?=$benefit_subtitle?></p>
                </div>
            </div>
        </div>
        <?php $i = 0; if (have_rows('benefit_all')): ?>
            <?php while (have_rows('benefit_all')): the_row();?>
                <div class="row justify-content-xl-around justify-content-lg-center tilt-praxis <?= $i % 2 == 0 ?: 'flex-row-reverse'; ?>" style="margin-top: 50px;">
                    <div class="col-lg-5 col-12">
                        <div class="praxis-textes tilt-item wow animate__animated animate__fadeInLeft">
                            <p class="title-gradient text-uppercase"><?= the_sub_field('benefit_name'); ?></p>
                            <hr class="gradient-break">
                            <p class="sub-praxis"><?= the_sub_field('benefit_desc'); ?></p>
                            <ul>
                                <?php 
                                    if (have_rows('line')) {
                                        while (have_rows('line')) {
                                            the_row();
                                            echo '<li>' . esc_html(get_sub_field('line_text')) . '</li>';
                                        }
                                    }
                                ?>
                            </ul>
                        </div>   
                    </div>   
                    <div class="col-lg-6 col-12 d-flex align-items-center justify-content-md-center margins-tablet">
                        <div class="images tilt-item d-flex wow animate__animated animate__fadeInRight">
                            <div class="tablet-praxis">
                                <?php $image = get_sub_field('tablet_benefit'); if($image) { ?>
                                    <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="w-100">
                                <?php } ?>
                            </div>
                            <div class="tablet-praxis">
                                <?php $tablet_small = get_sub_field('tablet_small'); if($tablet_small) { ?>
                                    <img src="<?= $tablet_small['url']; ?>" alt="<?= $tablet_small['alt']; ?>" class="w-100">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; endwhile; ?>
            <?php endif; ?>
        </div>
 </div>
 <div class="doctors-section" id="doctors-section">
     <div class="overlay"></div>
     <div class="container-fluid container p-0 m-0">
         <div class="row justify-content-center text-center wow animate__animated animate__fadeInUp">
             <div class="col-lg-7 col-12">
                 <p class="orange-big-title text-uppercase"><?= $title_doctors; ?></p>
                 <p class="text-white sm-bck-text"><?= $text_doctors; ?></p>
                 <button class="contact-btn text-white"><?= $button_text ?></button>
             </div>
         </div>
     </div>
 </div>
 <section class="tablet-accordion" id="tablet-section">
    <div class="container">
        <div class="row justify-content-center">   
            <?php $i = 0; if (have_rows('items_tablet')): ?>
                <?php while (have_rows('items_tablet')): the_row(); ?>
                    <div class="col-lg-6 col-12 d-flex align-items-center wow animate__animated animate__fadeInLeft">
                        <div class="accordion w-100">
                            <?php while(have_rows('accordion_item')): the_row(); ?>
                                <?php 
                                    $icon       = get_sub_field('icon_accordion');
                                    $hover_icon = get_sub_field('hover_icon'); 
                                ?>
                                <div class="accordion-item" id="item<?php echo $i; ?>">
                                    <div class="accordion-header">
                                        <div class="non-display" style="display: flex; align-items: center;">
                                            <?php if ($icon): ?>
                                                <img class="inactive" src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>">
                                            <?php endif; ?>
                                            <?php if ($hover_icon): ?>
                                                <img class="active" src="<?= esc_url($hover_icon['url']); ?>" alt="<?= esc_attr($hover_icon['alt']); ?>">
                                            <?php endif; ?>
                                            <span style="padding:1px 0px 0px 4px;"><?= esc_html(get_sub_field('name_accordion')); ?></span>
                                        </div>
                                        <span class="accordion-arrow">&#9662;</span>
                                    </div>
                                    <div class="accordion-content">
                                        <?php the_sub_field('opened_text'); ?>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

            <div class="col-lg-6 col-10 d-flex justify-content-center wow animate__animated animate__fadeInRight">
                <div class="tablet">
                    <img src="<?= site_url() ?>/wp-content/uploads/2025/07/w-tablet.png" alt="Tablet" class="tablet-image">
                    <img src="<?= site_url() ?>/wp-content/uploads/2025/08/Screenshot-2025-01-25-at-23.11.29-2-3-1-scaled.png" alt="Tablet" class="tablet-bar">
                    <div class="tablet-grid">
                        <?php $j = 0; if (have_rows('items_tablet')): ?>
                            <?php while (have_rows('items_tablet')): the_row(); ?>
                                <?php while(have_rows('accordion_item')): the_row(); ?>
                                    <?php 
                                        $icon       = get_sub_field('icon_accordion');
                                        $hover_icon = get_sub_field('hover_icon'); 
                                    ?>
                                    <button class="tablet-btn" data-target="item<?php echo $j; ?>">
                                        <?php if ($hover_icon): ?>
                                            <img class="inactive" src="<?= esc_url($hover_icon['url']); ?>" alt="<?= esc_attr($hover_icon['alt']); ?>">
                                        <?php endif; ?>
                                        <?php if ($icon): ?>
                                            <img class="active" src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>">
                                        <?php endif; ?>
                                        <span><?= esc_html(get_sub_field('name_accordion')); ?></span>
                                    </button>
                                    <?php $j++; ?>
                                <?php endwhile; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <section class="assistant-section" id="assistant-section">
     <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-6 col-12 wow animate__animated animate__fadeInLeft">
                <img src="<?= $assistant_image['url']; ?>" alt="<?= $assistant_image['alt']; ?>" class="w-100 assistant-ch-img">
            </div>
             <div class="col-lg-6 col-12 wow animate__animated animate__fadeInRight">
                <div class="asist-textes left-text">
                    <p class="title-numbers-top"><?=$title_assistant ?></p>
                    <div class="span-bordered-mid span-bordered" >
                        <p class="span-text-top text-white text-center"><?=$subtitle_assistant ?></p>
                    </div>
                    <p class="title-not-gradient text-uppercase">DocGaid passt sich Deiner Praxis an. Was heißt das genau?</p>
                    <p class="sub-praxis">Patientenbindung, Individualität, Rechtskonformität, Validierung etc.</p>
                    <hr class="gradient-break">
                    <?php while(have_rows('assistant_items')): the_row(); ?>
                        <div class="items-assistant d-flex">
                            <p class="number-big-as"><?php the_sub_field('number_assistant'); ?></p>
                            <p class="text-assistant"><?php the_sub_field('text_assistant'); ?></p>
                        </div>
                        <hr class="assistant-hr">
                    <?php endwhile; ?>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <section class="consulting-section">
     <div class="container my-5">
        <div class="m-auto">
            <div class="text-center">
                <p class="title-numbers-top wow animate__animated animate__fadeInDown"><?= $consulting_title ?></p>
            </div>
        </div>
        <div class="row">
            <?php while(have_rows('consulting_block')): the_row(); ?>
                <div class="col-lg-4 col-12 wow animate__animated animate__fadeInUp">
                    <div class="custom-card">
                        <div class="card-header bordered-header">
                        <?php $consulting_image = get_sub_field('consulting_image'); if($consulting_image) { ?>
                            <img src="<?= $consulting_image['url']; ?>" alt="<?= $consulting_image['alt']; ?>" class="icons-consulting">
                        <?php } ?>
                        </div>
                        <div class="card-body">
                            <h5><?php the_sub_field('consulting_name'); ?></h5>
                            <p>In Einem Ersten Unverbindlichen Telefonat Klären Wir Deine Fragen Und Beraten Dich Zur Bestmöglichen Vorgehensweise</p>
                        </div>
                    </div>
                </div>  
            <?php endwhile; ?> 
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
            <?php while (have_rows('partner_images')) : the_row(); ?>
              <?php $partner_single_img = get_sub_field('partner_single_img'); ?>
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
        <h2 class="text-center faq-title text-uppercase"><?= $comments_title ?></h2>

        <?php if (have_rows('commenter_blocks')): ?>
        <?php $count = count(get_field('commenter_blocks')); ?>

        <!-- Swiper -->
        <div class="swiper comments" data-count="<?= $count; ?> ">
            <div class="swiper-wrapper">
                <?php while (have_rows('commenter_blocks')): the_row(); ?>
                <div class="swiper-slide wow animate__animated animate__fadeInUp">
                    <div class="review-card">
                        <p class="review-text"><?php the_sub_field('comment'); ?></p>

                        <div class="review-footer">
                            <div class="review-user">
                                <?php $commenter_img = get_sub_field('commenter_img'); ?>
                                <?php if ($commenter_img): ?>
                                    <img class="user-img" src="<?= esc_url($commenter_img['url']); ?>" alt="<?= esc_attr($commenter_img['alt']); ?>">
                                <?php endif; ?>
                                <div class="user-info">
                                    <p class="name-commenter"><?php the_sub_field('commenter_name'); ?></p>
                                    <small><?php the_sub_field('comment_day'); ?></small>
                                    <span class="stars">★★★★★</span>
                                </div>
                            </div>

                            <?php $commenter_logo = get_sub_field('commenter_logo'); ?>
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
            <?php while(have_rows('faq_items')): the_row(); ?>
                <div class="faq-item">
                    <div class="faq-header">
                        <?php the_sub_field('faq_question'); ?>
                        <span class="faq-icon">&#9660;</span>
                    </div>
                    <div class="faq-content">
                        <?php the_sub_field('faq_answer'); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="form-part" id="contact-section">
     <div class="container wow animate__animated animate__fadeInRight">
        <div class="row justify-content-lg-between justify-content-center">
            <div class="col-lg-5 col-12 p-0">
                <img src="<?= $contact_img['url']; ?>" alt="<?= $contact_img['alt']; ?>" class="w-100 contact-img">
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

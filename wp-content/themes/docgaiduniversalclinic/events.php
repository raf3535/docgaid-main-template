<?php

/*
* Template Name: Events Template
*/

add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');
remove_action('genesis_loop', 'genesis_do_loop', 10);
remove_action('genesis_before_content_sidebar_wrap', 'custom_do_breadcrumbs', 5);
add_action('genesis_loop', 'custom_events_content', 10);

function custom_events_content()
{

    $event_big_title = get_field('event_big_title');
    $contact_img_ai = get_field('contact_image_ai',297);
    $contact_title = get_field('contact_title',76);

    ?>


<section class="events-section">
    <div class="container">
        <?= $event_big_title ?>
        <div class="row justify-content-around" style="overflow: scroll; height: 1300px; scrollbar-color: #F85B00 transparent;">
            <?php if( have_rows('event_block') ): ?>
                <?php while( have_rows('event_block') ): the_row(); ?>
                        <div class="col-lg-5 col-12">
                            <div class="in-col-event">
                                <?php $event_image = get_sub_field('event_image'); if($event_image) { ?>
                                    <img src="<?= $event_image['url']; ?>" alt="<?= $event_image['alt']; ?>" class="ev-img">
                                <?php } ?>
                                <p class="event-single-name"><?php the_sub_field('event_name'); ?></p>
                                <hr class="orange-line-ev">
                                <p class="event-description"><?php the_sub_field('event_description'); ?></p>
                                <div class="about-event">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="about-main">
                                            <?php $calendar_icon = get_sub_field('calendar_icon'); if($calendar_icon) { ?>
                                                <img src="<?= $calendar_icon['url']; ?>" alt="<?= $calendar_icon['alt']; ?>" class="icons-small-about">
                                            <?php } ?>
                                            <span class="about-text-ev"><?php the_sub_field('event_date'); ?></span>
                                            <?php $place_icon = get_sub_field('place_icon'); if($place_icon) { ?>
                                                <img src="<?= $place_icon['url']; ?>" alt="<?= $place_icon['alt']; ?>" class="icons-small-about">
                                            <?php } ?>
                                            <span class="about-text-ev"><?php the_sub_field('event_date'); ?></span>
                                        </div>
                                        <button class="mehr-btn text-uppercase"><?php the_sub_field('about_event'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endwhile; ?>
            <?php endif; ?>
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
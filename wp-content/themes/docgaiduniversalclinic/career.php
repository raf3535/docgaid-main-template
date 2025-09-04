<?php

/*
* Template Name: Career Template
*/

add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');
remove_action('genesis_loop', 'genesis_do_loop', 10);
remove_action('genesis_before_content_sidebar_wrap', 'custom_do_breadcrumbs', 5);
add_action('genesis_loop', 'custom_career_content', 10);

function custom_career_content()
{

    $contact_img_ai = get_field('contact_image_ai',297);
    $contact_title = get_field('contact_title',76);
    $career_img = get_field('career_img');
    $text_description = get_field('text_description');
    $button_career = get_field('button_career');
    $career_single_title = get_field('career_single_title');

    ?>



<section class="career-description">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-lg-5 col-12">
                <img src="<?= $career_img['url']; ?>" alt="<?= $career_img['alt']; ?>" class="w-100">
            </div>
            <div class="col-lg-6 col-12">
                <div class="in-col-career-desc">
                    <?php the_field('career_title'); ?>
                    <p class="text-description"><?= $text_description ?></p>
                    <button class="career-btn text-white text-uppercase"><?= $button_career ?></button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="career-main">
  <div class="container">
    <?= $career_single_title ?>

    <?php
      // Քաշում ենք բոլոր տողերը, որ ստանանք կատեգորիաների ցուցակը
      $careers = get_field('career_single');
      $categories = [];
      if ($careers && is_array($careers)) {
        foreach ($careers as $row) {
          if (!empty($row['name_career'])) { $categories[] = $row['name_career']; }
        }
        $categories = array_unique($categories);
      }
    ?>

    <!-- Ձախից բացվող dropdown -->
    <div class="filter-bar">
      <div class="dropdown" id="careerDropdown">
        <button class="dropdown__toggle" type="button" aria-haspopup="listbox" aria-expanded="false">
          <span class="dropdown__label orange-text">FREIE STELLE</span>
          <span class="dropdown__chevron orange-text" aria-hidden="true"></span>
        </button>

        <?php if (!empty($categories)) : ?>
          <ul class="dropdown__menu" role="listbox" tabindex="-1">
            <?php foreach ($categories as $cat): ?>
              <li class="dropdown__option text-uppercase"
                  data-filter="<?= esc_attr( sanitize_title($cat) ); ?>"
                  role="option"><?= esc_html($cat); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>

    <?php if ( have_rows('career_single') ) : ?>
      <div class="row" id="careerGrid">
        <?php while ( have_rows('career_single') ) : the_row();
          $name_career       = get_sub_field('name_career');
          $description_career= get_sub_field('description_career');
          $link_career       = get_sub_field('link_career');
          $img_career        = get_sub_field('img_career');
          $slug              = sanitize_title($name_career);
        ?>
          <div class="col-lg-4 col-md-6 col-12 career-card" data-name="<?= esc_attr($slug); ?>">
            <a href="<?= esc_url($link_career['url']); ?>" class="card-link" <?php if(!empty($link_career['target'])) echo 'target="'.esc_attr($link_career['target']).'"'; ?>>
              <div class="card-box" style="background-image:url('<?= esc_url($img_career['url']); ?>')">
                <div class="card-overlay">
                  <h3><?= esc_html($name_career); ?> ↗</h3>
                  <p><?= esc_html($description_career); ?></p>
                </div>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
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
<?php
$title = $module['title'];
$description = $module['description'];
$image = $module['image'];
$feature_attorneys = $module['feature_attorneys'];
$mobile = wp_is_mobile();
$featured_args = array(
    'post_type'      => 'attorney',
    'post__in'       => $feature_attorneys,
    'posts_per_page' => 2,
    'orderby'        => 'post__in'
);

$featured_query = new WP_Query($featured_args);

$args = array(
    'post_type'      => 'attorney',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'ASC',
    'post__not_in'   => $feature_attorneys
);
$the_query = new WP_Query($args);
?>
<div class="attorney-module overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xxl-7 mx-auto text-center">
                <h2 class="title hidden-hd"><?= $title; ?></h2>
                <p class="description hidden-hd"><?= $description; ?></p>
            </div>
        </div>
        <div class="featured-attorneys">
            <div class="row justify-content-center gap-3 w-full mx-auto">
                <?php
                if ($the_query->have_posts()) :
                    $index = 0;
                    while ($featured_query->have_posts()) : $featured_query->the_post();
                        $index++;
                        $class = ($index % 2 == 0) ? 'hidden-hd-right-hero' : 'hidden-hd-left-hero '; ?>
                        <a href="<?= get_the_permalink(); ?>" class="featured-attorneys-card <?= $mobile ? '' : "hidden-hd-hero $class ";  ?>">
                            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>" class="image">
                            <div class="content">
                                <h3 class="name"><?= get_the_title(); ?></h3>
                                <p class="position"><?= get_field('position'); ?></p>
                            </div>
                        </a>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
        <div class="swiper attorneys-swiper mt-3 hidden-hd">
            <div class="swiper-wrapper">
                <?php while ($the_query->have_posts()) : $the_query->the_post();
                    $profile_image = get_field('profile_image');
                    if (!empty($profile_image) && is_array($profile_image) && isset($profile_image['url'])) {
                        $profile_image = $profile_image['url'];
                    } else {
                        $profile_image = get_the_post_thumbnail_url();
                    }
                ?>
                    <div class="swiper-slide">
                        <a href="<?= get_the_permalink(); ?>" class="featured-attorneys-card <?php if (get_field('profile_image')): ?> bg-image <?php endif; ?>">
                            <img src="<?= $profile_image ?>" alt="<?= get_the_title(); ?>" class="image">
                            <div class="content">
                                <h3 class="name"><?= get_the_title(); ?></h3>
                                <p class="position"><?= get_field('position'); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php if (!wp_is_mobile()) : ?>
                <div class="swiper-buttons">
                    <div class="line"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="horizontal-line"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php endif; ?>
            <?php if (wp_is_mobile()) : ?>
                <div class="swiper-pagination"></div>
            <?php endif; ?>
        </div>
    </div>
</div>
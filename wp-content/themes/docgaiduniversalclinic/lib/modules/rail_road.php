<?php
$title = $module['title'];
$description = $module['description'];
$logos = $module['logos'];
$smart_logo = $module['smart_logo'];
$cards = $module['card'];
$button = $module['button'];
$footer_title = $module['footer_title'];
$footer_description = $module['footer_description'];
$background_image = $module['background_image'];
$mobile = wp_is_mobile();
?>
<div class="railroaded-module overflow-hidden">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-7 railroaded-module__content <?= $mobile ? 'hidden-hd' : 'hidden-hd hidden-hd-right' ?>">
                <h2 class="railroaded-module__title "><?= $title ?><sup>®</sup></h2>
                <div class="railroaded-module__description">
                    <?= $description ?>
                </div>
            </div>
            <div class="col-md-3 railroaded-module__logos d-none d-xxl-block hidden-hd-right-hero-rotate">
                <?php if ($logos): ?>
                    <?php foreach ($logos as $logo): ?>
                        <img src="<?= $logo['logo']['url']; ?>" alt="<?= $logo['alt']; ?>" class="railroaded-module__smart-logo" <?php if ($logo['object_fit']): ?> style="object-fit: <?= $logo['object_fit']; ?>" <?php endif; ?>>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if (!wp_is_mobile()) : ?>
        <div class="railroaded-cards">
            <?php foreach ($cards as $key => $card) : ?>
                <?php if ($key % 2 == 0) {
                    $class = 'hidden-hd-left';
                } else {
                    $class = 'hidden-hd-right';
                } ?>
                <div class="railroaded-cards__card hidden-hd <?= $class ?>">
                    <div class="railroaded-header">
                        <img src="<?= $card['icon']['url'] ?>" alt="">
                        <h3><?= esc_html($card['title']); ?></h3>
                    </div>
                    <p class="description"><?= $card['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if (wp_is_mobile()) : ?>
        <div class="container hidden-hd">
            <div class="swiper railroaded-swiper">
                <div class="swiper-wrapper railroaded-cards">
                    <?php foreach ($cards as $card) : ?>
                        <div class="swiper-slide railroaded-cards__card">
                            <div class="railroaded-header">
                                <img src="<?= $card['icon']['url'] ?>" alt="">
                                <h3><?= esc_html($card['title']); ?></h3>
                            </div>
                            <p class="description"><?= $card['description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (wp_is_mobile()) : ?>
                    <div class="swiper-pagination"></div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <a href="<?= $button['url'] ?>" class="btn-global mx-auto my-4 hidden-hd mt-lg-5"><?= $button['title'] ?></a>

    <div class="railroaded-module__footer">
        <div class="content mx-auto hidden-hd">
            <h3 class="title"><?= $footer_title; ?></h3>
            <?= $footer_description; ?>
        </div>
    </div>
</div>
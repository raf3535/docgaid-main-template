<?php
$title = $module['title'];
$sub_title = $module['sub_title'];
$title = $module['title'];
$description = $module['description'];
$button = $module['button'];
$video = $module['video'];

?>
<div class="banner-module overflow-hidden">
    <div class="banner-module__wrapper">
        <h1 class="d-flex align-items-center gap-2 mb-0 hidden-hd">
            <span class="banner__sub-title">YOUR</span>
            <div class="banner__title">
                <?= $sub_title ?>
                <br>
                <hr>
                <?= $title ?>
            </div>
        </h1>
        <img src="<?= CHILD_URL ?>/assets/app/img/banner-new.webp" alt="Homepage Image" id="initial-image" class="background-image">
        <div class="banner-container">
            <div class="banner__content hidden-hd hidden-hd-timeout-up-300 no-animation-mobile">
                <div class="left-side">
                    <span><strong>MILLIONS</strong> Recovered For <br> Our Clients</span>
                </div>
                <hr>
                <div class="right-side">
                    <div class="banner__review">
                        <img src="<?= CHILD_URL ?>/assets/app/img/google.webp" alt="google icon" class="google-icon">
                        <p class="banner__review-text">Client Rated 5-Star Law Firm</p>
                    </div>
                </div>
            </div>
            <div class="bottom-content">
                <a href="<?= $button['url']; ?>" class="banner__button btn-global mx-auto hidden-hd no-animation-mobile"><?= $button['title']; ?></a>
                <div class="banner__description hidden-hd">
                    <?= $description ?>
                </div>
            </div>
        </div>
    </div>
</div>
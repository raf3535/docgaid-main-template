<?php
$review = get_field('google_review', 'option');
$mobile = wp_is_mobile();
?>

<div class="google-review overflow-hidden">
    <img src="<?= CHILD_URL; ?>/assets/app/img/google-reivew-bg.webp" alt="Google Review Background" class="d-none d-xl-block">
    <div class="container google-review-wrapper">
        <div class="row flex-column-reverse flex-lg-row">
            <h2 class="col-lg-7 <?= $mobile ? '' : 'hidden-hd hidden-hd-right' ?>">
                <?= $review['title']; ?>
            </h2>
            <div class="col-lg-5 right-side">
                <?php
                echo do_shortcode('[icon name="google" full="true" class="google hidden-hd hidden-hd-up"]');
                echo "<div class='stars'>";
                $index = 100;
                for ($i = 0; $i < 5; $i++) {
                    echo do_shortcode('[icon name="star" class="star hidden-hd hidden-hd-timeout-' . $index . '"]');
                    $index += 100;
                }
                echo "</div>";
                ?>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-8 reviews <?= $mobile ? '' : 'hidden-hd hidden-hd-right' ?>">
                <div class="swiper google-review-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($review['reviews'] as $review) : ?>
                            <div class="swiper-slide">
                                <div class="review-header">
                                    <img src="<?= $review['icon']['url']; ?>" alt="profile" width="50" height="50" class="profile">
                                    <div class="review-header-content">
                                        <h3><?= $review['author_name']; ?></h3>
                                        <img class="stars" src="<?= CHILD_URL ?>/assets/app/svg/stars.svg" alt="stars">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none">
                                        <path d="M8.49976 7.26196V10.5538H13.0743C12.8734 11.6124 12.2706 12.5088 11.3665 13.1115L14.1251 15.252C15.7324 13.7684 16.6597 11.5893 16.6597 9.00068C16.6597 8.39797 16.6056 7.81837 16.5051 7.26206L8.49976 7.26196Z" fill="#4285F4" />
                                        <path d="M3.73634 10.4252L3.11417 10.9014L0.911865 12.6169C2.31049 15.3909 5.17709 17.3073 8.49979 17.3073C10.7947 17.3073 12.7188 16.55 14.1252 15.2519L11.3666 13.1114C10.6093 13.6214 9.64337 13.9305 8.49979 13.9305C6.2898 13.9305 4.41214 12.4392 3.73982 10.4301L3.73634 10.4252Z" fill="#34A853" />
                                        <path d="M0.911506 4.99768C0.331993 6.14127 -0.000244141 7.43174 -0.000244141 8.80716C-0.000244141 10.1826 0.331993 11.4731 0.911506 12.6167C0.911506 12.6243 3.73973 10.4221 3.73973 10.4221C3.56973 9.91212 3.46925 9.37124 3.46925 8.80708C3.46925 8.24291 3.56973 7.70204 3.73973 7.19204L0.911506 4.99768Z" fill="#FBBC05" />
                                        <path d="M8.49996 3.69191C9.75179 3.69191 10.8645 4.12462 11.7531 4.95918L14.1872 2.52512C12.7113 1.1497 10.795 0.307373 8.49996 0.307373C5.17727 0.307373 2.31049 2.216 0.911865 4.99782L3.74 7.19237C4.41223 5.18326 6.28998 3.69191 8.49996 3.69191Z" fill="#EA4335" />
                                    </svg>
                                    <span class="date"><?= $review['date']; ?></span>
                                </div>
                                <p class="description"><?= $review['description']; ?></p>
                            </div>
                        <?php endforeach; ?>
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
    </div>
</div>
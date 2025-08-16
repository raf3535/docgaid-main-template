<?php
$title = $module['title'];
$price = $module['price'];
$description = $module['description'];
$highlights = $module['highlights'];
$video = $module['video'];
$mobile = wp_is_mobile();
?>

<div class="results-module overflow-hidden">
    <div class="container">
        <div class="results__top-section">
            <div class="results__top-section__left hidden-hd-hero hidden-hd-left-hero ">
                <p class="price"><sup>$</sup><?= esc_html($price); ?><span>Million</span></p>
                <h2><?php echo $title ?></h2>
                <p><?php echo $description ?></p>
            </div>
            <div class="results__top-section__right <?= $mobile ? 'hidden-hd hidden-hd-up' : 'hidden-hd-hero hidden-hd-right-hero'; ?> ">
                <video id="video" src="<?= $video['url']; ?>" controls style="display: none;"></video>
                <div id="videoPlaceholder" style="position: relative; display: inline-block;" class="fade-left">
                    <img src="<?= CHILD_URL ?>/assets/app/img/results-bg.webp" alt="results-bg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128" fill="none" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); cursor: pointer;">
                        <g clip-path="url(#clip0_2007_500)">
                            <path d="M64 120C49.1479 120 34.9041 114.1 24.402 103.598C13.9 93.0959 8 78.8521 8 64C8 49.1479 13.9 34.9041 24.402 24.402C34.9041 13.9 49.1479 8 64 8C78.8521 8 93.0959 13.9 103.598 24.402C114.1 34.9041 120 49.1479 120 64C120 78.8521 114.1 93.0959 103.598 103.598C93.0959 114.1 78.8521 120 64 120ZM64 128C80.9739 128 97.2525 121.257 109.255 109.255C121.257 97.2525 128 80.9739 128 64C128 47.0261 121.257 30.7475 109.255 18.7452C97.2525 6.74284 80.9739 0 64 0C47.0261 0 30.7475 6.74284 18.7452 18.7452C6.74284 30.7475 0 47.0261 0 64C0 80.9739 6.74284 97.2525 18.7452 109.255C30.7475 121.257 47.0261 128 64 128Z" fill="#D5B94C" />
                            <path d="M50.168 40.4399C50.8223 40.103 51.5568 39.9531 52.2908 40.0067C53.0247 40.0604 53.7297 40.3154 54.328 40.7439L82.328 60.7439C82.8465 61.1139 83.2692 61.6024 83.5608 62.1687C83.8524 62.7351 84.0045 63.3629 84.0045 63.9999C84.0045 64.6369 83.8524 65.2647 83.5608 65.831C83.2692 66.3974 82.8465 66.8859 82.328 67.2559L54.328 87.2559C53.7299 87.684 53.0253 87.9389 52.2917 87.9925C51.5581 88.0461 50.8239 87.8964 50.1699 87.5599C49.5159 87.2234 48.9673 86.713 48.5845 86.085C48.2016 85.4569 47.9994 84.7354 48 83.9999V43.9999C47.9992 43.2645 48.2012 42.5432 48.5837 41.9152C48.9661 41.2871 49.5143 40.7767 50.168 40.4399Z" fill="#D5B94C" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2007_500">
                                <rect width="128" height="128" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
        <div class="results__bottom-section hidden-hd">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    $i = 0;
                    if ($i == 0 && !wp_is_mobile()) {
                        $removedElement = array_shift($highlights);
                    }
                    foreach ($highlights as $highlight): ?>
                        <div class="swiper-slide">
                            <p class="price"><sup>$</sup><?= esc_html($highlight['price']); ?><span>Million</span></p>
                            <h2><?php echo $highlight['title'] ?></h2>
                            <p><?php echo $highlight['description'] ?></p>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
                <?php if (wp_is_mobile()) : ?>
                    <div class="swiper-pagination"></div>
                <?php else: ?>
                    <div class="swiper-buttons">
                        <div class="line"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="horizontal-line"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
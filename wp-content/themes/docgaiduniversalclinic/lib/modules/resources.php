<?php
$title = $module['title'];
$spotify = $module['spotify_link'];
$itunes = $module['itunes_link'];
$recourses = get_field('resources', 'options');
?>

<div class="recources overflow-hidden">
    <div class="container">
        <h2 class="hidden-hd hidden-hd-right">Resources</h2>
        <div class="recources__container max-w-1200 hidden-hd ">
            <img src="<?= CHILD_URL ?>/assets/app/img/resources.webp" alt="Recources image" class="recources__image">
            <img src="<?= CHILD_URL ?>/assets/app/img/resources-mobile.webp" alt="Recources image" class="recources__image-mobile fade-up">
            <div class="recources__wrapper fade-up">
                <h3 class="recources__title"><?= $title ?></h3>
                <div class="recources__podcast">
                    <a href="<?= $itunes ?>">
                        <img src="<?= CHILD_URL ?>/assets/app/svg/itunes.svg" alt="itunes" width="225" height="76">
                    </a>
                    <a href="<?= $spotify ?>">
                        <img src="<?= CHILD_URL ?>/assets/app/svg/spotify.svg" alt="spotify" width="225" height="76">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="guidebook-section py-5">
        <div class="container">
            <div class="row mb-4 bg-blue max-w-1200 mx-auto hidden-hd">
                <div class="col-md-8 text-center">
                    <div class="container">
                        <div class="main-guidebook p-md-4 fade-up">
                            <h3><?= $recourses['title'] ?></h3>
                            <p><?= $recourses['description'] ?></p>
                            <a href="<?= site_url('/po-library/') ?>" class="btn-download">
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M0.78125 15.4688C0.98845 15.4688 1.18716 15.5511 1.33368 15.6976C1.48019 15.8441 1.5625 16.0428 1.5625 16.25V20.1562C1.5625 20.5707 1.72712 20.9681 2.02015 21.2611C2.31317 21.5541 2.7106 21.7188 3.125 21.7188H21.875C22.2894 21.7188 22.6868 21.5541 22.9799 21.2611C23.2729 20.9681 23.4375 20.5707 23.4375 20.1562V16.25C23.4375 16.0428 23.5198 15.8441 23.6663 15.6976C23.8128 15.5511 24.0115 15.4688 24.2188 15.4688C24.426 15.4688 24.6247 15.5511 24.7712 15.6976C24.9177 15.8441 25 16.0428 25 16.25V20.1562C25 20.9851 24.6708 21.7799 24.0847 22.366C23.4987 22.952 22.7038 23.2812 21.875 23.2812H3.125C2.2962 23.2812 1.50134 22.952 0.915291 22.366C0.32924 21.7799 0 20.9851 0 20.1562V16.25C0 16.0428 0.08231 15.8441 0.228823 15.6976C0.375336 15.5511 0.57405 15.4688 0.78125 15.4688Z" fill="#D5B94C" />
                                    <path d="M11.9469 18.5219C12.0195 18.5946 12.1057 18.6524 12.2006 18.6917C12.2955 18.7311 12.3972 18.7514 12.5 18.7514C12.6028 18.7514 12.7045 18.7311 12.7994 18.6917C12.8944 18.6524 12.9806 18.5946 13.0531 18.5219L17.7406 13.8344C17.8873 13.6877 17.9697 13.4887 17.9697 13.2812C17.9697 13.0738 17.8873 12.8748 17.7406 12.7281C17.5939 12.5814 17.395 12.499 17.1875 12.499C16.98 12.499 16.7811 12.5814 16.6344 12.7281L13.2813 16.0828V2.34375C13.2813 2.13655 13.199 1.93784 13.0524 1.79132C12.9059 1.64481 12.7072 1.5625 12.5 1.5625C12.2928 1.5625 12.0941 1.64481 11.9476 1.79132C11.8011 1.93784 11.7188 2.13655 11.7188 2.34375V16.0828L8.36564 12.7281C8.21894 12.5814 8.01997 12.499 7.81251 12.499C7.60505 12.499 7.40608 12.5814 7.25939 12.7281C7.11269 12.8748 7.03027 13.0738 7.03027 13.2812C7.03027 13.4887 7.11269 13.6877 7.25939 13.8344L11.9469 18.5219Z" fill="#D5B94C" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mt-4 fade-up">
                    <?php if (!wp_is_mobile()) { ?>
                        <img src="<?= CHILD_URL ?>/assets/app/img/guidebook.webp" alt="Guide Book" class="guidebook-image">
                    <?php } else { ?>
                        <div class="swiper guidebookSlider">
                            <div class="swiper-wrapper">
                                <?php foreach ($recourses['books'] as $book) : ?>
                                    <div class="swiper-slide">
                                        <div class="card bg-blue">
                                            <div class="card-body">
                                                <a href="<?= site_url('/resources/') ?>" class="btn-download">
                                                    <img src="<?= $book['image']['url'] ?>" class="card-img" alt="Secrets To Handling Your Car Crash Claims Successfully">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if (!wp_is_mobile()) : ?>
                                <div class="swiper-buttons">
                                    <div class="line"></div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            <?php endif; ?>
                            <?php if (wp_is_mobile()) : ?>
                                <div class="swiper-pagination"></div>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if (!wp_is_mobile()) : ?>
                <div class="row hidden-hd">
                    <div class="col-md-12">
                        <div class="swiper guidebookSlider">
                            <div class="swiper-wrapper">
                                <?php foreach ($recourses['books'] as $book) : ?>
                                    <div class="swiper-slide">
                                        <div class="card bg-blue">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $book['title'] ?></h5>
                                                <a href="<?= site_url('/po-library/') ?>" class="btn-download">
                                                    Download
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                        <path d="M0.78125 15.4688C0.98845 15.4688 1.18716 15.5511 1.33368 15.6976C1.48019 15.8441 1.5625 16.0428 1.5625 16.25V20.1562C1.5625 20.5707 1.72712 20.9681 2.02015 21.2611C2.31317 21.5541 2.7106 21.7188 3.125 21.7188H21.875C22.2894 21.7188 22.6868 21.5541 22.9799 21.2611C23.2729 20.9681 23.4375 20.5707 23.4375 20.1562V16.25C23.4375 16.0428 23.5198 15.8441 23.6663 15.6976C23.8128 15.5511 24.0115 15.4688 24.2188 15.4688C24.426 15.4688 24.6247 15.5511 24.7712 15.6976C24.9177 15.8441 25 16.0428 25 16.25V20.1562C25 20.9851 24.6708 21.7799 24.0847 22.366C23.4987 22.952 22.7038 23.2812 21.875 23.2812H3.125C2.2962 23.2812 1.50134 22.952 0.915291 22.366C0.32924 21.7799 0 20.9851 0 20.1562V16.25C0 16.0428 0.08231 15.8441 0.228823 15.6976C0.375336 15.5511 0.57405 15.4688 0.78125 15.4688Z" fill="#D5B94C" />
                                                        <path d="M11.9469 18.5219C12.0195 18.5946 12.1057 18.6524 12.2006 18.6917C12.2955 18.7311 12.3972 18.7514 12.5 18.7514C12.6028 18.7514 12.7045 18.7311 12.7994 18.6917C12.8944 18.6524 12.9806 18.5946 13.0531 18.5219L17.7406 13.8344C17.8873 13.6877 17.9697 13.4887 17.9697 13.2812C17.9697 13.0738 17.8873 12.8748 17.7406 12.7281C17.5939 12.5814 17.395 12.499 17.1875 12.499C16.98 12.499 16.7811 12.5814 16.6344 12.7281L13.2813 16.0828V2.34375C13.2813 2.13655 13.199 1.93784 13.0524 1.79132C12.9059 1.64481 12.7072 1.5625 12.5 1.5625C12.2928 1.5625 12.0941 1.64481 11.9476 1.79132C11.8011 1.93784 11.7188 2.13655 11.7188 2.34375V16.0828L8.36564 12.7281C8.21894 12.5814 8.01997 12.499 7.81251 12.499C7.60505 12.499 7.40608 12.5814 7.25939 12.7281C7.11269 12.8748 7.03027 13.0738 7.03027 13.2812C7.03027 13.4887 7.11269 13.6877 7.25939 13.8344L11.9469 18.5219Z" fill="#D5B94C" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <img src="<?= $book['image']['url'] ?>" class="card-img" alt="Secrets To Handling Your Car Crash Claims Successfully">
                                        </div>
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
            <?php endif; ?>
            <a href="<?= site_url('/po-library/'); ?>" class="btn-global d-flex mx-auto fade-up">VIEW MORE RESOURCES</a>
        </div>
    </div>
</div>
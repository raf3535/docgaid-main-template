<?php
$client = get_field('client_testimonials', 'option');
$title = $module['title'] ? $module['title'] : $client['title'];
$description = $module['description'] ? $module['description'] : $client['description'];
$blockquote = $module['blockquote'] ? $module['blockquote'] : $client['blockquote'];
$author = $module['author_name'] ? $module['author_name'] : $client['author_name'];
$role = $module['role'] ? $module['role'] : $client['role'];
$client_image = $module['client_image'] ? $module['client_image'] : $client['client_image'];
$client_image_mobile = $module['client_image_mobile'] ? $module['client_image_mobile'] : $client['client_image_mobile'];
$youtube = $module['youtube'] ? $module['youtube'] : $client['youtube'];
$button = $module['button'] ? $module['button'] : $client['button'];
$mobile = wp_is_mobile();
?>

<div class="client_testimonials overflow-hidden">
    <div class="container">
        <div class="client_testimonials__wrapper row">
            <?php if (!wp_is_mobile()): ?>
                <div class="image col-lg-6">
                    <img src="<?= $client_image['url'] ?>" alt="<?= $client_image['alt'] ?>">
                </div>
            <?php endif; ?>
            <div class="content col-lg-6">
                <h2 class="<?= $mobile ? 'hidden-hd' : 'hidden-hd hidden-hd-right' ?>"><?= $title ?></h2>
                <p class="<?= $mobile ? 'hidden-hd' : 'hidden-hd hidden-hd-right' ?>"><?= $description ?></p>
                <?php if (wp_is_mobile()): ?>
                    <img src="<?= $client_image_mobile['url'] ?>" alt="<?= $client_image_mobile['alt'] ?>">
                <?php endif; ?>
                <div class="blockquote <?= $mobile ? 'hidden-hd mt-5' : 'hidden-hd hidden-hd-right' ?>">
                    <p class="content"><?= $blockquote ?></p>
                    <div class="blockquote-author">
                        <div class="blockquote-author__title">
                            <h3><?= $author ?></h3>
                            <p><?= $role ?></p>
                        </div>
                        <?php
                        echo do_shortcode('
                           [hd-modal 
                               video="yyxmgI3rkTg" 
                               title="Mike Berry Testimonial FRSA railroad whistleblower settlement" 
                               type="youtube" 
                               class="watch-button" 
                               cta="WATCH ▶" 
                               src = ""
                               src_mobile = ""
                               img_width="600" 
                               img_height="400" 
                               webp="true" 
                               mobile="true" 
                               svg="true" 
                               single="false" 
                           ]');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="youtube-links hidden-hd">
            <div class="swiper youtube-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($youtube as $link) : ?>
                        <?php
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $link['youtube_link'], $matches);
                        $video_id = $matches[1];
                        ?>
                        <div class="swiper-slide">
                            <div class="youtube-video">
                                <iframe src="https://www.youtube.com/embed/<?= $video_id; ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
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
        <a href="<?= $button['url'] ?>" class="btn-global mx-auto hidden-hd"><?= $button['title'] ?></a>
    </div>
</div>
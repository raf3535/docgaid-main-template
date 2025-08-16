<?php
$title = $module['title'];
$description = $module['description'];
$practice_areas = $module['practice_areas'];
$button = $module['button'];
$mobile = wp_is_mobile();
?>
<div class="practice-areas overflow-hidden">
    <div class="practice-areas__wrapper">
        <div class="container">
            <div class="row">
                <div class="left-side col-lg-6">
                    <div class="container">
                        <h2 class="title <?= $mobile ? 'hidden-hd' : 'hidden-hd hidden-hd-right'; ?>"><?= $title ?></h2>
                        <p class=" <?= $mobile ? 'hidden-hd' : 'hidden-hd hidden-hd-right'; ?>"><?= $description ?></p>
                        <div class="practice-areas-wrapper">
                            <?php foreach ($practice_areas as $practice_area) : ?>
                                <a href="<?= $practice_area['link']['url']; ?>" class="practice-area-card" style="background-image:url('<?= $practice_area['image']['url'] ?>');">
                                    <div class="practice-area-card__content">
                                        <div class="icon">
                                            <img src="<?= $practice_area['icon']['url'] ?>" alt="<?= $practice_area['icon']['alt'] ?>" width="88" height="70">
                                        </div>
                                        <h2 class="title-h2"><?= $practice_area['title'] ?></h2>
                                        <p class="description"><?= $practice_area['description'] ?></p>
                                    </div>
                                </a>
                            <?php endforeach ?>
                        </div>
                        <?php if ($button) : ?>
                            <a href="<?= $button['url'] ?>" class="btn-global mx-auto mt-5 hidden-hd"><?= $button['title'] ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right-side col-lg-6">
                    <?php if (!wp_is_mobile()): ?>
                        <img src="<?= CHILD_URL; ?>/assets/app/img/practice-areas.webp" alt="Practice Area Image">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
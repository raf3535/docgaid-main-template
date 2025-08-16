<?php
$awards = $module['awards'];
?>

<div class="awards-module hidden-hd">
    <?php if (!wp_is_mobile()) : ?>
        <?php foreach (array_chunk($awards, 5) as $awardGroup): ?>
            <div class="image-wrapper">
                <?php foreach ($awardGroup as $award): ?>
                    <div class="image-container">
                        <img src="<?= htmlspecialchars($award['logo']['url']); ?>" alt="<?= htmlspecialchars($award['logo']['title']); ?>" width="140" height="95">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="swiper swiper-awards">
            <div class="swiper-wrapper">
                <?php foreach ($awards as $key => $award): ?>
                    <?php
                    $classes = [];
                    if (in_array($key, [4, 9, 14])) {
                        $classes[] = "border-right-none";
                    }
                    if (in_array($key, [18, 17, 16, 15])) {
                        $classes[] = "border-bottom-none";
                    }
                    if (in_array($key, [0, 1, 2, 3])) {
                        $classes[] = "border-top-none";
                    }

                    $classString = implode(" ", $classes);
                    ?>
                    <div class="swiper-slide <?= $classString; ?>">
                        <div class="image-container">
                            <img src="<?= htmlspecialchars($award['logo']['url']); ?>"
                                alt="<?= htmlspecialchars($award['logo']['title']); ?>"
                                width="140" height="95">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    <?php endif; ?>
</div>
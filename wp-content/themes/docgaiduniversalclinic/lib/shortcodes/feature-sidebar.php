<?php

function feature_sidebar($atts = null)
{
    ob_start();
    $sidebar = get_field('sidebar_feature', 'options');
    //BEGIN OUTPUT
?>

    <div class="feature-sidebar">
        <img src="<?= CHILD_URL; ?>/assets/app/img/poolsonwhite.webp" alt="<?= bloginfo('name'); ?>" class="img">
        <img src="<?= CHILD_URL; ?>/assets/app/img/danny-carissa-background-removed.webp" alt="<?= bloginfo('name'); ?>" class="">
        <div class="content">
            <p class="sub-title"><?= $sidebar['sub_title']; ?></p>
            <h3 class="title"><?= $sidebar['title']; ?></h3>
        </div>
        <div class="results">
            <?php foreach ($sidebar['results'] as $result) : ?>
                <div class="result">
                    <h4><?= $result['price']; ?></h4>
                    <p><?= $result['title']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= site_url('/contact/'); ?>" class="btn-global mx-auto">SPEAK WITH AN ATTORNEY TODAY</a>
    </div>

<?php
    //END OUTPUT (And actually output it!)
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}

add_shortcode('feature-sidebar', 'feature_sidebar');

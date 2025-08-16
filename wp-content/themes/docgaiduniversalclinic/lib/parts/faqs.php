<?php
$faq = get_field('faq_2', 'options');
?>
<div class="faqs-module">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 left-side">
                <?php if ($faq): ?>
                    <h3 class="hidden-hd hidden-hd-left"><?= $faq['title']; ?></h3>
                    <p class="hidden-hd hidden-hd-left"><?= $faq['description']; ?></p>
                    <div class="links">
                        <?php foreach ($faq['q_&_a'] as $link) : ?>
                            <a href="<?= $link['link']; ?>" class="hidden-hd hidden-hd-left"><?= $link['question']; ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <img src="<?= $faq['image']['url']; ?>" alt="<?= $faq['image']['alt']; ?>" class="d-none d-xxl-block hidden-hd hidden-hd-right">
            </div>
        </div>
    </div>
</div>
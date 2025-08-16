<?php
$attorney_blockquote = get_field('attorney_blockquote');
$attorney_cta = get_field('attorney_cta') ? get_field('attorney_cta') : 'Contact Our Railroad Attorneys Today!';
global $hc_settings;
if ($attorney_blockquote || $attorney_cta && get_post_type() == 'attorney'): ?>
    <?php if ($attorney_blockquote) : ?>
        <div class="blockquote-module">
            <div class="background-overlay"></div>
            <div class="container">
                <div class="mx-auto text-center px-2 px-lg-0">
                    <?php echo $attorney_blockquote; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="blockquote-cta">
        <div class="container">
            <div class="blockquote-cta-text">
                <h4 class="mt-0">Don't Wait any longer</h4>
                <h2><?php echo $attorney_cta; ?></h2>
                <div class="phone">
                    <img src="<?= CHILD_URL ?>/assets/app/svg/phone.svg" alt="phone-icon">
                    <a href="tel:+1<?= preg_replace("/[^0-9]/", "", $hc_settings['phone_number']); ?>" title="Call to <?= get_bloginfo('name'); ?>"><?= $hc_settings['phone_number']; ?></a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
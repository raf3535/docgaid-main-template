<?php
$map = get_field('maps', 'option');
global $hc_settings;
?>

<div class="maps-module">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.611784410223!2d-90.1557893!3d30.019301699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8620b1e5d099c1e3%3A0x7a39af068759cd70!2sPoolson%20Oden%20Law%20Firm!5e0!3m2!1sen!2s!4v1717685204389!5m2!1sen!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="maps-module__content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="maps-module__text">
                        <h2><?= $map['title'] ?></h2>
                        <address>
                            <img src="<?= CHILD_URL ?>/assets/app/svg/map.svg" alt="mail-icon" width="23" height="23">
                            <?= $map['address'] ?>
                        </address>
                        <?php if ($map['phone_number']) : ?>
                            <a href="tel:+1<?= preg_replace("/[^0-9]/", "", $hc_settings['phone_number']); ?>" class="maps-phone">
                                <?= do_shortcode('[icon name="phone"]'); ?>
                                <div class="phone"><?= $hc_settings['phone_number']; ?></div>
                            </a>
                        <?php endif; ?>
                        <a href="mailto:<?= $map['email']; ?>" class="maps-mail">
                            <img src="<?= CHILD_URL ?>/assets/app/svg/mail.svg" alt="mail-icon" width="23" height="23">
                            <div class="mail"><?= $map['email']; ?></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$contact = get_field('contact', 'options');
$rescources = '[contact-form-7 id=" ' . get_field('resources', 'options')['resources_form'][0] . ' " title="Contact form 1"]';
$form = '[contact-form-7 id=" ' . $contact['form'][0] . ' " title="Contact form 1"]';
$is_contact_template = is_page_template('templates/contact.php') && wp_is_mobile();
$class = $is_contact_template ? 'd-none d-lg-block' : '';
$class2 = $is_contact_template ? 'mt-5 pt-5' : '';
global $hc_settings;
?>

<div class="contact-module overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <img src="<?php echo $contact['image']['url']; ?>" alt="poolsonoden" class="desktop <?= $class; ?>">
                <div class="content col-lg-11 col-xxxl-10 mx-auto <?= wp_is_mobile() ? '' : "hidden-hd hidden-hd-right  $class2"; ?>">
                    <?php if (is_page('contact')) { ?>
                        <h1><?php echo $contact['title']; ?></h1>
                    <?php } else { ?>
                        <h3><?php echo $contact['title']; ?></h3>
                    <?php } ?>
                    <p><?php echo $contact['description']; ?></p>
                    <p class="sub-title">Contact Us Today</p>
                    <a href="tel:+1<?= preg_replace("/[^0-9]/", "", $hc_settings['phone_number']); ?>" class="phone">
                        <?= do_shortcode('[icon name="phone"]'); ?>
                        <div class="phone"><?= $hc_settings['phone_number']; ?></div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-xxl-5 contact-form <?= wp_is_mobile() ? '' : 'hidden-hd hidden-hd-right'; ?> ">
                <img src="<?= CHILD_URL; ?>/assets/app/img/poolsonwhite.webp" alt="Polson Oden" class="mb-1" width="185" height="101">
                <h3>Free Case Evaluation</h3>
                <?php
                if (is_page_template('templates/resources.php')) {
                    echo do_shortcode($rescources);
                } else {
                    echo do_shortcode($form);
                }; ?>
            </div>
        </div>
    </div>
</div>
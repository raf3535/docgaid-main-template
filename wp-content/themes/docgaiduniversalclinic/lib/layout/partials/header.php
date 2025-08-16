<?php

add_action('genesis_header', 'custom_do_header', 1);

function custom_do_header()
{
    remove_action('genesis_header', 'genesis_header_markup_open', 5);
    remove_action('genesis_header', 'genesis_do_header', 10);
    remove_action('genesis_header', 'custom_remove_nav', 12);
    remove_action('genesis_header', 'genesis_header_markup_close', 15);
    remove_action('genesis_after_header', 'genesis_do_nav', 10);
    remove_action('genesis_after_header', 'genesis_do_subnav', 10);

    $header_logo = get_field('header_logo', 76);

?>

<?php /*<header class="header-section">
    <div class="container">
        <div class="header d-flex justify-content-between align-items-center">
            <img class="logo" src="<?= $header_logo['url']; ?>" alt="<?= $header_logo['alt']; ?>">
            <button class="menu-toggle" id="menuToggle">
                <i class="fa fa-bars"></i>
            </button>
            <?php
                $i = 0;
                if (have_rows("header_name")):
                    while (have_rows("header_name")) : the_row();
                        $header_name = get_sub_field('menu_item');
                ?>
                        <div class="day-and-time">
                            <a class="header-text"><?= $header_name; ?></p>
                            <p id="todaysWorkTimeStartAt_<?= $i + 1; ?>"><?= $header_name; ?></p>
                        </div>
                <?php
                        $i++;
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</header>  */ ?>
<header class="header-section">
    <div class="container">
        <div class="header d-flex justify-content-between align-items-center">
        <img class="logo-header" src="<?= $header_logo['url']; ?>" alt="<?= $header_logo['alt']; ?>">
        
            <button class="menu-toggle" id="menuToggle">
                <i class="fa fa-bars"></i>
            </button>
            <nav class="nav-menu no-menu" id="navMenu">
            <?php
                if (have_rows("menu_item", 76)):
                    while (have_rows("menu_item", 76)) : the_row();
                        $menu_item = get_sub_field('header_name', 76);
                ?>
                    <a href="#" class="header-text"><?= $menu_item ?></a>
                <?php
                    endwhile;
                endif;
            ?>
                <!-- 
                <a href="#" class="header-text">Dienstleistungen</a>
                <a href="#praxis-section" class="header-text">VORTEILe</a>
                <a href="#doctors-section" class="header-text">ÜBER</a>
                <a href="#tablet-section" class="header-text">FUNKTIONEN</a>
                <a href="#assistant-section" class="header-text">INDIVIDUELL</a>     
                <a href="#contact-section" class="header-text">KONTAKT</a>-->
            </nav>
        </div>
    </div>
</header>  
<?php /*
    <header class="header<?= wp_is_mobile() ? ' header-mobile' : '' ?>">
        <div class="header-main-wrap">
            <div class="container">
                <div class="header-main">
                    <a href="<?= site_url(); ?>" class="header-logotype" title="<?= get_bloginfo('name'); ?>">
                        <picture>
                            <img src="<?= CHILD_URL ?>/assets/app/img/polson-logo.webp" alt="<?= get_bloginfo('name'); ?>" title="<?= get_bloginfo('name'); ?>">
                        </picture>
                    </a>
                    <?php if (!wp_is_mobile()) : ?>
                        <div class="header-cta">
                            <div class="header-text">
                                <p>Don't Get <span>Railroaded</span></p>
                                <span>GET YOUR LIFE BACK ON TRACK • CALL US TODAY</span>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <a href="tel:+1<?= preg_replace("/[^0-9]/", "", $hc_settings['phone_number']); ?>" class="header-phone">
                                    <img src="<?= CHILD_URL ?>/assets/app/svg/phone.svg" alt="phone-icon">
                                    <div class="phone"><?= $hc_settings['phone_number']; ?></div>
                                </a>
                                <span class="header-title-top">AVAILABLE 24/7 • 365 DAYS</span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <button type="button" name="Menu" aria-label="Menu" title="Menu" class="burger">
                        <svg class="burger-svg" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="burger-icon" d="M10 15L40 15M10 25L40 25M10 35L40 35" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="burger-close" d="M15 15L35 35M35 15L15 35" stroke="transparent" stroke-width="0" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="container">
                <div class="header-menu">
                    <?php wp_nav_menu([
                        'menu' => 'Primary Menu',
                        'container_class' => 'genesis-nav-menu'
                    ]); ?>
                </div>
            </div>
        </div>
        <?php if (wp_is_mobile()) : ?>
            <div class="header-cta">
                <div class="header-phone-mobile">
                    <img src="<?= CHILD_URL ?>/assets/app/svg/phone.svg" alt="phone-icon">
                    <a href="tel:+1<?= preg_replace("/[^0-9]/", "", $hc_settings['phone_number']); ?>" title="Call to <?= get_bloginfo('name'); ?>" class="phone"><?= $hc_settings['phone_number']; ?></a>
                </div>
                <span class="header-title">GET A FREE CONSULTATION TODAY</span>
            </div>
        <?php endif; ?>
    </header>

<?php */
}

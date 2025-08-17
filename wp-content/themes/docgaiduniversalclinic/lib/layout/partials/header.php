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

<header class="header-section">
    <div class="container">
        <div class="header d-flex justify-content-between align-items-center">
        <img class="logo-header" src="<?= $header_logo['url']; ?>" alt="<?= $header_logo['alt']; ?>">
        
            <button class="menu-toggle" id="menuToggle">
                <i class="fa fa-bars"></i>
            </button>
            <nav class="nav-menu no-menu" id="navMenu">
            <?php 
                wp_nav_menu([
                    'menu' => 'General',
                    'container_class' => 'genesis-nav-menu',
                    'menu_class'      => 'menu',
                    'add_li_class'    => 'header-text'
                ]);
            ?>
            </nav>
        </div>
    </div>
</header>  

<?php

}

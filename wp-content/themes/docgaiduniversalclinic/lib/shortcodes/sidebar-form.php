<?php

function sidebar_form_shortcode($atts = null)
{
    ob_start();
    //BEGIN OUTPUT
?>

    <div class="sidebar-contact-form standard-form contact-module">
        <div class="standard-form-head">
            <img src="<?= CHILD_URL; ?>/assets/app/img/poolsonwhite.webp" alt="Poolson Oden">
            <h3>Contact Us Today</h3>
            <p>Start with a free case review. Fill out the form provided and our attorneys will be in touch.</p>
        </div>
        <div class="lead-form contact-form">
            <?php echo do_shortcode('[contact-form-7 title="Sidebar Form"]'); ?>
        </div>
    </div>

<?php
    //END OUTPUT (And actually output it!)
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}

add_shortcode('sidebar-form', 'sidebar_form_shortcode');

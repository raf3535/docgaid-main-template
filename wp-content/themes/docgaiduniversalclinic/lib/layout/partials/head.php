<?php

// Head Scripts and Styles (Google Analytics etc)
add_action('wp_head', 'custom_head_scripts_and_styles');

function custom_head_scripts_and_styles()

{ /*?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preload" as="font" type="font/woff2" href="<?= CHILD_URL ?>/assets/app/fonts/SourceSansPro-Bold.woff2" crossorigin="anonymous">
    <link rel="preload" as="font" type="font/woff2" href="<?= CHILD_URL ?>/assets/app/fonts/SourceSansPro-Semibold.woff2" crossorigin="anonymous">
    <link rel="preload" as="font" type="font/woff2" href="<?= CHILD_URL ?>/assets/app/fonts/SourceSansPro-Regular.woff2" crossorigin="anonymous">
    <link rel="preload" as="font" type="font/woff2" href="<?= CHILD_URL ?>/assets/app/fonts/MeieScript-Regular.ttf" crossorigin="anonymous">
    <link rel="preload" as="image" href="<?= CHILD_URL . '/assets/app/img/banner.webp'; ?>" type="image/webp">
    <link rel="preload" as="image" href="<?= CHILD_URL . '/assets/app/img/internal.webp'; ?>" type="image/webp">
    <link rel="preload" as="image" href="<?= CHILD_URL . '/assets/app/img/dannycarissahero.webp'; ?>" type="image/webp">
    <link rel="preload" as="image" href="<?= CHILD_URL . '/assets/app/img/office-bg.webp'; ?>" type="image/webp">
    <link rel="preload" as="image" href="<?= CHILD_URL . '/assets/app/img/poolsonpartners.webp'; ?>" type="image/webp">
    <?php */ ?>
    <!-- <script src="//www.apexchat.net/scripts/invitation.ashx?company=poolsonoden" async></script> -->
    <!-- Google Tag Manager -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MCGB6PF');
    </script>
    <!-- End Google Tag Manager -->
<?php
}

add_action('genesis_before', 'add_gtag_noscript');

// For GTM noscript
function add_gtag_noscript()
{
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <script type="text/javascript" src="vanilla-tilt.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>   
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MCGB6PF"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
<?php
}

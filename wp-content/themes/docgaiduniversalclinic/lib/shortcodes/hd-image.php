<?php
/*--------------------------------
Example Shortcode Wrapper
[image]
---------------------------------*/

function hc_image_webp_mobile_support($atts = [], $content = null) {

    extract( shortcode_atts( array(
        'src' => '',
        'width' => '300',
        'height' => '250',
        'alt' => get_bloginfo('name'),
        'title' => '',
        'webp' => true,
        'mobile' => false,
        'src_mobile' => '',
        'media' => '768',
        'type' => 'jpg',
        'svg' => false,
        'single' => false,
        'class' => ''
    ), $atts ) );
    
    ob_start();

    if(strpos($src, 'http') === false) {
        if(!$svg) {
            $src = CHILD_URL . '/assets/app/img/' . $src;
        } else {
            $src = CHILD_URL . '/assets/app/svg/' . $src;
        }
    }
    if(strpos($src_mobile, 'http') === false) {
        $src_mobile = CHILD_URL . '/assets/app/img/' . $src_mobile;
    }
    if(!$svg && !$single) { ?>
        <picture <?= $class ? "class=\"$class\"" : "" ?>>
            <?php
            if($webp !== "false" && $mobile) { ?>
                <source srcset="<?=str_replace(array('.jpg', '.png', '.jpeg'), '.webp', $src_mobile);?>" media="(max-width: <?=preg_replace("/[a-zA-Z]/", "", $media).'px';?>)" type="image/webp"/>
                <?php
            } if($mobile) { ?>
                <source srcset="<?=$src_mobile;?>" media="(max-width: <?=preg_replace("/[a-zA-Z]/", "", $media).'px';?>)" type="image/<?=$type;?>"/>
                <?php
            } if($webp !== "false") { ?>
                <source srcset="<?=str_replace(array('.jpg', '.png', '.jpeg'), '.webp', $src);?>" type="image/webp"/>
                <?php
            } ?>
            <img src="<?=$src;?>" alt="<?=$alt;?>" title="<?=$title ? $title : $alt;?>" width="<?=preg_replace("/[a-zA-Z]/", "", $width);?>" height="<?=preg_replace("/[a-zA-Z]/", "", $height);?>">
        </picture>
        <?php
    } else { ?>
        <img src="<?=$src;?>" alt="<?=$alt;?>" title="<?=$title ? $title : $alt;?>" width="<?=preg_replace("/[a-zA-Z]/", "", $width);?>" height="<?=preg_replace("/[a-zA-Z]/", "", $height);?>" <?= $class ? "class=\"$class\"" : "" ?>>
        <?php
    }

    //END OUTPUT
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}

add_shortcode('image', 'hc_image_webp_mobile_support');
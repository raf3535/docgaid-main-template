<?php
/*--------------------------------
Example Shortcode Wrapper
[hd-modal
 video="#" = > Here you can add just id of video of youtube or Wistia, if not leave empty
 title="#" = > Here you can add title, if not leave empty
 type="#" = > Here you can add type types are: youtube, wistia
 class="#" = > Here you can add custom class
 cta="#" = > Here you can add button CTA if not leave empty
 src="#" = > Here you can add image source if not leave empty
 src_mobile="#" = > Here you can add image source for mobile if not leave empty
 img_width="#" = > Here you can add img width
 img_height="#" = > Here you can add img height
 webp,mobile,svg,single = > Attributes true or false

]
---------------------------------*/
function hd_modal($atts = [], $content = null)
{
    extract(shortcode_atts(array(
        'video' => '',
        'title' => '',
        'type' => '',
        'class' => '',
        'cta' => '',
        'src' => '',
        'src_mobile' => '',
        'img_width' => '',
        'img_height' => '',
        'webp' => true,
        'mobile' => false,
        'svg' => false,
        'single' => false,
    ), $atts));
    ob_start();
    //BEGIN OUTPUT

    if (!empty($src)) {
        if (strpos($src, 'http') === false) {
            if (!$svg) {
                $src = CHILD_URL . '/assets/app/img/' . $src;
            } else {
                $src = CHILD_URL . '/assets/app/svg/' . $src;
            }
        }
        if (strpos($src_mobile, 'http') === false) {
            $src_mobile = CHILD_URL . '/assets/app/img/' . $src_mobile;
        }
        if (!$svg && !$single) { ?>
            <picture src="<?= isset($src) ? $src : '' ?>"
                     class="open-hd-modal <?= isset($class) ? $class : '' ?>"
                     title="<?= isset($title) ? $title : '' ?>"
                     alt="<?= isset($title) ? $title : '' ?>"
                     width="<?= isset($img_width) ? $img_width : '' ?>"
                     height="<?= isset($img_height) ? $img_height : '' ?>"
                     data-hd-modal-title="<?= isset($title) ? $title : '' ?>"
                     data-hd-modal-content-type="<?= isset($type) ? $type : '' ?>"
                     data-hd-modal-content="<?= isset($video) ? $video : '' ?>">
                <?php
                if ($webp !== "false" && $mobile) { ?>
                    <source srcset="<?= str_replace(array('.jpg', '.png', '.jpeg'), '.webp', $src_mobile); ?>"
                            media="(max-width: <?= preg_replace("/[a-zA-Z]/", "", $media) . 'px'; ?>)"
                            type="image/webp"/>
                    <?php
                }
                if ($webp !== "false") { ?>
                    <source srcset="<?= str_replace(array('.jpg', '.png', '.jpeg'), '.webp', $src); ?>"
                            type="image/webp"/>
                    <?php
                } ?>
                <img src="<?= isset($src) ? $src : '' ?>"
                     class="open-hd-modal open-hd-modal-img <?= isset($class) ? $class : '' ?>"
                     title="<?= isset($title) ? $title : '' ?>"
                     alt="<?= isset($title) ? $title : '' ?>"
                     width="<?= isset($img_width) ? $img_width : '' ?>"
                     height="<?= isset($img_height) ? $img_height : '' ?>"
                     data-hd-modal-title="<?= isset($title) ? $title : '' ?>"
                     data-hd-modal-content-type="<?= isset($type) ? $type : '' ?>"
                     data-hd-modal-content="<?= isset($video) ? $video : '' ?>">
            </picture>
            <?php
        } else { ?>
            <img src="<?= isset($src) ? $src : '' ?>"
                 class="open-hd-modal <?= isset($class) ? $class : '' ?>"
                 title="<?= isset($title) ? $title : '' ?>"
                 alt="<?= isset($title) ? $title : '' ?>"
                 width="<?= isset($img_width) ? $img_width : '' ?>"
                 height="<?= isset($img_height) ? $img_height : '' ?>"
                 data-hd-modal-title="<?= isset($title) ? $title : '' ?>"
                 data-hd-modal-content-type="<?= isset($type) ? $type : '' ?>"
                 data-hd-modal-content="<?= isset($video) ? $video : '' ?>">
            <?php
        }
        ?>

    <?php } else {
        ?>
        <button class="open-hd-modal <?= $class ?>" data-hd-modal-title="<?= $title ?>"
                data-hd-modal-content-type="<?= $type ?>" data-hd-modal-content="<?= $video ?>"><?= $cta ?></button>
        <?php
    }

    //END OUTPUT
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

add_shortcode('hd-modal', 'hd_modal');
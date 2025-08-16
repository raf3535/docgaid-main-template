<?php
/*--------------------------------
Example Shortcode Wrapper
[hc-video
 videoid="#"
 imgurl="#"
 title="#"
]
---------------------------------*/

function hc_video_modal($atts = [], $content = null) {
    global $post;

    $videourl = "";
    $imgurl = "";

    extract( shortcode_atts( array(
        'videourl' => '',
        'imgurl' => '',
    ), $atts ) );
    
    ob_start();
    if(!(strpos($videourl,'?autoplay=1&rel=0') !== false)){
        //if it does not contain ?autoplay=1&rel=0, check if it at least contains autoplay=1
        if(strpos($videourl,'?autoplay=1') !== false){
            //if it has ?autoplay=1 add the &rel=0
            $videourl = $videourl.'&rel=0';
        }else{
            //if it does not contain autoplay=1
            if(strpos($videourl,'?') !== false && !(strpos($videourl,'autoplay=1') !== false)){
                //if it contains ? and it does not contain autoplay=1 add it on the end
                $videourl = $videourl.'&autoplay=1';
            }else{
                //else just append the ?autoplay=1&rel=0 to the end of the video url
                $videourl = $videourl.'?autoplay=1&rel=0';
            }
        }
    }
    //BEGIN OUTPUT
    ?>
    <div class="youtubeiFrame" data-iframeurl="<?=$videourl?>">
        <img loading="lazy" class="youtubeImg"
            data-title="<?=$title?>"
            src="<?=$imgurl?>" alt="Video on Youtube"
            width="561" height="317"
            srcset="<?=$imgurl?>"
        >
    </div>
<?php
    //END OUTPUT
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}
add_shortcode('hc-video', 'hc_video_modal');
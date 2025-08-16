<?php
/*--------------------------------
Example Shortcode Wrapper
[hc-address
 map="#"
 address1="#"
 address2="#"
 name="#"
 phone="#"]
---------------------------------*/

function hc_address_shortcode($atts = [], $content = null) {

    $address1 = "";
    $address2 = "";
    $phone = "";
    $fax = "";
    $name= "";
    $map = "";
    $additional = "";
    $email = "";
    $link = "";
    $hours = "";
    $anchor_text = "";

    extract( shortcode_atts( array(
        'address1' => '',
        'address2' => '',
        'phone' => '',
        'fax' => '',
        'name' => '',
        'email' => '',
        'map' => '',
        'additional' => '',
        'link' => '',
        'anchor_text' => '',
        'hours' => '',
    ), $atts ) );

    ob_start();
    //BEGIN OUTPUT
    ?>

    <div class="hc-map">
        <div class="row">
            <div class="col-md-6">
                <div class="hc-map__address">
                    <h3>Office Information</h3>
                    <strong>Address</strong>
                    <address>
                        <?php echo $name; ?><br>
                        <?php echo $address1; ?><br>
                        <?php echo $address2; ?><br>
                        <?php echo $additional; ?>
                    </address>
                    <?php if($hours) { ?>
                        <p><strong><?php echo $hours; ?></strong></p>
                        <?php
                    } ?>
                    <?php if($email) { ?>
                        <p>Email: <a class="address__link_" href="mail:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                        <?php
                    } ?>
                    <?php if($phone) { ?>
                        <p>Phone: <a class="address__link_" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                        <?php
                    } ?>
                    <?php if($fax) { ?>
                        <p>Fax: <a class="address__link_" href="fax:<?php echo $fax; ?>"><?php echo $fax; ?></a></p>
                        <?php
                    } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hc-map__map-embed">
                    <div class="map-container">
                        <iframe src="<?php echo $map;?>" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="map-link">
                        <a href="<?=$link?>" target="_blank"><?=$anchor_text?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    //END OUTPUT
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}

add_shortcode('hc-address', 'hc_address_shortcode');
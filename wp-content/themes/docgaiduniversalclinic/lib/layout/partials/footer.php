<?php

add_action('genesis_footer', 'custom_footer', 8);
add_action('genesis_before_footer', 'footer_form', 11);

function footer_form()
{ ?>

<?php
}

function custom_footer()
{
    // remove_action('genesis_footer', 'genesis_do_footer', 10);
    // $map = get_field('maps', 'option');
    // $social_links = get_field('social', 'option');
    // global $hc_settings;
    // $logo = get_field('logo', 'option')["url"];
	// $company_name = get_field('name', 'option');
	
	// $address = get_field('address', 'option');
	// $phone_number = get_field('phone_number', 'option');
	// $telefax = get_field('telefax', 'option');
	// $email = get_field('email', 'option');

	// $impresum_title = get_field('impresum_title', 'option');
	// $impressum_text = get_field('impressum_text', 'option');
	// $copyright_text = get_field('copyright_text', 'option');
?>
    
    <section class="footer-section">
            <div class="container-fluid p-0 m-0">
                <div class="row justify-content-around">
                    <div class="col-lg-2 col-10">
                        <?php 
                            $logo = get_field('logo_white', 'option');
                        ?>
                        <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt']; ?>">
                    </div>
                    <div class="col-lg-2 col-10">
                        <p class="footer-c-text text-white">Mit DocGaid® kannst du deine Arbeitsprozesse optimieren, deine Assistenz entlasten und ein effektives sowie organisiertes Arbeiten fördern.</p>
                    </div>
                    <div class="col-lg-3 col-10 text-links">
                        <p class="sub-title-footer text-uppercase">Nützliche Links</p>
                        <p class="link-f text-white">Home</p>
                        <p class="link-f text-white">Dienstleistungen</p>
                        <p class="link-f text-white">Kostenlos testen</p>
                        <p class="link-f text-white">Impressum & Datenschutzerklärung</p>
                    </div>
                    <div class="col-lg-2 col-10 text-links">
                        <p class="sub-title-footer">KONTAKT</p>
                        <p class="link-f text-white">Fontanestr. 18, 12049 Berlin</p>
                        <p class="link-f text-white">info@docgaid.de</p>
                        <p class="link-f text-white">+49 30 7700 6060</p>
                    </div>
                </div>
                <p class="text-center text-white copyright-text">© DocGaid 2025 • Alle Rechte vorbehalten.</p>
            </div>
        </section>

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
        <!-- <script src="script.js"></script> -->
<?php
}

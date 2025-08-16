<?php

add_action('wp_footer', 'track_url');

// add hidden inputs to all forms CF7
add_filter('wpcf7_form_hidden_fields', 'add_form_inputs');
function add_form_inputs($hidden){

    $hidden['conversion_url'] = ''; //form conversion input//
    $hidden['landing_url'] = ''; //form landing input//
    $hidden['referrer_url'] = ''; //form referrer input//

    return $hidden;

}

function track_url () {
    ?>

    <script>

        (function () {
            function setCookie(name,value,days) {
                let expires = "";
                if (days) {
                    const date = new Date();
                    date.setTime(date.getTime() + (days*24*60*60*1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "")  + expires + "; path=/";
            }
            function getCookie(name) {
                const nameEQ = name + "=";
                const ca = document.cookie.split(';');
                for(let i=0;i < ca.length;i++) {
                    let c = ca[i];
                    while (c.charAt(0)===' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }

            // here we add current url
            const conversion_url = window.location.href;

             // if landing page is not set, then this must be the first page of the session.
             // Therefore it is equal to the conversion url
            let landing_url = getCookie('landing_url');
            if (!landing_url) {
                setCookie('landing_url', conversion_url, 1)
                landing_url = getCookie('landing_url');
            }

            // if referrer not related to current host, set this to cookie
            let referrer_url = getCookie('referrer_url');
            if (document.referrer && document.referrer.indexOf(window.location.host) === -1) {
                setCookie('referrer_url', document.referrer, 180)
                referrer_url = document.referrer;
            }

            const conversion_inputs = document.getElementsByName("conversion_url");
            const landing_inputs = document.getElementsByName("landing_url");
            const referrer_inputs = document.getElementsByName("referrer_url");

            for (let i = 0; i < conversion_inputs.length; i++) {
                conversion_inputs[i].value = conversion_url;
            }
            for (let i = 0; i < landing_inputs.length; i++) {
                landing_inputs[i].value = landing_url;
            }
            for (let i = 0; i < referrer_inputs.length; i++) {
                referrer_inputs[i].value = referrer_url;
            }
        })();

    </script>

    <?php
}
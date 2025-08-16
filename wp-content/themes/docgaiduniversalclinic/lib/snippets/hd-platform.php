<?php

add_action('wpcf7_mail_sent', 'send_to_platform', 10, 1);
function send_to_platform() {
    $submission = WPCF7_Submission::get_instance();
    $data = $submission->get_posted_data();
    $wpcf7 = WPCF7_ContactForm::get_current();
    if(strpos(strtolower($wpcf7->title()), "scholarship") !== false){
        return true;
    }
    ob_start();
    $host = $_SERVER['HTTP_HOST']; // get current host
    $productionDomain = "poolsonoden.com"; // put the production url here without the wwww
    if(empty($productionDomain)){
        wp_mail('engineering.admin@hennessey.com' , site_url() . 'HD Platform not integrated' , 'The Lead Forms for ' . site_url() . ' are not integrated with Hennesseys Platform, please fix the integration by modifying the lib/snippets/hd-platform.php file');
        return true;
    }
    $stagingApi = "https://d6g9soswzi.execute-api.us-west-1.amazonaws.com/dev/put-lead";
    $prodApi = "https://gna7l7zske.execute-api.us-west-1.amazonaws.com/prod/v1/lead/".$productionDomain."/create";

    try {
        $post = [
            "email" => $data['your-email'],
            "fullName" => $data['first-name'] . " " . $data['last-name'],
            "message" => $data['your-message'],
            "phone" => $data['phone'],
            "website" => $productionDomain,
            "landingUrl" => urlencode($data['landing_url']),
            "referrerUrl" => urlencode($data['referrer_url']),
            "conversionUrl" => urlencode($data['conversion_url']),
        ];
        //unset the data so we can re-add whatever is left from the form
        unset($data['email']);
        unset($data['first-name']);
        unset($data['message']);
        unset($data['phone']);
        unset($data['landing_url']);
        unset($data['referrer_url']);
        unset($data['conversion_url']);
        //end of unsetting data

        //if there is data left; append it to the $post so that goes to the API aswell!
        if(count($data)){
            foreach($data as $key => $value){
                if(is_array($value)){
                    $post[$key] = $value[0];
                }
                else{
                    $post[$key] = $value;
                }
            }
        }

        $isStaging = false;
        $substringsToSendToStaging = [
            'wpengine',
            'staging',
            'production',
            'development',
            'localhost'
        ];

        foreach($substringsToSendToStaging as $substr){
            if (strpos($host, $substr) !== false) {
                $isStaging = true;
                return;
            }
        }

        $payload = json_encode($post);
        $ch = curl_init();
        if($isStaging){
	        curl_setopt($ch, CURLOPT_URL, $stagingApi);
        }else{
	        curl_setopt($ch, CURLOPT_URL, $prodApi);
        }

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // execute!
        $response = curl_exec($ch);
        if(curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200){
            // TODO Integrate with Cloudwatch
	     	wp_mail('engineering.admin@hennessey.com' , 'Lead Form Failed - HD Platform' , print_r($post, true));
        }

        // close the connection, release resources used
        curl_close($ch);

    } catch (\Throwable $th) {
        wp_mail('engineering.admin@hennessey.com' , 'Lead Form Failed - HD Platform' , 'Data -> ' . print_r($post, true) . ' <br> The Try Catch Message -> ' . print_r($th->getMessage()));
    }


    $out = ob_get_contents();
    ob_clean();
    return true;

}
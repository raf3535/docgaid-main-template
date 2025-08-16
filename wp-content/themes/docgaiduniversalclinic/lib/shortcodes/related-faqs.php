<?php

function related_faqs($atts = null)
{
    ob_start();
    //BEGIN OUTPUT
?>
    <div class="widget location-widget-outer">
        <h3 class="widget-title widgettitle">Related FAQS</h3>
        <ul class="location-widget-links">
            <li class="single-location-link"><a href="<?= site_url('/blog/on-duty-railroad-injury-what-to-do-first/');?>">On-Duty Railroad Injury: What To Do First</a></li>
            <li class="single-location-link"><a href="<?= site_url('/faqs/do-i-have-to-give-a-statement-to-railroad-claims/'); ?>">Do I Have to Give a Statement to Railroad Claims?</a></li>
            <li class="single-location-link"><a href="<?= site_url('/blog/seven-steps-to-do-after-an-on-duty-railroad-injury/'); ?>">Seven Steps To Do After An On-Duty Railroad Injury</a></li>
            <li class="single-location-link"><a href="<?= site_url('/faqs/do-i-have-to-see-the-railroad-company-doctor/'); ?>">Do I Have to See the Railroad Company Doctor?</a></li>
            <li class="single-location-link"><a href="<?= site_url('/blog/avoiding-railroad-injury-report-pitfalls/'); ?>">Avoiding Personal Injury Report Pitfalls</a></li>
            <li class="single-location-link"><a href="<?= site_url('/blog/paying-medical-bills-after-an-on-duty-railroad-injury/'); ?>">Paying Medical Bills After an On-Duty Railroad Injury</a></li>
            <li class="single-location-link"><a href="<?= site_url('/faqs/how-long-do-i-have-to-claim-an-on-duty-railroad-injury/'); ?>">How Long Do I Have to Claim an On-Duty Railroad Injury?</a></li>
            <li class="single-location-link"><a href="<?= site_url('/faqs/am-i-covered-under-state-workers-compensation/'); ?>">Am I Covered Under State Workers Comp?</a></li>
            <li class="single-location-link"><a href="<?= site_url('/faqs/when-should-i-hire-a-railroad-attorney/'); ?>">Hiring a Railroad Attorney</a></li>
        </ul>
    </div>
<?php
    //END OUTPUT (And actually output it!)
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}

add_shortcode('related-faqs', 'related_faqs');
